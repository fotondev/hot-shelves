<x-app-layout>
    {{ $publisher->name }}
    <x-publisher-content-section :books="$books" />
</x-app-layout>
