@props(['publisher'])

<div class="flex flex-row">
    <p>Создано <a href="{{route('profile.show', $publisher->slug) }}">
            {{ $publisher->name }}
        </a></p>
</div>