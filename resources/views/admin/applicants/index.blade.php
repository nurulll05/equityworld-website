
@extends('layouts.admin')

@section('title', 'Data Pelamar')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div>
        <h1 class="text-2xl font-bold text-[#101D35]">
            Data Pelamar
        </h1>
        <p class="mt-1 text-sm text-slate-500">
            Kelola data pelamar Staff dan Program Magang.
        </p>
    </div>

    {{-- STATISTIK --}}
    <div class="grid gap-4 md:grid-cols-2">

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Pelamar Staff</p>
            <h2 class="mt-2 text-3xl font-bold text-[#101D35]">
                {{ $totalStaff }}
            </h2>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Pelamar Magang</p>
            <h2 class="mt-2 text-3xl font-bold text-[#101D35]">
                {{ $totalInternship }}
            </h2>
        </div>

    </div>

    {{-- DAFTAR PELAMAR --}}
    <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">

        <div class="mb-5">
            <h2 class="text-lg font-bold text-[#101D35]">
                Daftar Pelamar
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                Informasi seluruh pelamar yang telah mengirimkan lamaran.
            </p>
        </div>

        {{-- PENCARIAN DAN FILTER --}}
        <form
            id="applicantFilterForm"
            method="GET"
            action="{{ route('admin.applicants.index') }}"
            class="mb-5"
            style="display: flex; flex-direction: row; align-items: center; gap: 12px; width: 100%;"
        >

            {{-- SEARCH --}}
            <input
                type="text"
                id="applicantSearch"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari nama, email, atau posisi..."
                autocomplete="off"
                style="flex: 1.5; min-width: 0; height: 44px; box-sizing: border-box; border: 1px solid #CBD5E1; border-radius: 10px; padding: 0 16px;"
                class="bg-white text-sm text-slate-700 outline-none focus:border-[#101D35] focus:ring-1 focus:ring-[#101D35]"
            >

            {{-- FILTER JENIS --}}
            <select
                name="type"
                id="applicantType"
                style="flex: 1; min-width: 0; height: 44px; box-sizing: border-box; border: 1px solid #CBD5E1; border-radius: 10px; padding: 0 16px;"
                class="bg-white text-sm text-slate-700 outline-none focus:border-[#101D35] focus:ring-1 focus:ring-[#101D35]"
            >
                <option value="">Semua Jenis Lamaran</option>
                <option value="staff" {{ request('type') == 'staff' ? 'selected' : '' }}>
                    Staff
                </option>
                <option value="internship" {{ request('type') == 'internship' ? 'selected' : '' }}>
                    Magang
                </option>
            </select>

            {{-- FILTER STATUS --}}
            <select
                name="status"
                id="applicantStatus"
                style="flex: 1; min-width: 0; height: 44px; box-sizing: border-box; border: 1px solid #CBD5E1; border-radius: 10px; padding: 0 16px;"
                class="bg-white text-sm text-slate-700 outline-none focus:border-[#101D35] focus:ring-1 focus:ring-[#101D35]"
            >
                <option value="">Semua Status</option>
                <option value="submitted" {{ request('status') == 'submitted' ? 'selected' : '' }}>
                    Menunggu Pemeriksaan
                </option>
                <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>
                    Diterima
                </option>
                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>
                    Ditolak
                </option>
            </select>

            {{-- RESET --}}
            <a
                href="{{ route('admin.applicants.index') }}"
                title="Reset pencarian dan filter"
                aria-label="Reset pencarian dan filter"
                style="width: 44px; height: 44px; min-width: 44px; display: flex; align-items: center; justify-content: center; box-sizing: border-box; border: 1px solid #CBD5E1; border-radius: 10px;"
                class="bg-white text-slate-500 transition hover:border-[#101D35] hover:bg-slate-50 hover:text-[#101D35]"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="19"
                    height="19"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M3 12a9 9 0 1 0 3-6.7L3 8"/>
                    <path d="M3 3v5h5"/>
                </svg>
            </a>

        </form>

        {{-- TABEL --}}
        <div class="overflow-x-auto">

            <table class="w-full min-w-[950px] text-left text-sm">

                <thead class="border-y border-slate-200 bg-slate-50 text-slate-600">
                    <tr>
                        <th class="px-4 py-3 font-semibold">No.</th>
                        <th class="px-4 py-3 font-semibold">Nama Pelamar</th>
                        <th class="px-4 py-3 font-semibold">Jenis</th>
                        <th class="px-4 py-3 font-semibold">Posisi</th>
                        <th class="px-4 py-3 font-semibold">Email</th>
                        <th class="px-4 py-3 font-semibold">Tanggal Melamar</th>
                        <th class="px-4 py-3 font-semibold">Status</th>
                        <th class="px-4 py-3 text-center font-semibold">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse ($applicants as $index => $applicant)

                        <tr class="hover:bg-slate-50">

                            <td class="px-4 py-4 text-slate-500">
                                {{ $applicants->firstItem() + $index }}
                            </td>

                            <td class="px-4 py-4 font-medium text-[#101D35]">
                                {{ $applicant->full_name }}
                            </td>

                            <td class="px-4 py-4">
                                @if ($applicant->job_type === 'staff')
                                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-medium text-blue-700">
                                        Staff
                                    </span>
                                @else
                                    <span class="rounded-full bg-purple-50 px-3 py-1 text-xs font-medium text-purple-700">
                                        Magang
                                    </span>
                                @endif
                            </td>

                            <td class="px-4 py-4 text-slate-600">
                                {{ $applicant->position }}
                            </td>

                            <td class="px-4 py-4 text-slate-600">
                                {{ $applicant->email }}
                            </td>

                            <td class="px-4 py-4 text-slate-600">
                                {{ $applicant->created_at?->format('d/m/Y') }}
                            </td>

                            <td class="px-4 py-4">
                                @php
                                    $statusLabels = [
                                        'submitted' => ['Menunggu Pemeriksaan', 'bg-amber-50 text-amber-700'],
                                        'processing' => ['Diproses', 'bg-blue-50 text-blue-700'],
                                        'accepted' => ['Diterima', 'bg-green-50 text-green-700'],
                                        'rejected' => ['Ditolak', 'bg-red-50 text-red-700'],
                                    ];

                                    $statusInfo = $statusLabels[$applicant->status]
                                        ?? [$applicant->status, 'bg-slate-100 text-slate-600'];
                                @endphp

                                <span class="rounded-full px-3 py-1 text-xs font-medium {{ $statusInfo[1] }}">
                                    {{ $statusInfo[0] }}
                                </span>
                            </td>

                            <td class="px-4 py-4 text-center">
                                <button
                                    type="button"
                                    onclick="showApplicant({{ $applicant->id }})"
                                    class="rounded-lg border border-[#34445D] bg-[#101D35] px-3 py-2 text-xs font-medium text-white outline-none transition hover:bg-[#1b3154] focus:ring-1 focus:ring-[#34445D]"
                                >
                                    Lihat Detail
                                </button>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="px-4 py-10 text-center text-slate-400">
                                Belum ada data pelamar.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- PAGINATION --}}
        <div class="mt-5">
            {{ $applicants->links() }}
        </div>

    </div>

