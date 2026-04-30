@extends('layouts.auth')
@section('title', 'Create Account')

@section('heading')
    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Create your account</h1>
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Start capturing your ideas today</p>
@endsection

@section('content')
    {{-- Validation Errors --}}
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

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        {{-- Name --}}
        <div>
            <label for="name" class="label">Full Name</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                    <i data-lucide="user" class="w-4 h-4 text-gray-400"></i>
                </div>
                <input type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    placeholder="John Doe"
                    class="input pl-10 {{ $errors->has('name') ? 'border-red-300 dark:border-red-700 focus:ring-red-500' : '' }}">
            </div>
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="label">Email Address</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                    <i data-lucide="mail" class="w-4 h-4 text-gray-400"></i>
                </div>
                <input type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    placeholder="you@example.com"
                    class="input pl-10 {{ $errors->has('email') ? 'border-red-300 dark:border-red-700 focus:ring-red-500' : '' }}">
            </div>
        </div>

        {{-- Password --}}
        <div x-data="{ show: false }">
            <label for="password" class="label">Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                    <i data-lucide="lock" class="w-4 h-4 text-gray-400"></i>
                </div>
                <input :type="show ? 'text' : 'password'"
                    id="password"
                    name="password"
                    required
                    placeholder="Min. 8 characters"
                    class="input pl-10 pr-10 {{ $errors->has('password') ? 'border-red-300 dark:border-red-700 focus:ring-red-500' : '' }}">
                <button type="button" @click="show = !show"
                    class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                    <i :data-lucide="show ? 'eye-off' : 'eye'" class="w-4 h-4"></i>
                </button>
            </div>
        </div>

        {{-- Confirm Password --}}
        <div x-data="{ show: false }">
            <label for="password_confirmation" class="label">Confirm Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                    <i data-lucide="shield-check" class="w-4 h-4 text-gray-400"></i>
                </div>
                <input :type="show ? 'text' : 'password'"
                    id="password_confirmation"
                    name="password_confirmation"
                    required
                    placeholder="Repeat your password"
                    class="input pl-10 pr-10">
                <button type="button" @click="show = !show"
                    class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                    <i :data-lucide="show ? 'eye-off' : 'eye'" class="w-4 h-4"></i>
                </button>
            </div>
        </div>

        <button type="submit" class="btn-primary w-full justify-center mt-2">
            <i data-lucide="user-plus" class="w-4 h-4"></i>
            Create Account
        </button>
    </form>

    <p class="text-center mt-6 text-sm text-gray-500 dark:text-gray-400">
        Already have an account?
        <a href="{{ route('login') }}" class="font-medium text-blue-600 dark:text-blue-400 hover:underline ml-1">Sign in</a>
    </p>
@endsection