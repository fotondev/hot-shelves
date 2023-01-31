<x-app-layout>
    <div class="flex flex-col items-center justify-center">
        <h1>pages</h1>
        <div>
            @foreach ($pages as $page)
            <x-item-card :item='$page' />
            @endforeach
        </div>
        <div>
           
        </div>
    </div>
</x-app-layout>
