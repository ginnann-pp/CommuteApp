<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('編集') }}
            </h2>

        </div>
    </x-slot>

    <div class="pt-14 w-3/5 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <form action="{{ route('record.update-record', $CommuteRecords) }}" method="POST"  class="p-6">
                @method('PATCH')
                @csrf

                <div class="mb-4">
                    <label for="departure_location" class="block text-sm font-medium text-gray-700">出発場所</label>
                    <input type="text" name="departure_location" id="departure_location" value="{{$CommuteRecords->departure_location}}" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="destination_location" class="block text-sm font-medium text-gray-700">到着場所</label>
                    <input type="text" name="destination_location" id="destination_location" value="{{$CommuteRecords->destination_location}}" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="transportation_mode" class="block text-sm font-medium text-gray-700">移動手段</label>
                    <input type="text" name="transportation_mode" id="transportation_mode" value="{{$CommuteRecords->transportation_mode}}" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="departure_time" class="block text-sm font-medium text-gray-700">出発時間</label>
                    <input type="datetime-local" id="departure_time" name="departure_time" value="{{$CommuteRecords->departure_time}}" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="arrival_time" class="block text-sm font-medium text-gray-700">到着時間</label>
                    <input type="datetime-local" id="arrival_time" name="arrival_time" value="{{$CommuteRecords->arrival_time}}" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="weather" class="block text-sm font-medium text-gray-700">天気</label>
                    <input type="text" name="weather" id="weather" value="{{$CommuteRecords->weather}}" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm">
                </div>


                <div class="flex justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        更新
                    </button>
                </div>
            </form>
        </div>
    </div>


    <h1>{{ $CommuteRecords->arrival_time }}</h1>
</x-app-layout>
