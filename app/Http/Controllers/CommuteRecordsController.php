<?php

namespace App\Http\Controllers;

use App\Models\CommuteRecords;
use App\Models\MyRoot;
use Carbon\Carbon;
use Illuminate\Http\Request;


class CommuteRecordsController extends Controller
{

    public function dashboard()
    {
        $user_id = auth()->id();
        $user_record = CommuteRecords::where('user_id', $user_id)->get();

        $seven_Datas_Ago = Carbon::now()->subDays(7);
        $seven_date_record = CommuteRecords::where('created_at', '>=', $seven_Datas_Ago)->get();

        return view('dashboard')
            ->with(['records' => $user_record,
                    'seven_date_record' => $seven_date_record]);
    }

    public function add_record()
    {
        $user_id = auth()->id();
        $my_root = MyRoot::where('user_id', $user_id)->get();

        return view('record.add-record')
            ->with(['my_root' => $my_root]);
    }
    // --ルート記録--
    public function create_record(Request $request)
    {

        $rules = [
            'departure_location' => 'required',
            'destination_location' => 'required',
            'transportation_mode' => 'required',
            'departure_time' => ['required', 'date'],
            'arrival_time' => ['required', 'date', 'after:departure_time'],
            'weather' => 'required',
        ];

        $messages = [

            'departure_location' => '入力必須です',
            'destination_location' => '入力必須です',
            'transportation_mode' => '入力必須です',
            'departure_time' => '入力必須です',
            'arrival_time.after' => '到着時刻は出発時刻よりも後である必要があります。',
            'arrival_time' => '入力必須です',
            'weather' => '入力必須です',
        ];

        $validatedData = $request->validate($rules, $messages);

        $user_id = auth()->id();
        $record = new CommuteRecords();
        $record->user_id = $user_id;
        $record->departure_location = $validatedData['departure_location'];
        $record->destination_location = $validatedData['destination_location'];
        $record->transportation_mode = $validatedData['transportation_mode'];
        $record->departure_time = $validatedData['departure_time'];
        $record->arrival_time = $validatedData['arrival_time'];
        $record->weather = $validatedData['weather'];

        // 出発時刻と到着時刻の時間差を計算
        $departureTime = Carbon::parse($validatedData['departure_time']);
        $arrivalTime = Carbon::parse($validatedData['arrival_time']);
        $timeDifferenceInSeconds = $arrivalTime->diffInSeconds($departureTime);
        $record->diff_time = $timeDifferenceInSeconds; // 時間差を保存

        $record->save();

        return redirect()
            ->route('dashboard');
    }

    public function edit(CommuteRecords $commuteRecord)
    {
        return view('record.edit-record')
            ->with(['CommuteRecords' => $commuteRecord]);
    }

    public function destroy_record(CommuteRecords $commuteRecord)
    {
        $commuteRecord->delete();

        return redirect()
            ->route('dashboard');
    }

    public function update_record(Request $request, CommuteRecords $commuteRecord)
    {
        $user_id = auth()->id();
        $commuteRecord->user_id = $user_id;
        $commuteRecord->departure_location = $request->departure_location;
        $commuteRecord->destination_location = $request->destination_location;
        $commuteRecord->transportation_mode = $request->transportation_mode;
        $commuteRecord->departure_time = $request->departure_time;
        $commuteRecord->arrival_time = $request->arrival_time;
        $commuteRecord->weather = $request->weather;
            // 出発時刻と到着時刻の時間差を計算
        $departureTime = Carbon::parse($request->departure_time);
        $arrivalTime = Carbon::parse($request->arrival_time);
        $timeDifferenceInSeconds = $arrivalTime->diffInSeconds($departureTime);
        $commuteRecord->diff_time = $timeDifferenceInSeconds; // 時間差を保存

        $commuteRecord->save();

        return redirect()
            ->route('dashboard');
    }
}
