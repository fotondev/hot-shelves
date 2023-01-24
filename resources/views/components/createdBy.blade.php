@php
    $item;
@endphp
<div class="flex flex-row">
    <p>Создано <a href="{{ route('user.show', $item->publisher->slug) }}">
            {{ $item->publisher->name }}
        </a></p>
</div>