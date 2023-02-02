<x-app-layout>
    <h1><b>Shelf show page</b></h1>
    <div>
        <div class="flex flex-row">
            {{-- @forelse ($books as $book)
                  <x-item-card :item='$book'>
                    <x-item-show-link :href="route('book.show', $book->slug)">{{$book->name}}</x-item-show-link>
                  </x-item-card>
            @empty
                <p>no books</p>
            @endforelse --}}
            <div class="">
                <x-shelf-dropdown>
                </x-shelf-dropdown>
            </div>
        </div>
        <div class="mt-2">
            <a href="{{route('shelf.book.create', $shelf->slug)}}"><x-primary-button>Новая книга</x-primary-button></a>
        </div>    
        <a href="{{route('shelf.edit', $shelf->slug)}}">
            <x-primary-button>
                Редактировать
            </x-primary-button>
        </a>
        <form action="{{route('shelf.delete', $shelf->slug)}}" method="POST">
            @csrf
            @method('DELETE')
            <x-danger-button type="submit">Удалить</x-danger-button>
        </form>
    </div>
</x-app-layout>
