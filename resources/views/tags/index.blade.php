<!-- manage tags -->
 @extends('layouts.app')
@section('title', 'Tags')
@section('content')
<h1 class="text-2xl font-bold mb-4">Tags</h1>
<div class="flex flex-wrap gap-2">
    @forelse($tags as $tag)
        <a href="{{ route('notes.index', ['tag' => $tag->id]) }}" class="px-3 py-1 rounded-full bg-gray-200 hover:bg-indigo-200 text-sm">
            #{{ $tag->name }} <span class="text-xs text-gray-500">({{ $tag->notes_count }})</span>
        </a>
    @empty
        <p class="text-gray-500">No tags yet. Add tags when creating a note.</p>
    @endforelse
</div>
@endsection
