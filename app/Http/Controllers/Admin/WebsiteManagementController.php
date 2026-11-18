<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CmsService;
use App\Services\NewsService;
use App\Services\RssReader;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class WebsiteManagementController extends Controller
{
    /**
     * Menampilkan Visual Editor.
     */
    public function visual(
        NewsService $newsService,
        RssReader $rssReader,
        CmsService $cmsService
    ) {
        $news = $newsService
            ->getRelevantNews($rssReader)
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

        return view('pages.home', [
            'news' => $news,
            'isVisualEditor' => true,
            'cmsContent' => $cmsService->all(),
        ]);
    }

    /**
     * Menyimpan perubahan konten Visual Editor.
     */
    public function saveContent(
        Request $request,
        CmsService $cmsService
    ) {
        /*
        |--------------------------------------------------------------------------
        | Kompatibilitas dengan editor lama (home.hero)
        |--------------------------------------------------------------------------
        */

        if ($request->has('segments')) {
            $validated = $request->validate([
                'segments' => ['required', 'array', 'min:1'],

                'segments.*.text' => [
                    'required',
                    'string',
                    'max:120'
                ],

                'segments.*.color' => [
                    'required',
                    'regex:/^#[0-9A-Fa-f]{6}$/'
                ],

                'segments.*.line_break_after' => [
                    'required',
                    'boolean'
                ],

                'font' => [
                    'required',
                    'in:Manrope,DM Sans,Arial,Georgia'
                ],

                'size' => [
                    'required',
                    'integer',
                    'min:20',
                    'max:100'
                ],

                'weight' => [
                    'required',
                    'in:400,500,600,700,800,900'
                ],
            ]);

            $cmsService->update('home.hero', $validated);

            return response()->json([
                'success' => true,
                'message' => 'Perubahan berhasil disimpan.',
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Validasi format universal
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'key' => [
                'required',
                'string',
                'max:150',
                'regex:/^[a-z0-9_-]+(\.[a-z0-9_-]+)+$/'
            ],

            'type' => [
                'required',
                'in:text,image,button,background'
            ],

            'value' => [
                'required',
                'array'
            ],
        ]);

        $allowedPages = [
            'home',
            'tentang-kami',
            'legalitas',
            'karier',
            'berita',
            'kontak',
            'magang',
        ];

        $page = explode('.', $validated['key'])[0];

        abort_unless(
            in_array($page, $allowedPages, true),
            422
        );

        /*
        |--------------------------------------------------------------------------
        | Validasi berdasarkan jenis elemen
        |--------------------------------------------------------------------------
        */

        $rules = match ($validated['type']) {

            'text' => [
                'value.content' => [
                    'required_without:value.segments',
                    'nullable',
                    'string',
                    'max:5000'
                ],

                'value.segments' => [
                    'required_without:value.content',
                    'nullable',
                    'array',
                    'min:1'
                ],

                'value.segments.*.text' => [
                    'required_with:value.segments',
                    'string',
                    'max:120'
                ],

                'value.segments.*.color' => [
                    'nullable',
                    'regex:/^#[0-9A-Fa-f]{6}$/'
                ],

                'value.segments.*.line_break_after' => [
                    'nullable',
                    'boolean'
                ],

                'value.color' => [
                    'nullable',
                    'regex:/^#[0-9A-Fa-f]{6}$/'
                ],

                'value.font' => [
                    'nullable',
                    'in:Manrope,DM Sans,Arial,Georgia'
                ],

                'value.size' => [
                    'nullable',
                    'integer',
                    'min:8',
                    'max:120'
                ],

                'value.weight' => [
                    'nullable',
                    'in:400,500,600,700,800,900'
                ],

                'value.align' => [
                    'nullable',
                    'in:left,center,right'
                ],
            ],

            'image' => [
                'value.src' => [
                    'required',
                    'string',
                    'max:2048'
                ],

                'value.alt' => [
                    'nullable',
                    'string',
                    'max:255'
                ],
            ],

            'button' => [
                'value.label' => [
                    'required',
                    'string',
                    'max:255'
                ],

                'value.url' => [
                    'required',
                    'string',
                    'max:2048'
                ],

                'value.background_color' => [
                    'nullable',
                    'regex:/^#[0-9A-Fa-f]{6}$/'
                ],

                'value.text_color' => [
                    'nullable',
                    'regex:/^#[0-9A-Fa-f]{6}$/'
                ],
            ],

            'background' => [
                'value.color' => [
                    'nullable',
                    'regex:/^#[0-9A-Fa-f]{6}$/'
                ],

                'value.image' => [
                    'nullable',
                    'string',
                    'max:2048'
                ],
            ],
        };

        $data = $request->validate($rules);

        /*
        |--------------------------------------------------------------------------
        | Simpan ke CMS
        |--------------------------------------------------------------------------
        */

        $cmsService->update(
            $validated['key'],
            $data['value']
        );

        return response()->json([
            'success' => true,
            'message' => 'Perubahan berhasil disimpan.',
        ]);
    }

    /**
     * Menampilkan editor berdasarkan halaman.
     */
    public function pageEditor(
        $page,
        CmsService $cmsService
    ) {
        $pages = [
            'beranda' => 'Beranda',
            'tentang-kami' => 'Tentang Kami',
            'legalitas' => 'Pengelolaan Legalitas',
            'karier' => 'Pengelolaan Karier',
            'berita' => 'Pengelolaan Berita',
            'kontak' => 'Kontak',
        ];

        abort_unless(
            array_key_exists($page, $pages),
            404
        );

        return view('admin.website.page-editor', [
            'page' => $page,
            'pageTitle' => $pages[$page],
            'cmsContent' => $cmsService->all(),
        ]);
    }
}
