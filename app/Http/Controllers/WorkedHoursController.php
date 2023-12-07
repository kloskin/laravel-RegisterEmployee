<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkedHours;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WorkedHoursController extends Controller
{

    public function create(string $employeeID)
    {
        $employee = User::find($employeeID);
        return view('register_employee.moderator.hourworked', [
            'employee' => $employee
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'user_id'=>'required',
            'date' => 'required|date',
            'hours_worked' => 'required|numeric|min:0|max:24',
        ]);


        $workedHours = new WorkedHours();
        $workedHours->user_id = $request->user_id; // lub id pracownika, którego chcesz dodać
        $workedHours->date = $request->date;
        $workedHours->hours_worked = $request->hours_worked;
        $workedHours->save();

        return redirect()->route('home');
    }
    public function showWorkedHoursInMonth($userID)
    {
        $startDate = Carbon::now()->startOfMonth(); // Początek aktualnego miesiąca
        $endDate = Carbon::now()->endOfMonth(); // Koniec aktualnego miesiąca

        $workedHours = DB::table('worked_hours')
            ->where('user_id', $userID)
            ->whereBetween('date', [$startDate, $endDate])
            ->get();

        return view('your-view', compact('workedHours'));
    }
}
