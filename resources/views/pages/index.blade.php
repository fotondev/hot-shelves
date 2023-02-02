<x-app-layout>
    <div class="flex flex-col items-center justify-center">
        <h1>pages</h1>
        <div>
            @foreach ($pages as $page)
            {{$page->created_at}}
            <x-item-card :item='$page' >
                <x-item-show-link :href="{{route('page.show', $page->slug)}}"></x-item-show-link>
            </x-item-card>
            @endforeach
        </div>
        <div>
           
        </div>
    </div>
</x-app-layout>
