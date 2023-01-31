@props(['books'])
<div class="flex flex-row">
    @foreach ($books as $book)
        <div class="flex flex-col p-5">
            <h2>{{ $book->name }}</h2>
            @foreach ($book->pages as $page)
                <ul>
                    <li>
                        {{ $page->name }}
                    </li>
                </ul>
            @endforeach
        </div>
    @endforeach
</div>