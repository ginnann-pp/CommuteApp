<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyRoot;

class MyRootController extends Controller
{
    public function add_myroot()
    {
        $user_id = auth()->id();
        $my_root = MyRoot::where('user_id', $user_id)->get();

        return view('record.add-myroot')
            ->with(['my_root' => $my_root]);
    }

    public function createOrUpdate_myroot(Request $request)
    {
        $user_id = auth()->id();
        $user_record = MyRoot::where('user_id', $user_id)->first();

        if ($user_record) {
            // レコードが存在する場合は更新
            $user_record->update([
                'departure_location' => $request->input('departure_location'),
                'destination_location' => $request->input('destination_location'),
                'transportation_mode' => $request->input('transportation_mode'),
            ]);
        } else {
            // レコードが存在しない場合は新規作成
            $root = new MyRoot();
            $root->user_id = $user_id;
            $root->departure_location = $request->input('departure_location');
            $root->destination_location = $request->input('destination_location');
            $root->transportation_mode = $request->input('transportation_mode');
            $root->save();
        }

        return redirect()
            ->route('dashboard');
    }
}
