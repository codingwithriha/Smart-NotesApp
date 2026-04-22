<!-- left sidebar (categories/tags) -->
<aside class="w-56 min-h-screen bg-white dark:bg-gray-800 shadow p-4 flex flex-col gap-6">

    {{-- Quick links --}}
    <div>
        <p class="text-xs text-gray-400 uppercase mb-2">Notes</p>
        <a href="{{ route('notes.index') }}" class="block py-1 hover:text-blue-500">All Notes</a>
        <a href="{{ route('notes.index', ['filter' => 'pinned']) }}" class="block py-1 hover:text-blue-500">Pinned</a>
        <a href="{{ route('notes.index', ['filter' => 'favorites']) }}" class="block py-1 hover:text-blue-500">Favorites</a>
        <a href="{{ route('trash.index') }}" class="block py-1 hover:text-red-500">Trash</a>
    </div>

    {{-- Categories --}}
    <div>
        <div class="flex justify-between items-center mb-2">
            <p class="text-xs text-gray-400 uppercase">Categories</p>
            <a href="{{ route('categories.create') }}" class="text-blue-500 text-xs">+ New</a>
        </div>
        @foreach(auth()->user()->categories as $category)
        <a
            href="{{ route('notes.index', ['category' => $category->id]) }}"
            class="block py-1 text-sm hover:text-blue-500 truncate">
            {{ $category->name }}
        </a>
        @endforeach
    </div>

    {{-- Tags --}}
    <div>
        <div class="flex justify-between items-center mb-2">
            <p class="text-xs text-gray-400 uppercase">Tags</p>
            <a href="{{ route('tags.index') }}" class="text-blue-500 text-xs">Manage</a>
        </div>
        @foreach(auth()->user()->tags as $tag)
        <a
            href="{{ route('notes.index', ['tag' => $tag->id]) }}"
            class="inline-block bg-gray-100 dark:bg-gray-700 text-xs px-2 py-0.5 rounded mr-1 mb-1 hover:bg-blue-100">
            #{{ $tag->name }}
        </a>
        @endforeach
    </div>

</aside>