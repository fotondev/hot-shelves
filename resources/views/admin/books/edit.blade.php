<x-app-layout>
    <div class="flex flex-col items-center justify-center">
        <h1><b>Редактировать книгу</b></h1>
        <form action="{{ route('book.store'), $book->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="title-input" class="block mb-2 text-sm font-medium text-gray-900">Имя</label>
                <input type="text" id="title-input" name="name" value="{{$book->name}}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="description-input" class="block mb-2 text-sm font-medium text-gray-900">Описания</label>
                <input type="text" id="description-input" name="description"  value="{{$book->description}}"
                    class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 ">
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="text-white bg-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Сохранить</button>
        </form>
    </div>
</x-app-layout>
