<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function showAttendance($rfid_id)
    {
        $attendance = Attendance::where('rfid_id', $rfid_id)->get();

        if ($attendance->isEmpty()) {
            return response()->json("Not found", 404);
        }

        return response()->json($attendance, 200);
    }

    public function create()
    {
        return 'create page';
    }

    public function store(Request $request)
    {
        $attendance = new Attendance();

        $request->validate([
            'rfid_id' => 'required|string|max:255',
        ]);
        
        // $attendance->rfid_id (info in our database)
        // $request->rfid_id (info in $request - arduino input)
        $attendance->rfid_id = $request->rfid_id;

        $attendance->save();
        return response()->json($attendance, 200);
    }

    public function edit()
    {
        return 'edit page';
    }

    public function update(Request $request, $id) 
    {
        // find attendance base on primary key
        $attendance = Attendance::find($id);

        $request->validate([
            'rfid_id' => 'required|string|max:255',
        ]);
        
        // $attendance->rfid_id (info in our database)
        // $request->rfid_id (info in $request - arduino input)
        $attendance->rfid_id = $request->rfid_id;

        $attendance->update();
        return response()->json($attendance, 200);
    }

    public function destroy($id)
    {
        // find attendance base on primary key
        $attendance = Attendance::find($id);

        $attendance->delete();
        return response()->json($attendance, 200);
    }
}