</div>

{{-- MODAL DETAIL PELAMAR --}}
<div
    id="applicantModal"
    class="fixed inset-0 z-[100] hidden items-center justify-center p-4"
    style="background-color: rgba(16, 29, 53, 0.55);"
    onclick="if(event.target === this) closeApplicantModal()"
>
    
    <div
        class="w-full max-w-3xl overflow-hidden rounded-2xl border border-slate-200 shadow-2xl"
        style="background-color: #F8FAFC; max-height: 90vh; opacity: 1;"
    >

    {{-- HEADER POPUP --}}
    <div
        class="sticky top-0 z-10 flex items-center justify-between border-b border-slate-200 px-6 py-4"
        style="background-color: #FFFFFF;"
    >
        <div>
            <h2 class="text-lg font-bold text-[#101D35]">
                Detail Pelamar
            </h2>
            <p class="text-xs text-slate-500">
                Informasi lengkap dan dokumen pelamar
            </p>
        </div>

        <button
            type="button"
            onclick="closeApplicantModal()"
            aria-label="Tutup detail pelamar"
            class="border-0 bg-transparent p-2 text-slate-500 outline-none shadow-none transition hover:text-[#101D35] focus:outline-none focus:ring-0"
        >
            ✕
        </button>
    </div>

    {{-- AREA SCROLL --}}
    <div
        class="overflow-y-auto"
        style="max-height: calc(90vh - 85px); background-color: #F8FAFC;"
    >
        <div
            id="applicantDetailContent"
            class="space-y-6 p-6"
            style="background-color: #F8FAFC;"
        >
            <div class="py-10 text-center text-sm text-slate-400">
                Memuat data pelamar...
            </div>
        </div>
    </div>
