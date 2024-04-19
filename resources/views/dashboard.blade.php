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

            {{-- forで繰り返し表示 --}}
            @foreach ($records as $commuteRecord)
            <div class="py-1 max-w-7x1 mx-auto lg:px-8">
                <div class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-7xl">
                    <div class="flex justify-between">
                        <div class="flex items-center">
                            <div>
                                <p class="text-sm">{{\Carbon\Carbon::parse($commuteRecord->departure_time)->format('m/d H:i') }}</p>
                                <p class="border-b-2 border-gray-500 text-center">{{$commuteRecord->departure_location }}</p>
                            </div>
                            <p class="font-bold px-4">→</p>
                            <div>
                                <p class="text-sm">{{\Carbon\Carbon::parse($commuteRecord->arrival_time)->format('m/d H:i') }}</p>
                                <p class="border-b-2 border-gray-500 text-center">{{$commuteRecord->destination_location }}</p>
                            </div>
                            {{-- 天気によって表示変更 --}}
                            @if ($commuteRecord->weather == '晴れ')
                                <div class="mx-2 flex justify-center items-center bg-gray-300 w-10 h-10 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-6 w-6 bi bi-sun" viewBox="0 0 16 16">
                                        <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
                                    </svg>
                                </div>
                            @elseif($commuteRecord->weather == '曇り')
                                <div class="mx-2 flex justify-center items-center bg-gray-300 w-10 h-10 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloudy" viewBox="0 0 16 16">
                                        <path d="M13.405 8.527a5.001 5.001 0 0 0-9.499-1.004A3.5 3.5 0 1 0 3.5 14.5H13a3 3 0 0 0 .405-5.973zM8.5 5.5a4 4 0 0 1 3.976 3.555.5.5 0 0 0 .5.445H13a2 2 0 0 1-.001 4H3.5a2.5 2.5 0 1 1 .605-4.926.5.5 0 0 0 .596-.329A4.002 4.002 0 0 1 8.5 5.5z"/>
                                      </svg>
                                </div>
                            @elseif($commuteRecord->weather == '雨')
                                <div class="mx-2 flex justify-center items-center bg-gray-300 w-10 h-10 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-rain-heavy" viewBox="0 0 16 16">
                                        <path d="M4.176 11.032a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 1 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 1 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 1 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm.229-7.005a5.001 5.001 0 0 0-9.499-1.004A3.5 3.5 0 1 0 3.5 10H13a3 3 0 0 0 .405-5.973zM8.5 1a4 4 0 0 1 3.976 3.555.5.5 0 0 0 .5.445H13a2 2 0 0 1 0 4H3.5a2.5 2.5 0 1 1 .605-4.926.5.5 0 0 0 .596-.329A4.002 4.002 0 0 1 8.5 1z"/>
                                      </svg>
                                </div>
                            @endif
                            {{-- 移動方法によって表示変更 --}}
                            @if ($commuteRecord->transportation_mode == "車")
                                <div class="mx-6 flex justify-center items-center bg-gray-300 w-10 h-10 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-6 w-6 bi bi-car-front" viewBox="0 0 16 16">
                                        <path d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17 1.247 0 2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276Z"/>
                                        <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.807.807 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155 1.806 0 4.037-.084 5.592-.155A1.479 1.479 0 0 0 15 9.611v-.413c0-.099-.01-.197-.03-.294l-.335-1.68a.807.807 0 0 0-.43-.563 1.807 1.807 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3H4.82Z"/>
                                    </svg>
                                </div>
                            @else
                                <p>dede</p>
                            @endif
                            {{-- 移動時間 --}}
                            <div>
                                @php
                                $hours = floor($commuteRecord->diff_time / 3600);
                                $minutes = floor(($commuteRecord->diff_time % 3600) / 60);
                                $seconds = $commuteRecord->diff_time % 60;
                                @endphp
                                <p><span></span> {{ "$hours 時間 $minutes 分 $seconds 秒" }}</p>
                            </div>
                        </div>
                        {{-- リンクボタン --}}
                        <div class="flex justify-end">
                            <div>
                                <button class=" bg-cyan-600 hover:bg-cyan-500 text-white text-sl rounded px-4 py-2 mr-2">
                                    <a href="{{ route('record.edit-record', $commuteRecord) }}"> 編集 </a>
                                </button>
                            </div>
                            <form  action="{{ route('record.destroy', $commuteRecord) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class=" bg-red-600 hover:bg-red-500 text-white text-sl rounded px-4 py-2 ">消去</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
</div>

</x-app-layout>
