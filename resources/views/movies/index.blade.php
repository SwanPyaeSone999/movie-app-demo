@extends('Layout.main')

@section('content')

<div class="container mx-auto mt-10 px-6 ">
    {{-- popular movies --}}
    <div class="popular-movie mb-6">
        <h4 class="text-xl  border-b pb-3 border-gray-700 uppercase tracking-wider font-semibold text-yellow-500/90">
            Popular Movies</h4>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 mt-8 gap-8 md:grid-cols-4">
        @foreach ($popularMovies as $movie )
        <x-movie-card :movie="$movie" :genres="$genres" />
        @endforeach
    </div>

    {{-- now playing --}}
    <div class="popular-series mt-20 ">
        <h4 class="text-xl border-b pb-3 border-gray-700 uppercase tracking-wider font-semibold text-yellow-500/90">
            Now Playing
        </h4>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 mt-8 gap-8 md:grid-cols-4">
        @forelse ($nowPlaying as $movie )
        <x-movie-card :movie="$movie" :genres="$genres" />
        @empty
        <div>Nothing</div>
        @endforelse
    </div>
</div>

@endsection
