<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::all();
        return view('dashboard', compact('tasks'));
    }

    public function week(Request $request)
    {
        $user_id = Auth::user()->id;

        $tasks = Task::where('user_id', $user_id)->where('begin', '>=', now())->where('begin', '<=', now()->addDays(7))->get();
        return view('week', compact('tasks'));
    }
}
