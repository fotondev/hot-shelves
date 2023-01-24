<x-app-layout>
    <div class="flex flex-col items-center justify-center">
        <h1>shelves</h1>
        @include('components.header')
        <div>
            @foreach ($books as $book)
                <div class="flex flex-col p-4">
                    <a href="{{ route('pages.show', $book->slug) }}">{{ $book->name }}</a>
                    @include('components.createdBy')
                </div>
            @endforeach
        </div>
        <div>
            <a href="{{route('shelf.create')}}">Новая полка</a>
        </div>
    </div>
</x-app-layout>
