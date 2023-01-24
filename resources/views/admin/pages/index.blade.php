<x-app-layout>
    <div class="flex flex-col items-center justify-center">
        <h1>pages</h1>
        @include('components.header')
        <div>
            @foreach ($pages as $page)
                <div class="flex flex-col p-4">
                    <a href="#">{{ $page->name }}</a>
                    <div class="flex flex-row">
                        <p>Создано <a href="{{ route('user.show', $page->publisher->slug) }}">
                                {{ $page->publisher->name }}
                            </a></p>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
           
        </div>
    </div>
</x-app-layout>
