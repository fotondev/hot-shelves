@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="fixed bottom-3 right-3 bg-indigo-500 rounded text-white px-4 py-2">
        <p>
            {{ session('message') }}
        </p>
    </div>
@endif
