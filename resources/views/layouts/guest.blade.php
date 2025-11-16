<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

       
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        
       
        <nav class="bg-white border-b border-gray-100 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                   
                    <div class="flex">
                        
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('home') }}">
                                <span class="font-bold text-lg text-gray-800">De Bakkerij</span>
                            </a>
                        </div>

                        
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                                {{ __('Home') }}
                            </x-nav-link>
                            <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')">
                                {{ __('Winkel') }}
                            </x-nav-link>
                            <x-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.index')">
                                {{ __('Nieuws') }}
                            </x-nav-link>
                            <x-nav-link :href="route('faq.index')" :active="request()->routeIs('faq.index')">
                                {{ __('FAQ') }}
                            </x-nav-link>
                            <x-nav-link :href="route('contact.index')" :active="request()->routeIs('contact.index')">
                                {{ __('Contact') }}
                            </x-nav-link>
                        </div>
                    </div>

                    
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        
                        
                        @php
                            $cartCount = count(session('cart', []));
                        @endphp
                        <a href="{{ route('cart.index') }}" class="relative inline-flex items-center p-2 text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            @if ($cartCount > 0)
                                <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        </a>

                       
                        <div class="ml-4">
                            @auth
                               
                                @if(Auth::user()->is_admin)
                                    
                                    <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-700 underline">Admin Dashboard</a>
                                @else
                                    
                                    <a href="{{ route('mijn-account') }}" class="text-sm text-gray-700 underline">Mijn Dashboard</a>
                                @endif
                            @else
                                
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                @endif
                            @endauth
                        </div>
                        
                    </div>
                </div>
            </div>
        </nav>
        
       
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="w-full">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>