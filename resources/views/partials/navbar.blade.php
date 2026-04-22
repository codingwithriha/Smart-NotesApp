<!-- top navigation bar -->
<nav class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 shadow">
    <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">

        {{-- Left Side: Logo + Links --}}
        <div class="flex items-center gap-6">

            {{-- Logo --}}
            <a href="{{ route('notes.index') }}"
                class="text-xl font-bold text-indigo-600 dark:text-indigo-400">
                Smart Notes
            </a>

            @auth
            {{-- Navigation Links --}}
            <div class="hidden md:flex items-center gap-4 text-sm">
                <a href="{{ route('notes.index') }}" class="hover:text-indigo-600">Notes</a>
                <a href="{{ route('categories.index') }}" class="hover:text-indigo-600">Categories</a>
                <a href="{{ route('tags.index') }}" class="hover:text-indigo-600">Tags</a>
                <a href="{{ route('trash.index') }}" class="hover:text-indigo-600">Trash</a>

                @if(auth()->user()->is_admin)
                <a href="{{ route('admin.dashboard') }}" class="text-amber-600 hover:underline">
                    Admin
                </a>
                @endif
            </div>
            @endauth

        </div>

        {{-- Right Side --}}
        <div class="flex items-center gap-3 text-sm">

            @auth

            {{-- Search --}}
            <form method="GET" action="{{ route('notes.index') }}" class="hidden sm:block">
                <input
                    type="text"
                    name="search"
                    placeholder="Search notes..."
                    value="{{ request('search') }}"
                    class="border rounded px-3 py-1 text-sm dark:bg-gray-700 dark:border-gray-600" />
            </form>

            {{-- Theme Toggle --}}
            <form method="POST" action="{{ route('profile.theme') }}">
                @csrf
                <button type="submit"
                    class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700"
                    title="Toggle theme">
                    {{ auth()->user()->theme === 'dark' ? '☀️' : '🌙' }}
                </button>
            </form>

            {{-- Profile --}}
            <a href="{{ route('profile.edit') }}"
                class="hover:underline text-gray-700 dark:text-gray-300">
                {{ auth()->user()->name }}
            </a>

            {{-- Logout --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="text-red-500 hover:underline">
                    Logout
                </button>
            </form>

            @else

            {{-- Guest Links --}}
            <a href="{{ route('login') }}" class="hover:underline">Login</a>
            <a href="{{ route('register') }}" class="hover:underline">Register</a>

            @endauth

        </div>
    </div>
</nav>