<div class="mt-2">
    <div class="space-y-2">
        <a href="{{ route('tvshow.show', $tvshow['id']) }}">
            <img class="hover:opacity-75 duration-500 transition ease-in-out" src="{{$tvshow['poster_path'] }}"  alt="">
        </a>
        <div>
            <a href="" class="font-semibold text-sm ">{{ Str::limit($tvshow['name'], 40, '...') }} </a>
           <div class="text-gray-400 text-sm cursor-pointer hover:text-violet-200">
            <p class="text-xs mt-1"> {{ $tvshow['first_air_date'] }} </p>
           </div>
        </div>
    </div>
</div>