</div>

{{-- MODAL PRATINJAU DOKUMEN --}}
    <div
        id="documentPreviewModal"
        class="fixed inset-0 z-[120] hidden items-center justify-center bg-black/60 p-3 sm:p-6"
        onclick="if(event.target === this) closeDocumentPreview()"
    >
        <div
            class="flex w-full flex-col overflow-hidden rounded-xl border border-slate-200 bg-white shadow-2xl"
            style="max-width: 520px; max-height: 75vh;"
        >

            {{-- HEADER --}}
            <div class="flex items-center justify-between border-b border-slate-200 bg-white px-5 py-4">
                <div>
                    <h2 class="text-base font-bold text-[#101D35]" id="documentPreviewTitle">
                        Pratinjau Dokumen
                    </h2>
                    <p class="text-xs text-slate-500">
                        Dokumen pelamar
                    </p>
                </div>

                <button
                    type="button"
                    onclick="closeDocumentPreview()"
                    aria-label="Tutup pratinjau"
                    class="border-0 bg-transparent p-2 text-slate-500 transition hover:text-[#101D35]"
                >
                    ✕
                </button>
            </div>

            {{-- ISI DOKUMEN --}}
            <div class="flex items-center justify-center bg-slate-100 p-4">

                <div
                    class="flex w-full items-center justify-center overflow-hidden rounded-lg border border-slate-200 bg-white p-2"
                    style="height: 360px;"
                >

                    {{-- PREVIEW PDF --}}
                    <iframe
                        id="documentPreviewFrame"
                        src="about:blank"
                        class="hidden h-full w-full border-0 bg-white"
                        title="Pratinjau PDF"
                    ></iframe>

                    {{-- PREVIEW GAMBAR --}}
                    <img
                        id="documentPreviewImage"
                        src=""
                        alt="Pratinjau dokumen pelamar"
                        style="max-width: 100%; max-height: 100%; width: auto; height: auto; object-fit: contain;"
                        class="hidden"
                    >

                    {{-- PESAN ERROR --}}
                    <p
                        id="documentPreviewError"
                        class="hidden p-5 text-center text-sm text-red-600"
                    ></p>

                </div>
            </div>
        </div>
    </div>

<script>
const detailUrlTemplate = @json(route('admin.applicants.show', ['id' => '__ID__']));
const documentUrlTemplate = @json(route('admin.applicants.documents.view', [
    'id' => '__ID__',
    'document' => '__DOCUMENT__'
]));

let documentPreviewObjectUrl = null;

function escapeHtml(value) {
    return String(value ?? '-').replace(/[&<>"']/g, function(character) {
        return {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        }[character];
    });
}

