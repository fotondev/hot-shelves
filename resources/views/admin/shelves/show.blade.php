<x-app-layout>
    <h1><b>SHelf show page</b></h1>
    <div>
        @if (count($books) > 0)
            @foreach ($books as $book)
                <ul>
                    <li><a href="{{route('book.show', $book->slug)}}">{{ $book->name }}</a>
                        <div class="flex flex-row">
                            <p>Создано <a href="{{ route('user.show', $book->publisher->slug) }}">
                                    {{ $book->publisher->name }}
                                </a></p>
                        </div>
                    </li>
                </ul>
            @endforeach
        @else
            <div>Полка пустая</div>
        @endif
    </div>
</x-app-layout>
