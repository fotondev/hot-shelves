<x-app-layout>
    <div class="flex flex-col items-center justify-center">
        <h1>dashboard</h1>
        @include('components.header')
        <a href="{{route(shelves.show)}}">Полки</a>
    </div>
</x-app-layout>
