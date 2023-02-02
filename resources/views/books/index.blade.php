<x-app-layout>
    <div class="flex flex-col items-center justify-center">
        <h1>Книги</h1>
        <div class="flex flex-wrap">
            @foreach ($books as $book)
                <x-item-card :item='$book'>
                    <x-item-show-link :href="route('book.show', $book->slug)">{{ $book->name }}</x-item-show-link>
                </x-item-card>
            @endforeach
        </div>
        <div class="mt-2">
            <a href="{{ route('book.create') }}">
                <x-primary-button>Новая книга</x-primary-button>
            </a>
            <div class="">
                <x-shelf-dropdown>
                </x-shelf-dropdown>
            </div>
        </div>
    </div>

</x-app-layout>
