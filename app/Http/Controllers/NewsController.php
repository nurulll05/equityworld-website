<?php

namespace App\Http\Controllers;

use App\Services\NewsService;
use App\Services\RssReader;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsController extends Controller
{
    /**
     * Halaman daftar berita.
     */
    public function index(
        Request $request,
        NewsService $newsService,
        RssReader $reader
    ) {
        // Mengambil berita melalui NewsService
        $news = $newsService->getRelevantNews($reader);

        // FILTER KATEGORI
        $category = $request->input('category', 'Semua');

        $allowedCategories = [
            'Semua',
            'Analisis Pasar',
            'Komoditas',
            'Forex',
        ];

        if (!in_array($category, $allowedCategories, true)) {
            $category = 'Semua';
        }

        if ($category !== 'Semua') {
            $news = $news->where('category', $category);
        }

        // PENCARIAN BERITA
        $search = trim($request->input('search', ''));

        if ($search !== '') {
            $keyword = mb_strtolower($search);

            $news = $news->filter(function ($item) use ($keyword) {
                $teks = mb_strtolower(
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

        $paginatedNews = new LengthAwarePaginator(
            $news->forPage($currentPage, $perPage),
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
