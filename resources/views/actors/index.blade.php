@extends('Layout.main')

@section('content')

    <div class="container mx-auto mt-10 px-6">
        <div class="popular-actor ">
            <h4 class="text-xl  border-b pb-3 border-gray-700 uppercase tracking-wider font-semibold text-yellow-500/90">
                Popular Actors</h4>
        </div>
        {{-- popular actor --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 mt-8 gap-8 md:grid-cols-4 scroll">
            @foreach ($popularActors as $actor)
                <div class="mt-8 actor">
                    <a href="{{ route('actor.show', $actor['id'] ) }}" >
                        <img src="{{ $actor['profile_path'] }}" class="hover:opacity-75 transition ease-in-out duration-500"
                            alt="">
                        <a class="mt-2 text-sm text-gray-300">
                            {{ $actor['name'] }}
                        </a>
                    </a>
                    <div class="text-gray-400 truncate text-xs mt-1">{{ $actor['known_for'] }}</div>
                </div>
            @endforeach
        </div>
        {{-- popular actor --}}
        {{-- pagination --}}
        {{-- <div class="flex space-x-3 justify-center mt-4">
            @if ($previous)
            <a href="/actors/page/{{$previous}}">Previous</a>
            @else
                <div></div>
            @endif
            @if ($next)
            <a href="/actors/page/{{$next}}">Next</a>
            @else
                <div></div>
            @endif
        </div> --}}
        {{-- pagination --}}
        {{-- loading --}}
        <div class="page-load-status my-8 ">
            <div class="flex justify-center">
                <div class=" infinite-scroll-request spinner my-8 text-4xl">&nbsp;</div>
            </div>
            <p class="infinite-scroll-last">End of content</p>
            <p class="infinite-scroll-error">No more pages to load</p>
        </div>
        {{-- loading --}}
    </div>

@endsection


@section('scripts')
    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
    <script>
        let elem = document.querySelector('.scroll');
        let infScroll = new InfiniteScroll(elem, {
            // options
            path: '/actors/page/@{{#}}',
            append: '.actor',
            status: '.page-load-status',
            //   history: false,
        });
    </script>
@endsection
