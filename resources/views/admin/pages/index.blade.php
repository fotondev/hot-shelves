<x-app-layout>
    <div class="flex flex-col items-center justify-center">
        <h1>pages</h1>
        @include('components.header')
        <div>
            @foreach ($pages as $page)
                <div class="flex flex-col p-4">
                    <a href="#">{{ $page->name }}</a>
                    @include('components.createdBy', [$item = $page])
                </div>
            @endforeach
        </div>
        <div>
           
        </div>
    </div>
</x-app-layout>
