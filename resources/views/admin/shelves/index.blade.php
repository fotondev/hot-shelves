<x-app-layout>
    <div class="flex flex-col items-center justify-center">
        <h1 class="text-bold">Shelves</h1>
        <div class="flex flex-start">
            @foreach ($shelves as $shelf)
                <x-item-card :item='$shelf' />
            @endforeach
        </div>
        <div>
            <a href="{{ route('shelf.create') }}">Новая полка</a>
        </div>
    </div>

</x-app-layout>
