<?php

namespace App\Http\Controllers;

use App\Services\RssReader;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(RssReader $rssReader)
    {
        $news = collect();

        try {
            $items = $rssReader->fetch(
                'https://www.cnnindonesia.com/ekonomi/rss'
            );

            $news = collect($items)
                ->filter(function ($item) {
                    $text = ($item['title'] ?? '') . ' ' .
                            ($item['description'] ?? '');

                    return preg_match(
                        '/ekonomi|keuangan|trading|perdagangan|komoditas|emas|minyak|rupiah|dolar|ihsg|saham|bursa|investasi|pasar|ekspor|impor/i',
                        $text
                    );
                })
                ->sortByDesc(function ($item) {
                    try {
                        return Carbon::parse($item['pubDate'] ?? null)->timestamp;
                    } catch (\Throwable $e) {
                        return 0;
                    }
                })
                ->take(3)
                ->map(function ($item) {
                    try {
                        $date = Carbon::parse($item['pubDate'] ?? null)
                            ->translatedFormat('d F Y');
                    } catch (\Throwable $e) {
                        $date = '';
                    }

                    return [
                        'title' => $item['title'] ?? '',
                        'link' => $item['link'] ?? '#',
                        'excerpt' => Str::limit(
                            strip_tags($item['description'] ?? ''),
                            150
                        ),
                        'date' => $date,
                        'image' => $item['image'] ?? null,
                    ];
                })
                ->values();

        } catch (\Throwable $e) {
            $news = collect();
        }

        return view('pages.home', compact('news'));
    }
}
