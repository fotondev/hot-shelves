<x-app-layout>
    <div class="flex flex-col items-center justify-center">
        <h1><b>profile</b></h1>
        @include('components.header')
<!--------------Show user content table-------------->
        <div>
            @foreach ($content as $key => $value)
                <table>
                    <h2 class="mb-2 text-lg font-semibold text-gray-900">{{$key}}</h2>
                    @foreach ($value as $header)
                       <ul class="max-w-md space-y-1 text-gray-500 ">
                            <li class="text-gray-900">{{$header->name}}</li>
                       </ul>
                </table>
            @endforeach
            @endforeach
        </div>
<!--------------------------------------------------------------->
    </div>
</x-app-layout>
