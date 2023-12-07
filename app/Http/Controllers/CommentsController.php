<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Pobranie daty z żądania lub ustawienie aktualnej daty jako domyślnej
        $currentDate = $request->input('date', Carbon::now()->format('Y-m-d'));

        // Konwertowanie aktualnej daty na obiekt Carbon
        $currentDateObj = Carbon::createFromFormat('Y-m-d', $currentDate);

        // Obliczenie daty poprzedniej
        $previousDateObj = $currentDateObj->copy()->subDay();
        $previousDate = $previousDateObj->format('Y-m-d');

        // Obliczenie daty następnej
        $nextDateObj = $currentDateObj->copy()->addDay();
        $nextDate = $nextDateObj->format('Y-m-d');

        // Pobranie komentarzy z bazy danych dla danej daty


        $comments = Comments::whereDate('created_at', $currentDate)->paginate(5);

        return view('register_employee.comments.index', [
            'comments'=>$comments,
            'currentDate' => $currentDate,
            'previousDate' => $previousDate,
            'nextDate' => $nextDate,
        ]);

    }
    public function myComments(Request $request)
    {
        $user = Auth::user();

        // Pobranie daty z żądania lub ustawienie aktualnej daty jako domyślnej
        $currentDate = $request->input('date', Carbon::now()->format('Y-m-d'));

        // Konwertowanie aktualnej daty na obiekt Carbon
        $currentDateObj = Carbon::createFromFormat('Y-m-d', $currentDate);

        // Obliczenie daty poprzedniej
        $previousDateObj = $currentDateObj->copy()->subDay();
        $previousDate = $previousDateObj->format('Y-m-d');

        // Obliczenie daty następnej
        $nextDateObj = $currentDateObj->copy()->addDay();
        $nextDate = $nextDateObj->format('Y-m-d');

        // Pobranie komentarzy z bazy danych dla danej daty
        $comments = $user->comments()
            ->whereDate('created_at', $currentDate)
            ->paginate(5);

        return view('register_employee.comments.my-comments', [
            'comments'=>$comments,
            'currentDate' => $currentDate,
            'previousDate' => $previousDate,
            'nextDate' => $nextDate,
        ]);

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register_employee.comments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $request->user()->comments()->create($validate);

        return redirect(route('comments.my_comments'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $comments)
    {

       $comment = Comments::find($comments);
        return view('register_employee.comments.show', [
            'comments'=>$comment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $comments)
    {
        $comment = Comments::find($comments);
        return view('register_employee.comments.edit', [
            'comment'=>$comment
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $comments)
    {
        $comment = Comments::find($comments);
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment->update($validated);

        return redirect(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $comments)
    {
        $comment = Comments::find($comments);
        $comment->delete();
        return redirect(route('home'));
    }
}
