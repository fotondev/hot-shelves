<x-app-layout>
    <div class="flex flex-col items-center justify-center">
        <h1 class="text-bold">Shelves</h1>
        <div class="flex flex-start">
            @foreach ($shelves as $shelf)
                <div class="flex flex-col">
                    <x-item-card :item='$shelf'>
                        <x-item-show-link :href="route('shelf.show', $shelf->slug)">{{$shelf->name}}</x-item-show-link>
                    </x-item-card>
                </div>
            @endforeach          
            <a href="{{ route('shelf.create') }}">Новая полка</a>
        </div>
    </div>

</x-app-layout>
