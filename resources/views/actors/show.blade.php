@extends('Layout.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
            <div class="container flex flex-col md:flex-row  mx-auto  py-16 px-6">
                    <img class="w-64 object-cover object-center" src="{{$actor['profile_path']}}" alt="">
                    <div class="">
                    </div>
                    <div class="md:ml-10 mt-5">
                        <div class="space-y-2 ">
                            <h1 class="text-xl  font-sans tracking-wider">{{$actor['name']}}</h1>
                            <div>
                                <span class="flex items-center space-x-2 text-xs">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z"></path></svg>
                                    <span>
                                        {{$actor['birthday']}} ({{$actor['age']}} years old)
                                    </span>
                                    <span>
                                        |
                                    </span>
                                    <span>
                                        {{$actor['place_of_birth']}}
                                    </span>
                                    <span></span>
                                </span>
                            </div>
                        </div>

                        <p class="text-xs mt-5">
                           {{$actor['biography']}}
                        </p>

                        <div class="font-semibold mt-12">Known For</div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                            @foreach ($knownForMovies as $movie)
                                <div class="mt-4">
                                    <a href="{{ route('movie.show', $movie['id']) }}">
                                        <img src="{{$movie['poster_path']}}" class="hover:opacity-75 transition duration-400 ease-in-out" alt="">
                                    </a>
                                    <a href="{{ route('movie.show', $movie['id']) }}" class="text-sm leading-normal block text-gray-400 hover:text-white mt-1">
                                        {{$movie['title']}}
                                    </a>
                                </div>

                            @endforeach
                        </div>
                    </div>
            </div>
            <div class="container social mx-auto mt-3 mb-5 p-6 px-10">
                <h3 class="text-sm uppercase tracking-wider font-semibold text-white">Social link</h3>
                <div class="space-x-4 flex items-center mt-4 ">
                    <a href="{{$social['facebook_id']}}">
                        <img class="w-8 h-8 " src="https://www.svgrepo.com/show/157818/facebook.svg " alt="">
                    </a>
                    <a href="{{$social['instagram_id']}}">
                        <img class="w-8 h-8 " src="https://www.svgrepo.com/show/217758/instagram.svg " alt="">
                    </a>
                    <a href="{{$social['twitter_id']}}">
                        <img class="w-8 h-8 " src="https://www.svgrepo.com/show/111237/twitter.svg" alt="">
                    </a>

                </div>
            </div>
        </div>
        <div class="credits container mx-auto px-6 mt-10">
            <h3 class="text-uppercase mb-3 text-xl  border-b pb-3 border-gray-700 font-semibold text-white">Credits</h3>
            @foreach ($credits as $credit)
                    <li class="list-disc  pl-6 leading-loose">
                        {{$credit['release_year']}}
                        :
                        <strong>{{$credit['title']}}</strong>
                        as
                        {{$credit['character']}}
                    </li>
            @endforeach
        </div>
@endsection
