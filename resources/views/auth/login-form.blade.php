{{-- FORM LOGIN --}}
<form
    id="loginForm"
    action="{{ route('auth.login') }}"
    method="POST"
    class="space-y-4"
>
    @csrf

    {{-- KONTEKS LOGIN --}}
    <input
        type="hidden"
        id="loginContext"
        name="auth_context"
        value="{{ session('auth_context', 'general') }}"
    >
    
    @if ($errors->any())
        <div class="rounded-lg border border-red-200 bg-red-50 px-3 py-3 text-xs text-red-700">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    {{-- JUDUL --}}

    <div class="mb-5">

        <h2 class="text-2xl font-extrabold leading-tight text-[#101D35]">
            Selamat Datang!
        </h2>

        <p class="mt-1.5 text-xs leading-5 text-slate-500">
            Silakan masukkan akun Anda untuk melanjutkan.
        </p>

    </div>

    {{-- NOTIFIKASI REGISTRASI BERHASIL --}}
    @if(session('open_auth_modal') === 'login' && session('success'))

        <div class="mb-3 rounded-lg border border-green-200 bg-green-50 px-3 py-3 text-xs leading-5 text-green-700">

            <div class="flex items-start gap-2">

                <svg class="mt-0.5 h-4 w-4 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path
                        d="M5 12l4 4L19 6"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />

                </svg>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        </div>

    @endif

    {{-- EMAIL --}}

    <div>

        <label
            for="loginEmail"
            class="mb-1.5 block text-xs font-semibold text-slate-700"
        >
            Email
        </label>

        <div class="relative">

            <span class="absolute inset-y-0 left-3 flex items-center text-slate-400">

                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <rect x="3" y="5" width="18" height="14" rx="2" stroke-width="1.8"/>
                    <path d="m4 7 8 6 8-6" stroke-width="1.8" stroke-linecap="round"/>
                </svg>

            </span>

            <input
                type="email"
                id="loginEmail"
                name="email"
                placeholder="Masukkan email Anda"
                autocomplete="email"
                required
                class="h-10 w-full appearance-none !border-2 !border-solid !border-slate-500 rounded-lg bg-slate-50 pl-10 pr-3 text-xs text-slate-800 outline-none transition-all duration-200 placeholder:text-slate-400 focus:!border-blue-500 focus:bg-white focus:!ring-2 focus:!ring-blue-500/10"
            >
        </div>

    </div>


    {{-- PASSWORD --}}
    <div>

        <label
            for="loginPassword"
            class="mb-1.5 block text-xs font-semibold text-slate-700"
        >
            Kata Sandi
        </label>

        <div class="relative">

            <span class="absolute inset-y-0 left-3 flex items-center text-slate-400">

                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <rect x="4" y="10" width="16" height="11" rx="2" stroke-width="1.8"/>
                    <path d="M8 10V7a4 4 0 0 1 8 0v3" stroke-width="1.8" stroke-linecap="round"/>
                </svg>

            </span>

            <input
                type="password"
                id="loginPassword"
                name="password"
                placeholder="Masukkan kata sandi"
                autocomplete="current-password"
                required
                class="h-10 w-full appearance-none !border-2 !border-solid !border-slate-500 rounded-lg bg-slate-50 pl-10 pr-10 text-xs text-slate-800 outline-none transition-all duration-200 placeholder:text-slate-400 focus:!border-blue-500 focus:bg-white focus:!ring-2 focus:!ring-blue-500/10"
            >

            {{-- TOMBOL MATA TANPA KOTAK --}}
            <button
                type="button"
                class="absolute inset-y-0 right-3 flex appearance-none items-center border-0 bg-transparent p-0 text-slate-400 shadow-none outline-none transition hover:text-orange-500 focus:outline-none"
                onclick="toggleAuthPassword('loginPassword', this)"
                aria-label="Tampilkan kata sandi"
            >

                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z" stroke-width="1.8"/>
                    <circle cx="12" cy="12" r="3" stroke-width="1.8"/>
                </svg>

            </button>

        </div>

    </div>


    {{-- INGAT SAYA DAN LUPA PASSWORD --}}
    <div class="flex items-center justify-between gap-2 pt-1">

        <label class="flex cursor-pointer items-center gap-2 text-xs text-slate-600">

            <input
                type="checkbox"
                name="remember"
                class="h-3.5 w-3.5 rounded border-slate-300 accent-orange-500"
            >

            Ingat saya

        </label>

        <a
            href="{{ route('password.request') }}"
            class="text-xs font-semibold text-orange-500 transition hover:text-orange-600"
        >
            Lupa kata sandi?
        </a>

    </div>

    {{-- TOMBOL LOGIN --}}
    <div class="pt-1">

        <button
            type="submit"
            class="mx-auto flex h-10 w-full max-w-[230px] items-center justify-center gap-2 rounded-lg border border-[#263D60] bg-[#101D35] px-5 text-xs font-bold tracking-wide text-white shadow-md shadow-slate-900/10 transition-all duration-300 hover:border-blue-600 hover:bg-blue-700 hover:shadow-blue-900/20 active:scale-[0.98]"
        >

            LOGIN

        </button>

    </div>


    {{-- PINDAH KE REGISTRASI --}}

    <p class="pt-1 text-center text-xs text-slate-500">

        Belum memiliki akun?

        <button
            type="button"
            onclick="window.switchAuthTab('register')"
            class="appearance-none border-0 bg-transparent p-0 font-bold text-orange-500 shadow-none outline-none transition hover:text-orange-600 focus:outline-none"
        >
            Daftar Sekarang
        </button>

    </p>

</form>