<x-app-layout>
    <h1><b>Book show page</b></h1>
    <div class="flex flex-row">
        <div class="flex flex-wrap">
            @forelse ($pages as $page)
                  <x-item-card :item='$page'>
                    <x-item-show-link :href="route('book.show',$page->slug)">{{$page->name}}</x-item-show-link>
                  </x-item-card>
            @empty
                <p>no books</p>
            @endforelse          
        </div>
        <div class="flex flex-col m-2 py-2">
             <div class="">
                <x-shelf-dropdown>
                </x-shelf-dropdown>
            </div>
            <a href="{{route('shelf.edit', $book->slug)}}">
                <x-primary-button>
                    Редактировать
                </x-primary-button>
            </a>
            <form action="{{route('book.delete', $book->slug)}}" method="POST">
                @csrf
                @method('DELETE')
                <x-danger-button type="submit">Удалить</x-danger-button>
            </form>
        </div>
    </div>
</x-app-layout>
