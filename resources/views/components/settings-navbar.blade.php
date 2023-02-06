<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
        <div class="flex">
            <!--- Navigation Links --->
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('users')" :active="request()->routeIs('users')">
                    {{ __('Пользователи') }}
                </x-nav-link>
            </div>
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('roles')" :active="request()->routeIs('roles')">
                    {{ __('Роли') }}
                </x-nav-link>
            </div>

        </div>
    </div>
</div>
