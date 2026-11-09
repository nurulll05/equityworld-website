<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Services\RssReader;

class NewsController extends Controller
{
    public function index(Request $request, RssReader $reader)
    {
        try {
            // AMBIL BERITA DARI CNN INDONESIA
            $berita = $reader->fetch(
                'https://www.cnnindonesia.com/ekonomi/rss'
            );

            // PROSES DAN FILTER RELEVANSI BERITA
            $news = collect($berita)->map(function ($item) {

                $teks = strtolower(
                    ($item['title'] ?? '') . ' ' .
                    ($item['description'] ?? '')
                );

                // PERIKSA RELEVANSI BERITA
                $kataRelevan = '/
                    trading|perdagangan berjangka|forex|valuta asing|
                    komoditas|emas|gold|bullion|perak|silver|
                    minyak mentah|crude oil|oil price|brent|wti|
                    olein|cpo|palm oil|sawit|
                    batu bara|coal|nikel|mineral|
                    ihsg|saham|rupiah|dolar|dollar|kurs|
                    pasar modal|pasar keuangan|investor|
                    suku bunga|bank indonesia|inflasi|
                    bank sentral|the fed|federal reserve|
                    indeks saham|nilai tukar|
                    energi|pertambangan|ekspor|impor|
                    cadangan energi|pasokan minyak
                /ix';

                if (!preg_match($kataRelevan, $teks)) {
                    return null;
                }

                // KATEGORI EDUKASI TRADING
                if (preg_match(
                    '/belajar trading|edukasi trading|strategi trading|cara trading|dasar trading|manajemen risiko trading|analisis teknikal|analisis fundamental trading/',
                    $teks
                )) {
                    $category = 'Edukasi Trading';
                }

                // KATEGORI KOMODITAS
                elseif (preg_match(
                    '/emas|gold|bullion|perak|silver|minyak mentah|crude oil|oil price|brent|wti|olein|cpo|palm oil|sawit|batu bara|coal|nikel/',
                    $teks
                )) {
                    $category = 'Komoditas';
                }

                // KATEGORI ANALISIS PASAR
                elseif (preg_match(
                    '/ihsg|saham|rupiah|dolar|dollar|forex|valuta|kurs|investor|bursa|suku bunga|inflasi|bank indonesia|pasar modal|pasar keuangan|nilai tukar|bank sentral|the fed|federal reserve/',
                    $teks
                )) {
                    $category = 'Analisis Pasar';
                }

                // BERITA RELEVAN LAINNYA
                else {
                    $category = 'Umum';
                }

                return [
                    'title' => $item['title'] ?? '',
                    'excerpt' => $item['description'] ?? '',
                    'image' => $item['image'] ?? null,
                    'date' => $item['pubDate'] ?? '',
                    'source' => 'CNN Indonesia',
                    'category' => $category,
                    'url' => $item['link'] ?? '',
                ];

            })->filter()->values();

            // URUTKAN BERITA TERBARU
            $news = $news->sortByDesc(function ($item) {
                return strtotime($item['date']) ?: 0;
            })->values();

            // BATASI MAKSIMAL 50 BERITA TERBARU PER SUMBER
            $news = $news->take(50);

        } catch (\Throwable $e) {
            $news = collect();
        }

        // FILTER KATEGORI
        $category = $request->input('category', 'Semua');

        $allowedCategories = [
            'Semua',
            'Edukasi Trading',
            'Analisis Pasar',
            'Komoditas',
        ];

        if (!in_array($category, $allowedCategories)) {
            $category = 'Semua';
        }

        if ($category !== 'Semua') {
            $news = $news->where('category', $category);
        }

        // PENCARIAN BERITA
        $search = trim($request->input('search', ''));

        if ($search !== '') {
            $keyword = strtolower($search);

            $news = $news->filter(function ($item) use ($keyword) {
                $teks = strtolower(
                    $item['title'] . ' ' .
                    $item['excerpt'] . ' ' .
                    $item['category']
                );

                return str_contains($teks, $keyword);
            });
        }

        $news = $news->values();

        // PAGINATION: 9 BERITA PER HALAMAN
        $perPage = 9;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $items = $news->forPage($currentPage, $perPage);

        $paginatedNews = new LengthAwarePaginator(
            $items,
            $news->count(),
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );

        return view('pages.berita', [
            'news' => $paginatedNews,
            'search' => $search,
            'selectedCategory' => $category,
        ]);
    }
}