function showApplicant(id) {
    const modal = document.getElementById('applicantModal');
    const content = document.getElementById('applicantDetailContent');

    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.classList.add('overflow-hidden');

    content.innerHTML = `
        <div class="py-10 text-center text-sm text-slate-400">
            Memuat data pelamar...
        </div>
    `;

    const url = detailUrlTemplate.replace('__ID__', encodeURIComponent(id));

    fetch(url, {
        headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        credentials: 'same-origin'
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Gagal mengambil data pelamar.');
        }

        return response.json();
    })
    .then(applicant => {
        const statusLabels = {
            submitted: 'Menunggu Pemeriksaan',
            processing: 'Diproses',
            accepted: 'Diterima',
            rejected: 'Ditolak'
        };

        const documents = [
            { key: 'cv', label: 'CV / Resume', path: applicant.cv_path },
            { key: 'transcript', label: 'Transkrip Nilai', path: applicant.transcript_path },
            { key: 'photo', label: 'Pas Foto', path: applicant.photo_path },
            { key: 'ktp', label: 'KTP', path: applicant.ktp_path }
        ];

        const documentHtml = documents.map(document => {
            if (!document.path) return '';

            const documentUrl = documentUrlTemplate
                .replace('__ID__', encodeURIComponent(applicant.id))
                .replace('__DOCUMENT__', encodeURIComponent(document.key));

            return `
                <div class="flex items-center justify-between gap-3 rounded-lg border border-slate-200 p-3">
                    <div class="flex items-center gap-3">
                        <span class="text-xl text-red-600">📄</span>
                        <span class="text-sm font-medium text-slate-700">
                            ${escapeHtml(document.label)}
                        </span>
                    </div>

                    <button
                        type="button"
                        onclick="openDocumentPreview('${documentUrl}', '${escapeHtml(document.label)}')"
                        class="shrink-0 rounded-lg border border-[#101D35]/20 bg-[#101D35] px-3 py-2 text-xs font-medium text-white transition hover:bg-[#1b3154]"
                    >
                        Lihat Dokumen
                    </button>
                </div>
            `;
        }).join('');

        const field = (label, value) => `
            <div>
                <p class="text-xs text-slate-500">${label}</p>
                <p class="mt-1 break-words text-sm font-medium text-[#101D35]">
                    ${escapeHtml(value)}
                </p>
            </div>
        `;

        content.innerHTML = `
            <section>
                <h3 class="mb-4 border-b border-slate-200 pb-2 text-sm font-bold text-[#101D35]">
                    Informasi Pribadi
                </h3>

                <div class="grid gap-x-8 gap-y-5 pl-4 sm:grid-cols-2">
                    ${field('Nama Lengkap', applicant.full_name)}
                    ${field('Tempat Lahir', applicant.birth_place)}
                    ${field('Tanggal Lahir', applicant.birth_date)}
                    ${field('Jenis Kelamin', applicant.gender)}
                    ${field('Nomor Telepon', applicant.phone)}
                    ${field('Email', applicant.email)}
                    ${field('Domisili', applicant.domicile)}
                    ${field('Alamat Lengkap', applicant.address)}
                </div>
            </section>

            <section>
                <h3 class="mb-4 border-b border-slate-200 pb-2 text-sm font-bold text-[#101D35]">
                    Informasi Lamaran
                </h3>

                <div class="grid gap-x-8 gap-y-5 pl-4 sm:grid-cols-2">
                    ${field('Jenis Lamaran', applicant.job_type === 'staff' ? 'Staff' : 'Magang')}
                    ${field('Cabang', applicant.branch)}
                    ${field('Posisi', applicant.position)}
                    ${field('Ketersediaan', applicant.availability)}
                    ${field('Pendidikan', applicant.education)}
                    ${field('Universitas', applicant.university)}
                    ${field('Tanggal Melamar', applicant.created_at)}
                    ${field('Status Lamaran', statusLabels[applicant.status] ?? applicant.status)}
                </div>
            </section>

            <section>
                <h3 class="mb-4 border-b border-slate-200 pb-2 text-sm font-bold text-[#101D35]">
                    Dokumen Pelamar
                </h3>

                <div class="space-y-3">
                    ${documentHtml || `
                        <p class="text-sm text-slate-400">
                            Belum ada dokumen yang tersedia.
                        </p>
                    `}
                </div>
            </section>
        `;
    })
    .catch(error => {
        content.innerHTML = `
            <div class="rounded-lg bg-red-50 p-4 text-sm text-red-700">
                ${escapeHtml(error.message)}
                Silakan coba kembali.
            </div>
        `;
    });
}

