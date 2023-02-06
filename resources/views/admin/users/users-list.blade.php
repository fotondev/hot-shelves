<x-app-layout>
    <x-settings-navbar />
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2><b>Пользователи</b></h2>
        <p>Управление пользователями</p>
        <x-primary-button>Создать нового</x-primary-button>
        <div class="flex flex-col my-10 p-2 border-2 border-gray-300">
            @foreach ($users as $user)
                <a href="{{route('user.edit', $user->username)}}">
                    <div class="flex flex-row my-2 p-2  border-2 border-gray-500 hover:bg-gray-300">
                        {{ $user->name }}
                        {{ $user->created_at }}
                        @foreach ($user->roles as $role)
                            {{$role->name}}
                        @endforeach
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
