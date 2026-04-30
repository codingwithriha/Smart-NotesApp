<!-- all users table (block/delete) -->
@extends('layouts.admin')
@section('title', 'Users')
@section('content')
<div class="card p-6">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-lg font-semibold text-gray-900 dark:text-white">Users</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Manage accounts, block/unblock, and review activity</p>
        </div>

        <form method="GET" class="flex gap-2 w-full md:w-auto">
            <div class="relative flex-1 md:w-80">
                <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                    <i data-lucide="search" class="w-4 h-4 text-gray-400"></i>
                </div>
                <input name="search" value="{{ request('search') }}" placeholder="Search name or email..." class="input pl-10">
            </div>
            <button class="btn-secondary">Search</button>
        </form>
    </div>

    <div class="mt-6 overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="text-left text-gray-500 dark:text-gray-400">
                <tr class="border-b border-gray-200 dark:border-gray-800">
                    <th class="py-3 pr-4">User</th>
                    <th class="py-3 pr-4">Notes</th>
                    <th class="py-3 pr-4">Status</th>
                    <th class="py-3 pr-4">Joined</th>
                    <th class="py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                @foreach($users as $u)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/40 transition-colors">
                        <td class="py-4 pr-4">
                            <div class="flex items-center gap-3 min-w-[240px]">
                                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-blue-500 to-purple-600 text-white flex items-center justify-center text-xs font-bold">
                                    {{ strtoupper(substr($u->name, 0, 1)) }}
                                </div>
                                <div class="min-w-0">
                                    <p class="font-medium text-gray-900 dark:text-white truncate">{{ $u->name }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ $u->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 pr-4">
                            <span class="text-gray-900 dark:text-white font-medium">{{ $u->notes_count }}</span>
                        </td>
                        <td class="py-4 pr-4">
                            @if($u->is_blocked)
                                <span class="inline-flex items-center gap-1 text-xs px-2 py-1 rounded-full bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-300">
                                    <i data-lucide="ban" class="w-3.5 h-3.5"></i> Blocked
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 text-xs px-2 py-1 rounded-full bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 text-emerald-700 dark:text-emerald-300">
                                    <i data-lucide="check-circle" class="w-3.5 h-3.5"></i> Active
                                </span>
                            @endif
                        </td>
                        <td class="py-4 pr-4 text-gray-500 dark:text-gray-400 whitespace-nowrap">
                            {{ $u->created_at->diffForHumans() }}
                        </td>
                        <td class="py-4 text-right whitespace-nowrap">
                            <a href="{{ route('admin.users.notes', $u) }}"
                                class="inline-flex items-center gap-1.5 text-xs px-2 py-1 rounded-lg bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <i data-lucide="file-text" class="w-3.5 h-3.5"></i>
                                Notes
                            </a>
                            <form method="POST" action="{{ route('admin.users.block', $u) }}" class="inline">@csrf
                                <button class="inline-flex items-center gap-1.5 text-xs px-2 py-1 rounded-lg bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 text-amber-700 dark:text-amber-300 hover:bg-amber-100 dark:hover:bg-amber-900/30 ml-1.5">
                                    <i data-lucide="{{ $u->is_blocked ? 'unlock' : 'lock' }}" class="w-3.5 h-3.5"></i>
                                    {{ $u->is_blocked ? 'Unblock' : 'Block' }}
                                </button>
                            </form>
                            <form method="POST" action="{{ route('admin.users.destroy', $u) }}" class="inline" onsubmit="return confirm('Delete user?')">
                                @csrf @method('DELETE')
                                <button class="inline-flex items-center gap-1.5 text-xs px-2 py-1 rounded-lg bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-300 hover:bg-red-100 dark:hover:bg-red-900/30 ml-1.5">
                                    <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">{{ $users->links() }}</div>
@endsection
