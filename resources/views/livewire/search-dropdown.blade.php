<div class="relative" x-data="{ isOpen : true }" @click.away="isOpen = false" >
        <div class="absolute top-0 ">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-1 text-sm ml-2 text-gray-500 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
        </div>
        <input  wire:model.debounce.300ms="search"
        type="text"
        placeholder="Search"
        @focus="isOpen = true"
        @keyup.escape.window="isOpen = false"
        @keyup.shift.enter="isOpen != false "

        class="px-8 text-sm py-1 bg-gray-800 rounded-full w-64
        focus:outline-none focus:ring  focus:ring-gray-700"
        >
        <div wire:loading class="absolute top-1 right-1">
            <div style="border-top-color:transparent"
                class="w-5 h-5 border-2 border-gray-400 border-solid rounded-full animate-spin"></div>
        </div>
        @if (strlen($search) >= 2)
            <div class="z-50 absolute bg-gray-800 rounded w-64 mt-4" x-show="isOpen"
            x-transition
            @keydown.escape.window="isOpen = false"
            >
                <ul>

                    @forelse ($searchResults as $result)
                    <li class="border-b text-sm border-gray-700">
                        <a
                        @if($loop->last)
                            @keyup.tab="isOpen = false"
                        @endif
                        href="{{ route('movie.show', $result['id']) }}" class=" hover:bg-gray-700 px-2 py-2 flex items-center space-x-3">
                        @if ($result['poster_path'])
                        <img class="w-8" src="https://image.tmdb.org/t/p/w92/{{$result['poster_path']}}" alt="">
                        @else
                        <img src="https://via.placeholder.com/50x50" alt="">
                        @endif
                        <span>{{$result['title']}}</span>
                        </a>
                    </li>
                    @empty
                        <div class="px-2 py-2 ">No result for "{{$search}}"</div>
                    @endforelse
                </ul>
            </div>
        @endif
</div>

