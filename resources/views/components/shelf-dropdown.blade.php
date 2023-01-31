<x-dropdown align="left" width="48">
    <x-slot name="trigger">
        @if (isset($currentShelf))
            <button>{{ $currentShelf->name }}</button>
        @else
            <x-primary-button>Полки</x-primary-button>
        @endif
    </x-slot>
    <x-slot name="content">
        @foreach ($shelves as $shelf)
            <x-dropdown-link :href="route('shelf.show', $shelf->slug)">
                {{ $shelf->name }}
            </x-dropdown-link>
        @endforeach
    </x-slot>
</x-dropdown>
