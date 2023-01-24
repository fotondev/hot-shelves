<x-app-layout>
    <div class="flex flex-col items-center justify-center">
        <h1>shelves</h1>
        @include('components.header')
        <div>
            @foreach ($shelves as $shelf)
                <div class="flex flex-col p-4">
                    <a href="{{ route('shelf.show', $shelf->slug) }}">{{ $shelf->name }}</a>
                    @include('components.createdBy', [$item = $shelf])
                </div>
            @endforeach
        </div>
        <div>
            <a href="{{route('shelf.create')}}">Новая полка</a>
        </div>
    </div>
</x-app-layout>
