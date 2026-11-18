
{{-- ==========================================
     FORM REGISTRASI
=========================================== --}}

<form
    id="registerForm"
    action="{{ route('auth.register') }}"
    method="POST"
    class="hidden space-y-3"
>
    @csrf

    {{-- JUDUL --}}

    <div class="mb-3">

        <h2 class="text-xl font-extrabold leading-tight text-[#101D35]">
            Buat Akun Baru
        </h2>

        <p class="mt-1.5 text-xs leading-5 text-slate-500">
            Lengkapi informasi berikut untuk membuat akun Equityworld Futures.
        </p>

    </div>


    {{-- BARIS PERTAMA --}}

    <div class="grid grid-cols-2 gap-3">

        {{-- NAMA LENGKAP --}}

        <div>

            <label for="registerName" class="mb-1.5 block text-xs font-semibold text-slate-700">
                Nama Lengkap
            </label>

            <input
                type="text"
                id="registerName"
                name="name"
                placeholder="Nama lengkap"
                autocomplete="name"
                required
                class="h-10 w-full min-w-0 rounded-lg border border-slate-200 bg-slate-50 px-3 text-xs text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-orange-400 focus:bg-white focus:ring-2 focus:ring-orange-500/10"
            >

        </div>


        {{-- EMAIL --}}

        <div>

            <label for="registerEmail" class="mb-1.5 block text-xs font-semibold text-slate-700">
                Email Aktif
            </label>

            <input
                type="email"
                id="registerEmail"
                name="email"
                placeholder="nama@email.com"
                autocomplete="email"
                required
                class="h-10 w-full min-w-0 rounded-lg border border-slate-200 bg-slate-50 px-3 text-xs text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-orange-400 focus:bg-white focus:ring-2 focus:ring-orange-500/10"
            >

        </div>

    </div>


    {{-- BARIS KEDUA --}}

    <div class="grid grid-cols-2 gap-3">

        {{-- NOMOR WHATSAPP --}}

        <div>

            <label for="registerPhone" class="mb-1.5 block text-xs font-semibold text-slate-700">
                Nomor WhatsApp
            </label>

            <input
                type="tel"
                id="registerPhone"
                name="phone"
                placeholder="081234567890"
                autocomplete="tel"
                required
                class="h-10 w-full min-w-0 rounded-lg border border-slate-200 bg-slate-50 px-3 text-xs text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-orange-400 focus:bg-white focus:ring-2 focus:ring-orange-500/10"
            >

        </div>


        {{-- PASSWORD --}}

        <div>

            <label for="registerPassword" class="mb-1.5 block text-xs font-semibold text-slate-700">
                Kata Sandi
            </label>

            <div class="relative">

                <input
                    type="password"
                    id="registerPassword"
                    name="password"
                    placeholder="Minimal 8 karakter"
                    minlength="8"
                    autocomplete="new-password"
                    required
                    class="h-10 w-full min-w-0 rounded-lg border border-slate-200 bg-slate-50 px-3 pr-9 text-xs text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-orange-400 focus:bg-white focus:ring-2 focus:ring-orange-500/10"
                >

                <button
                    type="button"
                    onclick="toggleAuthPassword('registerPassword', this)"
                    class="absolute inset-y-0 right-2 flex appearance-none items-center border-0 bg-transparent p-0 text-slate-400 shadow-none outline-none transition hover:text-orange-500 focus:outline-none"
                    aria-label="Tampilkan kata sandi"
                >

                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z" stroke-width="1.8"/>
                        <circle cx="12" cy="12" r="3" stroke-width="1.8"/>
                    </svg>

                </button>

            </div>

        </div>

    </div>


    {{-- KONFIRMASI PASSWORD --}}

    <div>

        <label for="registerConfirmation" class="mb-1.5 block text-xs font-semibold text-slate-700">
            Konfirmasi Kata Sandi
        </label>

        <input
            type="password"
            id="registerConfirmation"
            name="password_confirmation"
            placeholder="Ulangi kata sandi"
            autocomplete="new-password"
            required
            class="h-10 w-full rounded-lg border border-slate-200 bg-slate-50 px-3 text-xs text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-orange-400 focus:bg-white focus:ring-2 focus:ring-orange-500/10"
        >

    </div>


    {{-- PERSETUJUAN --}}

    <div class="pt-1">

        <label class="flex cursor-pointer items-start gap-2 text-[11px] leading-5 text-slate-500">

            <input
                type="checkbox"
                name="agreement"
                required
                class="mt-0.5 h-3.5 w-3.5 shrink-0 accent-orange-500"
            >

            <span>
                Saya menyetujui ketentuan penggunaan dan kebijakan privasi yang berlaku.
            </span>

        </label>

    </div>


    {{-- TOMBOL REGISTRASI --}}

    <div class="pt-1">

        <button
            type="submit"
            class="mx-auto flex h-10 w-full max-w-[230px] items-center justify-center gap-2 rounded-lg bg-[#101D35] px-5 text-xs font-bold tracking-wide text-white shadow-md shadow-slate-900/10 transition hover:bg-orange-500 hover:shadow-orange-500/20"
        >

            BUAT AKUN

            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M5 12h14m-6-6 6 6-6 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

        </button>

    </div>


    {{-- PINDAH KE LOGIN --}}

    <p class="pt-1 text-center text-xs text-slate-500">

        Sudah memiliki akun?

        <button
            type="button"
            onclick="window.switchAuthTab('login')"
            class="appearance-none border-0 bg-transparent p-0 font-bold text-orange-500 shadow-none outline-none transition hover:text-orange-600 focus:outline-none"
        >
            Login Sekarang
        </button>

    </p>

</form>