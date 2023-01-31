<x-app-layout>
    <div class="flex flex-col items-center justify-center">
        <h1>shelves</h1>
        <div>
            @foreach ($books as $book)
            <x-item-card :item='$book' />
            @endforeach
        </div>
        <div>
            <a href="{{route('shelf.create')}}">Новая полка</a>
        </div>    
    </div>
    <div class="">
       <x-shelf-dropdown>
       </x-shelf-dropdown>
    </div>
</x-app-layout>
