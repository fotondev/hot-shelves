@props(['item'])

<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
   <div class="flex flex-col p-4">
    <a href="{{ route('shelf.show', $item->slug) }}"><h2 class="text-red-500">{{ $item->name }}</h2></a>
    <x-publisher-link :publisher='$item->publisher' />
</div>
</div>