function closeApplicantModal() {
    const modal = document.getElementById('applicantModal');
    
    modal.classList.add('hidden');
    modal.classList.remove('flex');

    closeDocumentPreview();

    document.body.classList.remove('overflow-hidden');
}

document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const documentModal = document.getElementById('documentPreviewModal');

        if (!documentModal.classList.contains('hidden')) {
            closeDocumentPreview();
        } else {
            closeApplicantModal();
        }
    }
});

function openDocumentPreview(url, title) {
    const modal = document.getElementById('documentPreviewModal');
    const frame = document.getElementById('documentPreviewFrame');
    const image = document.getElementById('documentPreviewImage');
    const titleElement = document.getElementById('documentPreviewTitle');

    titleElement.textContent = title;

    // Bersihkan preview sebelumnya
    frame.src = 'about:blank';
    frame.classList.add('hidden');

    image.src = '';
    image.classList.add('hidden');

    document.getElementById('documentPreviewError').classList.add('hidden');

    if (documentPreviewObjectUrl) {
        URL.revokeObjectURL(documentPreviewObjectUrl);
        documentPreviewObjectUrl = null;
    }

    modal.classList.remove('hidden');
    modal.classList.add('flex');

    document.body.classList.add('overflow-hidden');

    fetch(url, {
        credentials: 'same-origin'
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Dokumen gagal dimuat.');
        }

        return response.blob();
    })
    .then(blob => {
        documentPreviewObjectUrl = URL.createObjectURL(blob);

        if (blob.type === 'application/pdf') {
            frame.src = documentPreviewObjectUrl + '#view=Fit';
            frame.classList.remove('hidden');

        } else if (blob.type.startsWith('image/')) {
            image.src = documentPreviewObjectUrl;
            image.classList.remove('hidden');

        } else {
            throw new Error('Format dokumen tidak didukung.');
        }
    })
    .catch(error => {
        const errorElement = document.getElementById('documentPreviewError');

        errorElement.textContent = error.message;
        errorElement.classList.remove('hidden');
    });
}

function closeDocumentPreview() {
    const modal = document.getElementById('documentPreviewModal');
    const frame = document.getElementById('documentPreviewFrame');
    const image = document.getElementById('documentPreviewImage');

    frame.src = 'about:blank';
    frame.classList.add('hidden');

    image.src = '';
    image.classList.add('hidden');

    document.getElementById('documentPreviewError').classList.add('hidden');

    if (documentPreviewObjectUrl) {
        URL.revokeObjectURL(documentPreviewObjectUrl);
        documentPreviewObjectUrl = null;
    }

    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// AUTO SEARCH DAN FILTER PELAMAR
const applicantFilterForm = document.getElementById('applicantFilterForm');
const applicantSearch = document.getElementById('applicantSearch');
const applicantType = document.getElementById('applicantType');
const applicantStatus = document.getElementById('applicantStatus');

let applicantSearchTimer;

if (applicantFilterForm) {

    // Pencarian otomatis dengan jeda 400ms
    applicantSearch.addEventListener('input', function () {
        clearTimeout(applicantSearchTimer);

        applicantSearchTimer = setTimeout(function () {
            applicantFilterForm.requestSubmit();
        }, 400);
    });

    // Filter jenis otomatis
    applicantType.addEventListener('change', function () {
        clearTimeout(applicantSearchTimer);
        applicantFilterForm.requestSubmit();
    });

    // Filter status otomatis
    applicantStatus.addEventListener('change', function () {
        clearTimeout(applicantSearchTimer);
        applicantFilterForm.requestSubmit();
    });

}

</script>

@endsection
