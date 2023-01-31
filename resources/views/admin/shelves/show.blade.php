<x-app-layout>
    <h1><b>SHelf show page</b></h1>
    <div>
        {{-- @foreach ($books as $book)
            <x-item-card :item='$book' />
        @endforeach --}}
    @forelse ($books as $book)
        {{$book->name}}
    @empty
        <p>no books</p>
    @endforelse
    <div class="">
      <x-shelf-dropdown>
      </x-shelf-dropdown>
    </div>

    </div>
</x-app-layout>
