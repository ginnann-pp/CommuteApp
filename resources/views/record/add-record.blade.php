<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('記録追加') }}
            </h2>

        </div>
    </x-slot>

    <div class="pt-14 w-3/5 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <form action="{{ route('record.create') }}" method="POST"  class="p-6">
                @csrf

                <div class="mb-4">
                    <label for="departure_location" class="block text-sm font-medium text-gray-700">出発場所</label>
                    <input type="text"value="{{ $my_root->isNotEmpty() ? $my_root->pluck('departure_location')->first() : '' }}" name="departure_location" id="departure_location" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="destination_location" class="block text-sm font-medium text-gray-700">到着場所</label>
                    <input type="text" value="{{ $my_root->isNotEmpty() ? $my_root->pluck('destination_location')->first() : '' }}" name="destination_location" id="destination_location" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="transportation_mode" class="block text-sm font-medium text-gray-700">移動手段</label>
                    <input type="text" value="{{ $my_root->isNotEmpty() ? $my_root->pluck('transportation_mode')->first() : '' }}" name="transportation_mode" id="transportation_mode" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="departure_time" class="block text-sm font-medium text-gray-700">出発時間</label>
                    <input type="datetime-local" id="departure_time" name="departure_time" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="arrival_time" class="block text-sm font-medium text-gray-700">到着時間</label>
                    <input type="datetime-local" id="arrival_time" name="arrival_time" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="weather" class="block text-sm font-medium text-gray-700">天気</label>
                    <input type="text" name="weather" id="weather" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm">
                </div>


                <div class="flex justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        投稿する
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
