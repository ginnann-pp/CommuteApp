<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('ホーム画面') }}
            </h2>
            <div>
                <button class=" bg-blue-600 hover:bg-blue-500 text-white text-sl rounded px-4 py-2">
                    <a href="">
                        投稿編集
                    </a>
                </button>
                <button class="bg-green-600 hover:bg-green-500 text-white text-sl rounded px-4 py-2">
                    <a href="{{ route('record.add-record') }}">
                        新規投稿
                    </a>
                </button>
            </div>
        </div>
    </x-slot>

    @foreach ($posts as $commuteRecord)
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
            <p><span class="font-bold">Created At:</span> {{ $commuteRecord->created_at }}</p>
            <p><span class="font-bold">Updated At:</span> {{ $commuteRecord->updated_at }}</p>
        </div>
    </div>
    @endforeach
    
</x-app-layout>
