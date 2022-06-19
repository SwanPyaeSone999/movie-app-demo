@extends('Layout.main')

@section('content')
<div class="movie-info border-b border-gray-800">
    <div class="container  mx-auto px-6 py-16">
        <div class="flex gap-8 md:flex-row flex-col">
            <img class="object-cover object-center w-full md:w-4/5" src="{{ $show['poster_path'] }}" alt="">
            <div class="md:ml-10 mt-5">
                <div class="space-y-2 ">
                    <h1 class="text-xl  font-sans tracking-wider">{{ $show['name'] }}</h1>
                    <div>
                        <span class="flex items-center space-x-2 text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline text-orange-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                            </svg>
                            <span> {{ $show['vote_average'] }} |
                                {{ $show['first_air_date'] }} |
                                {{ $show['genres'] }}
                            </span>
                            <span></span>
                        </span>
                    </div>
                </div>
                <p class="text-xs mt-5">
                    {{ $show['overview'] }}
                </p>
                <div class="text-sm mt-8 space-y-2">
                    <h2 class="text-lg font-semibold">Featured Crew</h2>
                    <div class="flex mt-4">
                        @foreach ($show['crew'] as $crew)
                        <div class="mr-8">
                            {{ $crew['name'] }}
                            <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                        </div>
                        @endforeach
                    </div>
                    <div class="space-x-3">
                        <span>Season : </span>
                        <span> {{ $show['number_of_seasons'] }}</span>
                        <span>Episode : </span>
                        <span> {{ $show['number_of_episodes'] }}</span>
                    </div>
                    <div class="space-x-3">
                        <span>Language:</span>
                        <span>{{ $show['original_language'] }}</span>
                    </div>
                    <div class="space-x-3">
                        <span>Distributor:</span>
                        <span>{{ $show['production_companies'] }}</span>
                    </div>
                    <div x-data="{openModal : false}">
                        @if ($show['videos']['results'])
                        <button x-on:click="openModal = true"
                            class="bg-orange-500 hover:bg-white hover:text-black transition duration-500 mt-8 px-6 py-1 rounded-sm shadow-sm text-black font-semibold ">
                            <div>
                                <span class="flex items-center space-x-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span x-on:click="openModal != openModal">Play</span>
                                </span>
                            </div>
                        </button>
                        @endif
                        {{-- open modal --}}
                        <div x-show.transition.opacity="openModal"
                            class="fixed inset-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                            style="background-color: rgba(0, 0, 0, .5)">
                            <div class="container mx-auto lg:px-40 rounded-lg overflow-y-auto">
                                <div class="bg-gray-900 rounded">
                                    <div class="flex justify-end pr-4 pt-2">
                                        <button x-on:click="openModal = false "
                                            class="text-3xl leading-none hover:text-gray-300">&times;</button>
                                    </div>
                                    <div class="modal-body p-6 pt-0">
                                        <div class=" overflow-hidden relative">
                                            <iframe class="aspect-video w-full"
                                                src="https://www.youtube.com/embed/{{$show['videos']['results'][0]['key']}}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- cast preview --}}
<div class="cast-info container mx-auto px-6">
    <h3 class="text-uppercase text-xl  border-b pb-3 border-gray-700 font-semibold text-white">Cast</h3>
    <div class="grid  grid-cols-3 md:grid-cols-4  mt-5 gap-4 w-full  rounded-sm">
        @foreach ($show['cast'] as $cast)
        <div class="mt-2">
            <a href="{{ route('actor.show', $cast['id']) }}">
                <img src="https://image.tmdb.org/t/p/w500/{{ $cast['profile_path'] }}" alt="">
            </a>
            <div class="text-sm mt-1 font-semibold">{{ $cast['name'] }}</div>
        </div>
        @endforeach
    </div>
</div>
</div>
<div class="container mx-auto px-6 mt-6">
    <h3 class="text-uppercase text-xl  border-b pb-3 border-gray-700 font-semibold text-white">Images</h3>
    <div class="grid grid-cols-2 gap-4 md:grid-cols-3 mt-4">
        @foreach ($show['images'] as $image)
        <div class="mt-2">
            <img src="https://image.tmdb.org/t/p/w500/{{ $image['file_path'] }}" alt="">
        </div>
        @endforeach
    </div>
</div>



@endsection
