<x-app-layout>
    <h1><b>Book show page</b></h1>
    <div class="flex flex-row">
        <div class="flex flex-wrap">
            @forelse ($pages as $page)
                  <x-item-card :item='$page'>
                    <x-item-show-link :href="route('page.show',[$book->slug, $page->slug] )">{{$page->name}}</x-item-show-link>
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
            <div class="mt-2">
                <a href="{{route('page.create', $book->slug)}}"><x-primary-button>Новая страница</x-primary-button></a>
            </div>  
            <a href="{{route('book.edit', $book->slug)}}">
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
