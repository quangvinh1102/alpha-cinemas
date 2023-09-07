<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Room;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $listSchedule = Schedule::get();

        foreach ($listSchedule as $value) {

            $movie = Movie::where('id', '=', $value->movie_id)->first();
            $room = Room::where('id', '=', $value->room_id)->first();
            $value['movie'] = $movie->name;
            $value['room'] = $room->name;
        }
        return response()->json($listSchedule);

    }

    public function create()
    {
        $listMovie = Movie::get();
        $listRoom = Room::get();
        return response()->json(['listMovie' => $listMovie, 'listRoom' => $listRoom]);
    }

    public function store(Request $request)
    {
        try {
            foreach ($request->showtime as $value) {
                foreach ($value['list_time'] as $time) {
                    if (!empty($value['date']) || !empty($time['time'])) {
                        Schedule::create([
                            'movie_id' => $request->movie,
                            'room_id' => $request->room,
                            'date' => Carbon::parse($value['date'])->format('Y/m/d'),
                            'time' => Carbon::parse($time['time'])->format('H:i'),
                        ]);
                    }
                }
            }
            return response()->json(['mess' => 'Thêm thành công!']);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }

    public function edit($id)
    {
        $listMovie = Movie::get();
        $listRoom = Room::get();
        $schedule = Schedule::where('id', '=', $id)->first();
        return response()->json(['listMovie' => $listMovie, 'listRoom' => $listRoom, 'schedule' => $schedule]);
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::find($id);
        // dd($request);
        try {
            $schedule->update([
                'movie_id' => $request->movie,
                'room_id' => $request->room,
                'date' => Carbon::parse($request->date)->format('Y/m/d'),
                'time' => Carbon::parse($request->time)->format('H:i'),
            ]);
            return response()->json(['mess' => 'Sửa thành công!']);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }

    public function delete($id)
    {
        $schedule = Schedule::find($id);
        try {
            $schedule->delete();

            return response()->json(['mess' => 'Xóa thành công!!']);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}