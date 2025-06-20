<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body>
     <div class="min-h-screen bg-gray-100">
      @include('layouts.navigation')

      <!-- Page Heading -->
	    @if (isset($header))
	        <header class="bg-white shadow">
	            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
	                {{ $header }}
	            </div>
	        </header>
	    @endif

       <!-- Page Content -->     
       <main>
      	 {{ $slot }}
       </main>
        @livewireScripts
      </div>
    </body>
</html>
