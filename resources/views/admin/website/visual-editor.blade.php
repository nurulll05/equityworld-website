
@extends('layouts.editor')

@section('title', 'Visual Editor Website')
@section('content')

<div class="min-h-screen bg-slate-100 p-6">

    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-xl font-bold text-slate-800">
                Visual Editor Website
            </h1>
            <p class="mt-1 text-sm text-slate-500">
                Pengelolaan tampilan website PT. Equityworld Futures
            </p>
        </div>

        <a href="{{ route('admin.dashboard') }}"
           class="rounded-lg bg-slate-800 px-4 py-2 text-sm text-white">
            Kembali ke Dashboard
        </a>
    </div>

    <div class="rounded-xl bg-white p-8 text-center shadow-sm">
        <div class="mb-3 text-4xl">🌐</div>

        <h2 class="text-lg font-bold text-slate-800">
            Mode Visual Editor
        </h2>

        <p class="mt-2 text-sm text-slate-500">
            Area ini nantinya menampilkan website publik secara utuh
            dengan fitur pengeditan khusus Administrator.
        </p>
    </div>

</div>

@endsection
