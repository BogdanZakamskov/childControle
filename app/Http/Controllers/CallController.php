<?php

namespace App\Http\Controllers;

use App\Call;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CallController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->data;
        $time = Carbon::now()->toDateTimeString();
        foreach ($data as $key => $item){
            $data[$key]['created_at'] = $time;
            $data[$key]['updated_at'] = $time;
        }
        Call::query()->insert($data);
        return response()->json(['message' => 'ОК']);
    }

    public function index() {
        $result = Call::query()->whereDate('created_at', '>=', Carbon::now()->subDays(2))->get();
        return response()->json(['data' => $result]);
    }
}
