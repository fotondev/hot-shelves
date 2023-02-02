<x-app-layout>
    <div class="flex flex-col items-center justify-center">
        <h1><b>Создать новую страницу</b></h1>
        <h2>В книгу {{$book->name}}</h2>
        <form action="{{route('page.store', $book->slug)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="name-input" class="block mb-2 text-sm font-medium text-gray-900">Имя</label>
                <input type="text" id="name-input" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="body-input" class="block mb-2 text-sm font-medium text-gray-900">Содержание</label>
                <input type="text" id="body-input" name="body"
                    class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 ">
                @error('body')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="text-white bg-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Сохранить</button>
        </form>
    </div>
</x-app-layout>