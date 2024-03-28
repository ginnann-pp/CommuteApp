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
            <div class="bg-white shadow-md rounded-lg p-6 max-w-7xl">
                <div>
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <div>

                </div>
            </div>
        </div>

        <div class="lite w-3/4">

            {{--グラフ--}}
            <div class="py-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-md rounded-lg p-6 mb-6  max-w-7xl">
                    {{-- 変数をLaravelから渡す class --}}
                    {{-- <x-trend :records="$records"/> --}}
                </div>
            </div>

            <script>
                let dataObject = [
                    { arrival_time: "2024-03-20 10:33:00", diff_time: 100 },
                    { arrival_time: "2024-03-21 10:33:00", diff_time: 360 },
                    { arrival_time: "2024-03-22 08:15:00", diff_time: 250 },
                    { arrival_time: "2024-03-23 14:20:00", diff_time: 150 },
                    { arrival_time: "2024-03-24 12:45:00", diff_time: 480 },
                    { arrival_time: "2024-03-25 12:45:00", diff_time: 430 },
                    { arrival_time: "2024-03-26 12:45:00", diff_time: 420 },
                    { arrival_time: "2024-03-27 12:45:00", diff_time: 280 },
                    { arrival_time: "2024-03-28 12:45:00", diff_time: 280 },
                    // 他のオブジェクトも追加する場合はここに追加
                ];

                let today = new Date();

                let sevenDaysLater = new Date();
                sevenDaysLater.setDate(today.getDate() -7 );

                let diffTimeArray = [];

                for(let i = 0; i < 7; i++) {
                    let currentDate = new Date(today);
                    currentDate.setDate(today.getDate() - i)

                    let foundData = dataObject.find(obj => {
                    let arrivalDate = new Date(obj.arrival_time);
                    return arrivalDate.toDateString() === currentDate.toDateString();
                         });


                    // データが見つかった場合は diff_time を配列に格納、見つからない場合は 0 を格納
                    if (foundData) {
                        diffTimeArray.push(foundData.diff_time);
                    } else {
                        diffTimeArray.push(0);
                    }
                }
                console.log(diffTimeArray);


            </script>
            {{--  --}}

            @foreach ($records as $commuteRecord)
            <div class="py-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-md rounded-lg p-6 mb-6  max-w-7xl">
                    <h2 class="text-xl font-bold mb-4">Commute Record</h2>
                    <p><span class="font-bold">kye ID:</span> {{ $commuteRecord->id }}</p>
                    <p><span class="font-bold">User ID:</span> {{ $commuteRecord->user_id }}</p>
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
