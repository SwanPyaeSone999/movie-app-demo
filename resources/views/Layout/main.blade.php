<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class= "font-sans bg-gray-900 text-white">

    <nav class="border-b border-gray-800">
            <div class="container mx-auto flex md:justify-between flex-wrap items-center px-5 py-3">
                  <div class="flex items-center space-x-5 text-sm ">
                     <div class="">
                        <a href="{{ route('movie.index') }}" class="flex items-center space-x-2">
                            <img class="w-6 h-6 rounded-full " src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjK1a59bQ6a-xOoZhviCVzkfjQcdaKASF4FQ&usqp=CAU" alt="">
                            <span href="" class="hover:text-slate-400 md:block hidden">Movie App</span>
                        </a>
                     </div>
                     <a href="{{ route('movie.index') }}" class="hover:text-slate-400">Movies</a>
                     <a href="{{ route('tvshow.index') }}" class="hover:text-slate-400">TV Shows</a>
                     <a href="{{ route('actor.index') }}" class="hover:text-slate-400">Actors</a>
                  </div>
                  {{-- search dropdown --}}
                  <div class="md:mt-0 mt-5">
                        <livewire:search-dropdown />
                  </div>
            </div>
    </nav>
    @yield('content')
    @livewireScripts

    @yield('scripts')
</body>
</html>
