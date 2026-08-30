<x-guest-layout>
    <div class="mb-5 border-b border-slate-200 pb-3">
        <h1 class="text-lg font-bold text-slate-900">Masuk ke Portal SIA</h1>
        <p class="text-xs text-slate-500 mt-0.5">Gunakan akun administrator terdaftar.</p>
    </div>

    <x-auth-session-status class="mb-4 text-xs font-semibold text-emerald-700 bg-emerald-50 p-2.5 rounded border border-emerald-200" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <label for="email" class="block text-xs font-semibold text-slate-700 mb-1">Alamat Email Terdaftar</label>
            <input 
                id="email" 
                class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3 text-slate-900" 
                type="email" 
                name="email" 
                value="{{ old('email', 'admin@miyamasuzaka.test') }}" 
                required 
                autofocus 
                autocomplete="username" 
                placeholder="nama@miyamasuzaka.test"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs text-rose-600" />
        </div>

        <div>
            <label for="password" class="block text-xs font-semibold text-slate-700 mb-1">Kata Sandi (Password)</label>
            <input 
                id="password" 
                class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3 text-slate-900" 
                type="password" 
                name="password" 
                value="password" 
                required 
                autocomplete="current-password" 
                placeholder="••••••••"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-xs text-rose-600" />
        </div>

        <div class="flex items-center justify-between text-xs">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-purple-700 focus:ring-purple-700" name="remember">
                <span class="ms-2 text-slate-600">Ingat sesi saya</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-purple-700 hover:text-purple-800 font-medium" href="{{ route('password.request') }}">
                    Lupa kata sandi?
                </a>
            @endif
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full py-2.5 px-4 bg-purple-700 hover:bg-purple-800 text-white font-bold text-xs rounded transition-colors shadow-sm text-center">
                Masuk ke Sistem SIA
            </button>
        </div>
    </form>

    <div class="mt-6 pt-4 border-t border-slate-100 text-xs text-slate-500">
        <span class="font-semibold text-slate-700 block mb-1.5">Akun Demo Administrator:</span>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-1.5 text-[11px]">
            <div>• <strong class="text-slate-700">Super Administrator:</strong> <span class="font-mono text-purple-700">admin@miyamasuzaka.test</span></div>
            <div>• <strong class="text-slate-700">Kepala Sekolah:</strong> <span class="font-mono text-purple-700">kepsek@miyamasuzaka.test</span></div>
        </div>
        <div class="text-[10px] text-slate-400 mt-2">Semua password akun demo: <span class="font-mono text-slate-700 font-bold">password</span></div>
    </div>
</x-guest-layout>
