<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $employees = User::paginate(10);

        foreach ($employees as $employee) {
            $employee->total_hours_worked = $employee->workedHours()
                ->whereYear('date', now()->year)
                ->whereMonth('date', now()->month)
                ->sum('hours_worked');
        }

        return view('register_employee.all-employee', [
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register_employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'required',
        ]);


        $request->user()->create($validate);

        return redirect(route('employees.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $employee)
    {
        $startDate = Carbon::now()->startOfMonth(); // Początek aktualnego miesiąca
        $endDate = Carbon::now()->endOfMonth(); // Koniec aktualnego miesiąca

        $workedHours = DB::table('worked_hours')
            ->select(DB::raw('SUM(hours_worked) as total_hours'))
            ->where('user_id', $employee->id)
            ->whereBetween('date', [$startDate, $endDate])
            ->first();


        /*$workedHours = DB::table('worked_hours')
            ->where('user_id', $employee->id)
            ->whereBetween('date', [$startDate, $endDate])
            ->get();*/

        return view('register_employee.show', [
            'employee'=>$employee,
            'workedHours'=>$workedHours,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $user)
    {
        $user = User::find($user);
        return view('register_employee.admin.edit-form', [
            'user'=>$user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $user)
    {
        $user = User::find($user);
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' =>'required',
        ]);

        $user->update($validated);

        return redirect(route('admin_dashboard'));
    }
    public function updatePassword(Request $request, string $user)
    {
        $user = User::find($user);
        $validated = $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user->update($validated);

        return redirect(route('admin_dashboard'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $userID)
    {
        $user = User::find($userID);
        $user->delete();
        return redirect()->route('admin_dashboard');
    }

    public function showAllUsers()
    {
            $users = User::paginate(10);
            return view('register_employee.admin-dashboard', [
                'users' => $users
            ]);
    }

}
