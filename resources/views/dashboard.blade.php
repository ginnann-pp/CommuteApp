<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('ホーム画面') }}
            </h2>
            <div>
                <button class="bg-green-600 hover:bg-green-500 text-white text-sl rounded px-4 py-2">
                    <a href="{{ route('record.add-record') }}">
                        新規投稿
                    </a>
                </button>
                <button class=" bg-blue-600 hover:bg-blue-500 text-white text-sl rounded px-4 py-2">
                    <a href="{{ route('record.add-myroot') }}">
                        マイルート登録
                    </a>
                </button>
            </div>
        </div>
    </x-slot>

    <div class="flex  mx-32 mt-4">
        <div class="left w-1/4">
            <div class="bg-white shadow-md rounded-lg p-6 max-w-7xl flex flex-col items-center justify-center">
                <div class=" h-40 w-40 bg-blue-500 rounded-full"></div>
                <div class="border-b border-gray-500 w-full mb-4 mt-4"></div>
                <ul>
                    <li>最速時間: 40Hr</li>
                    <li>最長時間: 55Hr</li>
                </ul>
            </div>
        </div>

        <div class="lite w-3/4">

            {{--グラフ--}}
            <div class="py-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-md rounded-lg p-6 mb-6  max-w-7xl">
                    {{-- 変数をLaravelから渡す class --}}
                    <x-trend :records="$seven_date_record"/>
                </div>
            </div>
            {{--  --}}

            {{-- test viw --}}
            <div class="py-1 max-w-7xl mx-auto  lg:px-8">
                <div class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-7xl">
                    <div class="flex justify-between">
                        <div class="flex items-center">
                            <div class="">
                                <p class="text-sm">2/2 03:10</p>
                                <p class="border-b-2 border-gray-500 text-center">岡山</p>
                            </div>
                            <p class="font-bold px-4">→</p>
                            <div>
                                <p class="text-sm">2/2 03:10</p>
                                <p class="border-b-2 border-gray-500 text-center">倉敷</p>
                            </div>
                            <div class="mx-2 flex justify-center items-center bg-gray-300 w-10 h-10 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-6 w-6 bi bi-sun" viewBox="0 0 16 16">
                                    <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
                                </svg>
                            </div>
                            <div class="mx-2 flex justify-center items-center bg-gray-300 w-10 h-10 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-6 w-6 bi bi-car-front" viewBox="0 0 16 16">
                                    <path d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17 1.247 0 2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276Z"/>
                                    <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.807.807 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155 1.806 0 4.037-.084 5.592-.155A1.479 1.479 0 0 0 15 9.611v-.413c0-.099-.01-.197-.03-.294l-.335-1.68a.807.807 0 0 0-.43-.563 1.807 1.807 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3H4.82Z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="">移動時間: 00:30 分</p>
                            </div>
                        </div>
                        <div>
                            <button class=" bg-cyan-600 hover:bg-cyan-500 text-white rounded px-4 py-2">編集</button>
                            <button class=" bg-red-600 hover:bg-red-500 text-white rounded px-4 py-2">消去</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- test viw --}}

            @foreach ($records as $commuteRecord)
            <div class="py-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-md rounded-lg p-6 mb-6  max-w-7xl">
                    <p><span class="font-bold">Departure Location:</span> {{ $commuteRecord->departure_location }}</p>
                    <p><span class="font-bold">Destination Location:</span> {{ $commuteRecord->destination_location }}</p>
                    <p><span class="font-bold">Transportation Mode:</span> {{ $commuteRecord->transportation_mode }}</p>
                    <p><span class="font-bold">Departure Time:</span> {{ $commuteRecord->departure_time }}</p>
                    <p><span class="font-bold">Arrival Time:</span> {{ $commuteRecord->arrival_time }}</p>
                    <p><span class="font-bold">Weather:</span> {{ $commuteRecord->weather }}</p>
                    @php
                    $hours = floor($commuteRecord->diff_time / 3600);
                    $minutes = floor(($commuteRecord->diff_time % 3600) / 60);
                    $seconds = $commuteRecord->diff_time % 60;
                    @endphp
                    <p><span class="font-bold">DiffTime:</span> {{ "時間: $hours 分 $minutes 秒 $seconds" }}</p>

                <div class="flex justify-end">
                    <button class=" bg-cyan-600 hover:bg-cyan-500 text-white text-sl rounded px-4 py-2 mr-2">
                        <a href="{{ route('record.edit-record', $commuteRecord) }}"> 編集 </a>
                    </button>
                    <form  action="{{ route('record.destroy', $commuteRecord) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class=" bg-red-600 hover:bg-red-500 text-white text-sl rounded px-4 py-2 ">消去</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

</x-app-layout>
