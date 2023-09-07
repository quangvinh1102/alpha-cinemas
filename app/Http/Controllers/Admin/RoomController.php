<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {   
        $room = Room::all();
        return response()->json($room);
    }

    public function create(RoomRequest $request)
    {
        $create = Room::create([
            "name" => $request->name,
            "address" => $request->address,
        ]);
        return response()->json(['mess' => 'Thêm thành công!!']);
    }

    public function edit($id)
    {
        $room = Room::find($id);

        return response()->json($room);
    }

    public function update(Request $request, $id)
    {
        $room = Room::find($id);
        try {
            $room->update([
                "name" => $request->name,
                "address" => $request->address,
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function delete($id)
    {
        $room = Room::find($id);
        try {
            $room->delete();

            return response()->json(['mess' => 'Xóa thành công!!']);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
