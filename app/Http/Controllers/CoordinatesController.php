<?php

namespace App\Http\Controllers;

use App\Coordinates;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CoordinatesController extends Controller
{
    public function send(Request $request)
    {
        foreach ($request->data as $key => $item){
            Coordinates::query()->create($item);
        }
        return response()->json(['message' => 'ОК']);
    }

    public function index() {
        $result = Coordinates::query()->whereDate('created_at', Carbon::now())->get();
        return response()->json(['data' => $result]);
    }
}
