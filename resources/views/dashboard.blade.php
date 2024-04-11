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
                    <div class="flex justify-between items-center">
                        <div class="flex">
                            <p class="border-b-4 border-gray-500 px-2">岡山</p>
                            <p class="font-bold px-4">→</p>
                            <p class="border-b-4 border-gray-500 px-2">倉敷</p>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-8 h-8">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                                </svg>

                            <p>移動時間  0:50</p>
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
