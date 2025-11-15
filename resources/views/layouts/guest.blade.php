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
        
        
        <nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    
                    <div class="flex">
                       
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('home') }}">
                               
                                <span class="font-bold text-lg dark:text-gray-200">De Bakkerij</span>
                            </a>
                        </div>

                     
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                                {{ __('Home') }}
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
                        @auth
                           
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-300 underline">Dashboard</a>
                        @else
                           
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-300 underline">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
       

       
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <!-- Dit deel was er al, maar nu zit het ONDER de <nav> -->
            <div class="w-full">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>