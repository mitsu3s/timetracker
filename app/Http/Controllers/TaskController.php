<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;

        // Log::debug((session()->all()));
        $tasks = Task::where('user_id', $user_id)->get();
        return view('dashboard', compact('tasks'));
    }

    public function create(Request $request)
    {
        $user_id = Auth::user()->id;

        $tasks = Task::where('user_id', $user_id)->get();
        return view('create', compact('tasks'));
    }

    public function store(Request $request)
    {
        // Log::debug($request->all());
        $request->validate([
            'context' => 'required',
            'place' => 'required',
            'begin' => 'required',
            'end' => 'required',
        ]);

        if (Auth::check()) {
            $task = new Task();
            $task->context = $request->context;
            $task->place = $request->place;
            $task->begin = $request->begin;
            $task->end = $request->end;
            $task->user_id = Auth::user()->id;

            $task->save();

            // return redirect('dashboard');
            return redirect()->route('dashboard');
        } else {

            // return redirect('login');
            return redirect()->route('login');
        }
    }

    public function edit($id)
    {
        $task = Task::find($id);
        // Log::debug($task);
        return view('edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        Log::debug($request->all());
        $request->validate([
            'context' => 'required',
            'place' => 'required',
            'begin' => 'required',
            'end' => 'required',
        ]);

        if (Auth::check()) {
            $task = Task::find($id);
            $task->context = $request->context;
            $task->place = $request->place;
            $task->begin = $request->begin;
            $task->end = $request->end;
            $task->user_id = Auth::user()->id;

            $task->save();
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login');
        }
    }

    public function destroy($id)
    {
        if (Auth::check()) {
            $task = Task::find($id);
            $task->delete();
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login');
        }
    }

    public function week(Request $request)
    {
        $user_id = Auth::user()->id;

        $tasks = Task::where('user_id', $user_id)->where('begin', '>=', now())->where('begin', '<=', now()->addDays(7))->get();
        return view('week', compact('tasks'));
    }

    public function month(Request $request)
    {
        $user_id = Auth::user()->id;

        $tasks = Task::where('user_id', $user_id)->where('begin', '>=', now())->where('begin', '<=', now()->addMonths(1))->get();
        return view('month', compact('tasks'));
    }
}
