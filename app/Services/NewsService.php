<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;

class NewsService
{
    /**
     * Mengambil dan menyaring berita yang relevan
     */
    public function getRelevantNews(RssReader $reader): Collection
    {
        try {

            // Mengambil berita dari cache atau RSS
            try {
                $berita = Cache::remember(
                    'news.cnn_indonesia.latest',
                    now()->addMinutes(15),
                    function () use ($reader) {

                        $items = $reader->fetch(
                            'https://www.cnnindonesia.com/ekonomi/rss'
                        );

                        // Simpan berita terakhir yang berhasil diambil
                        if (!empty($items)) {
                            Cache::put(
                                'news.cnn_indonesia.last_success',
                                $items,
                                now()->addDays(7)
                            );
                        }

                        return $items;
                    }
                );

                // Jika RSS berhasil tetapi tidak menghasilkan berita,
                // gunakan berita terakhir yang pernah berhasil disimpan.
                if (empty($berita)) {
                    $berita = Cache::get(
                        'news.cnn_indonesia.last_success',
                        []
                    );
                }

            } catch (\Throwable $e) {

                report($e);

                // Gunakan berita terakhir jika RSS gagal
                $berita = Cache::get(
                    'news.cnn_indonesia.last_success',
                    []
                );
            }

            $news = collect($berita)->map(function ($item) {
                $title = trim($item['title'] ?? '');
                $description = trim($item['description'] ?? '');

                $judul = mb_strtolower($title);
                $deskripsi = mb_strtolower($description);

                $skorTopik = 0;

                /*
                 * TOPIK UTAMA PASAR
                 */
                $topikPasar = [
                    // Komoditas
                    'emas',
                    'gold',
                    'bullion',
                    'perak',
                    'silver',
                    'minyak mentah',
                    'crude oil',
                    'brent',
                    'wti',
                    'cpo',
                    'harga sawit',
                    'palm oil',
                    'olein',
                    'nikel',
                    'nickel',
                    'batu bara',
                    'coal',

                    // Forex
                    'forex',
                    'valuta asing',
                    'nilai tukar',
                    'kurs rupiah',
                    'kurs dolar',
                    'kurs dollar',
                    'usd/idr',
                    'eur/usd',
                    'usd/jpy',
                    'indeks dolar',
                    'pasar mata uang',

                    // Pasar keuangan
                    'ihsg',
                    'indeks saham',
                    'bursa saham',
                    'pergerakan saham',
                    'pasar saham',
                    'suku bunga',
                    'inflasi',
                    'bank indonesia',
                    'the fed',
                    'federal reserve',

                    // Perdagangan berjangka
                    'perdagangan berjangka',
                    'kontrak berjangka',
                    'bursa berjangka',
                    'pialang berjangka',
                    'bappebti',
                    'icdx',
                    'kbi',

                    // Kebijakan moneter dan bank sentral
                    'bank sentral',
                    'kebijakan moneter',

                    // Edukasi trading
                    'trading',
                    'analisis teknikal',
                    'analisis fundamental',
                    'manajemen risiko trading',
                ];

                foreach ($topikPasar as $keyword) {
                    $keyword = mb_strtolower($keyword);

                    if (str_contains($judul, $keyword)) {
                        $skorTopik += 4;
                    }

                    if (str_contains($deskripsi, $keyword)) {
                        $skorTopik += 2;
                    }
                }

                /*
                 * BATAS MINIMAL RELEVANSI
                 */
                if ($skorTopik < 4) {
                    return null;
                }

                /*
                 * PENENTUAN KATEGORI
                 */

                // Edukasi Trading
                if (preg_match(
                    '/analisis teknikal|analisis fundamental|manajemen risiko trading|belajar trading|edukasi trading|strategi trading|cara trading/i',
                    $judul . ' ' . $deskripsi
                )) {
                    $category = 'Umum';
                }

                // Komoditas
                elseif (preg_match(
                    '/emas|gold|bullion|perak|silver|minyak mentah|crude oil|brent|wti|cpo|sawit|palm oil|olein|nikel|nickel|batu bara|coal/i',
                    $judul . ' ' . $deskripsi
                )) {
                    $category = 'Komoditas';
                }

                // Forex
                elseif (preg_match(
                    '/forex|valuta asing|nilai tukar|kurs rupiah|kurs dolar|kurs dollar|usd\/idr|eur\/usd|usd\/jpy|indeks dolar|pasar mata uang/i',
                    $judul
                )) {
                    $category = 'Forex';
                }

                // Analisis Pasar
                else {
                    $category = 'Analisis Pasar';
                }

                return [
                    'title' => $title,
                    'excerpt' => $description,
                    'image' => $item['image'] ?? null,
                    'date' => $item['pubDate'] ?? '',
                    'source' => 'CNN Indonesia',
                    'category' => $category,
                    'url' => $item['link'] ?? '',
                ];

            })->filter()->values();

            /*
             * URUTKAN BERDASARKAN TANGGAL TERBARU
             */
            return $news->sortByDesc(function ($item) {
                return strtotime($item['date']) ?: 0;
            })->take(100)->values();

        } catch (\Throwable $e) {

            report($e);

            return collect();
        }
    }
}