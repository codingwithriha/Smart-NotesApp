@extends('layouts.auth')
@section('title', 'Admin Register')

@section('heading')
    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Create admin account</h1>
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Use this to access the admin panel</p>
@endsection

@section('content')
    @php
        $requiresToken = $requiresToken ?? false;
    @endphp

    @if($requiresToken)
        <div class="mb-6 p-4 bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 rounded-xl">
            <div class="flex gap-3">
                <i data-lucide="key" class="w-5 h-5 text-amber-700 dark:text-amber-300 mt-0.5"></i>
                <div class="text-sm">
                    <p class="font-medium text-amber-800 dark:text-amber-200">Admin registration key required</p>
                    <p class="mt-0.5 text-amber-700/90 dark:text-amber-200/80">
                        An admin already exists. To create another admin, enter the key from your <code class="px-1 rounded bg-amber-100 dark:bg-amber-900/40">.env</code>.
                    </p>
                </div>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl">
            <ul class="space-y-1">
                @foreach($errors->all() as $error)
                    <li class="flex items-start gap-2 text-sm text-red-600 dark:text-red-400">
                        <i data-lucide="alert-circle" class="w-4 h-4 mt-0.5 flex-shrink-0"></i>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.register.store') }}" class="space-y-5">
        @csrf

        <div>
            <label for="name" class="label">Full Name</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                    <i data-lucide="user" class="w-4 h-4 text-gray-400"></i>
                </div>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    placeholder="Admin Name"
                    class="input pl-10 {{ $errors->has('name') ? 'border-red-300 dark:border-red-700 focus:ring-red-500' : '' }}">
            </div>
        </div>

        <div>
            <label for="email" class="label">Email Address</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                    <i data-lucide="mail" class="w-4 h-4 text-gray-400"></i>
                </div>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    placeholder="admin@example.com"
                    class="input pl-10 {{ $errors->has('email') ? 'border-red-300 dark:border-red-700 focus:ring-red-500' : '' }}">
            </div>
        </div>

        <div x-data="{ show: false }">
            <label for="password" class="label">Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                    <i data-lucide="lock" class="w-4 h-4 text-gray-400"></i>
                </div>
                <input :type="show ? 'text' : 'password'" id="password" name="password" required
                    placeholder="Min. 8 characters"
                    class="input pl-10 pr-10 {{ $errors->has('password') ? 'border-red-300 dark:border-red-700 focus:ring-red-500' : '' }}">
                <button type="button" @click="show = !show"
                    class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                    <i :data-lucide="show ? 'eye-off' : 'eye'" class="w-4 h-4"></i>
                </button>
            </div>
        </div>

        <div x-data="{ show: false }">
            <label for="password_confirmation" class="label">Confirm Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                    <i data-lucide="shield-check" class="w-4 h-4 text-gray-400"></i>
                </div>
                <input :type="show ? 'text' : 'password'" id="password_confirmation" name="password_confirmation" required
                    placeholder="Repeat your password"
                    class="input pl-10 pr-10">
                <button type="button" @click="show = !show"
                    class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                    <i :data-lucide="show ? 'eye-off' : 'eye'" class="w-4 h-4"></i>
                </button>
            </div>
        </div>

        @if($requiresToken)
            <div>
                <label for="admin_register_token" class="label">Admin Registration Key</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                        <i data-lucide="key" class="w-4 h-4 text-gray-400"></i>
                    </div>
                    <input id="admin_register_token"
                        type="password"
                        name="admin_register_token"
                        value="{{ old('admin_register_token') }}"
                        placeholder="Enter key from .env"
                        class="input pl-10 {{ $errors->has('admin_register_token') ? 'border-red-300 dark:border-red-700 focus:ring-red-500' : '' }}">
                </div>
                @error('admin_register_token')
                    <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>
        @endif

        <button type="submit" class="btn-primary w-full justify-center !bg-gradient-to-r !from-amber-600 !to-orange-600 hover:!from-amber-700 hover:!to-orange-700 mt-2">
            <i data-lucide="user-plus" class="w-4 h-4"></i>
            Create Admin Account
        </button>
    </form>

    <p class="text-center mt-6 text-sm text-gray-500 dark:text-gray-400">
        Already have admin access?
        <a href="{{ route('admin.login') }}" class="font-medium text-amber-600 dark:text-amber-400 hover:underline ml-1">Sign in</a>
    </p>
@endsection

