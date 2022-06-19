@extends('Layout.main')

@section('content')

<div class="container mx-auto mt-10 px-6">
    {{-- popular show --}}
    <div class="popular-movie mb-6">
        <h4 class="text-xl  border-b pb-3 border-gray-700 uppercase tracking-wider font-semibold text-yellow-500/90">
            Popular Shows
        </h4>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 mt-8 gap-8 md:grid-cols-4">
        @foreach ($popular as $tvshow )
        <x-tv-card :tvshow="$tvshow" />
        @endforeach
    </div>

    {{-- top rated --}}
    <div class="popular-series mt-20 mb-6">
        <h4 class="text-xl border-b pb-3 border-gray-700 uppercase tracking-wider font-semibold text-yellow-500/90">
            Top Rated Shows
        </h4>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 mt-8 gap-8 md:grid-cols-4">
        @foreach ($topRated as $tvshow )
        <x-tv-card :tvshow="$tvshow" />
        @endforeach
    </div>
</div>
@endsection
