<?php

namespace App\Http\Controllers;

use App\Services\NewsService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(NewsService $newsService)
    {
        // Mengambil 3 berita terbaru yang relevan
        $news = $newsService
            ->getRelevantNews(app(\App\Services\RssReader::class))
            ->take(3)
            ->map(function ($item) {
                try {
                    $date = Carbon::parse($item['date'] ?? null)
                        ->translatedFormat('d F Y');
                } catch (\Throwable $e) {
                    $date = '';
                }

                return [
                    'title' => $item['title'] ?? '',
                    'link' => $item['url'] ?? '#',
                    'excerpt' => Str::limit(
                        strip_tags($item['excerpt'] ?? ''),
                        150
                    ),
                    'date' => $date,
                    'image' => $item['image'] ?? null,
                ];
            })
            ->values();

        // Membaca konten CMS yang disimpan Admin
        $cmsPath = storage_path('app/cms/website.json');

        $cmsContent = File::exists($cmsPath)
            ? json_decode(File::get($cmsPath), true) ?? []
            : [];

        return view('pages.home', [
            'news' => $news,
            'cmsContent' => $cmsContent,
        ]);
    }
}
