<div class="mt-2">
    <div class="space-y-2">
        <a href="{{ route('movie.show', $movie['id']) }}">
            <img class="hover:opacity-75 duration-500 transition ease-in-out" src="{{$movie['poster_path'] }}"  alt="">
        </a>
        <div>
            <a href="" class="font-light text-sm">{{ \Illuminate\Support\Str::limit($movie['title'], 40, $end='...') }} </a>
           <div class="text-gray-400 text-sm cursor-pointer hover:text-violet-200">
            <p class="text-xs mt-1">{{ $movie['release_date'] }} </p>
           </div>
        </div>
    </div>
</div>
