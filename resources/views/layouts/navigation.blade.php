<nav x-data="{ open: false }" class="border-b border-slate-200 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}" class="font-bold text-lg text-purple-700 flex items-center gap-2">
                    <span class="w-7 h-7 bg-purple-700 text-white rounded flex items-center justify-center text-xs">宮</span>
                    <span>SMK Miyamasuzaka</span>
                </a>
            </div>

            <div class="hidden sm:flex sm:items-center sm:gap-4">
                <a href="{{ route('profile.show', Auth::id()) }}" class="flex items-center gap-2 border border-slate-200 px-2.5 py-1.5 rounded hover:border-purple-300 text-xs font-semibold text-slate-700">
                    <x-avatar :user="Auth::user()" size="sm" />
                    <span>{{ Auth::user()->name }}</span>
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-600 hover:border-purple-300 hover:text-purple-700 rounded">Keluar</button>
                </form>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="border border-slate-200 px-3 py-1.5 text-xs text-slate-600 rounded">Menu</button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden border-t border-slate-200 sm:hidden px-4 py-3 space-y-2 text-xs">
        <div class="font-bold text-slate-900">{{ Auth::user()->name }}</div>
        <a href="{{ route('profile.show', Auth::id()) }}" class="block py-1 text-slate-600 hover:text-purple-700">Profil Saya</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block py-1 text-rose-600 font-semibold">Keluar</button>
        </form>
    </div>
</nav>
