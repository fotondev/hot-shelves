@props(['item'])

<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
   <div class="flex flex-col p-4">
    {{$slot}}
    <x-publisher-link :publisher='$item->publisher' />
</div>
</div>
