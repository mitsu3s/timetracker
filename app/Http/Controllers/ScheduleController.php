<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;

        $schedules = Schedule::where('user_id', $user_id)
            ->where('begin', '>=', now())
            ->orderBy('begin', 'asc')
            ->get();

        foreach ($schedules as $schedule) {
            $schedule = addStatus($schedule);
        }

        return view('upcoming', compact('schedules'));
    }

    public function create(Request $request)
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'context' => 'required',
            'place' => 'required',
            'begin' => 'required|date',
            'end' => 'required|date|after_or_equal:begin',
        ]);

        if (Auth::check()) {
            $schedule = new Schedule();
            $schedule->context = $request->context;
            $schedule->place = $request->place;
            $schedule->begin = $request->begin;
            $schedule->end = $request->end;
            $schedule->user_id = Auth::user()->id;

            $schedule->save();

            return redirect()->route('upcoming');
        } else {
            return redirect()->route('login');
        }
    }

    public function edit($id)
    {
        $schedule = Schedule::find($id);

        if ($schedule == null) {
            abort(404);
        }

        return view('edit', compact('schedule'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'context' => 'required',
            'place' => 'required',
            'begin' => 'required',
            'end' => 'required|date|after_or_equal:begin',
        ]);

        if (Auth::check()) {
            $schedule = Schedule::find($id);
            $schedule->context = $request->context;
            $schedule->place = $request->place;
            $schedule->begin = $request->begin;
            $schedule->end = $request->end;
            $schedule->user_id = Auth::user()->id;

            $schedule->save();
            return redirect()->route('upcoming');
        } else {
            return redirect()->route('login');
        }
    }

    public function destroy($id)
    {
        if (Auth::check()) {
            $schedule = Schedule::find($id);
            $schedule->delete();
            return redirect()->route('upcoming');
        } else {
            return redirect()->route('login');
        }
    }

    public function setweek(Request $request)
    {
        $year = now()->year;
        $month = now()->month;
        $day = now()->day;

        return redirect()->route('week', ['year' => $year, 'month' => $month, 'day' => $day]);
    }

    public function moveweek(Request $request)
    {
        $year = $request->query('year');
        $month = $request->query('month');
        $day = $request->query('day');
        $offset = $request->query('offset');

        if (!$year || !$month || !$day || !$offset) {
            abort(302, 'Inappropriate Query');
        }

        if ($offset == 'prev') {
            $offset = -7;
        } elseif ($offset == 'next') {
            $offset = 7;
        } else {
            $offset = 0;
        }

        $startDate = Carbon::createFromDate($year, $month, $day)->startOfDay();
        $endDate = $startDate->copy()->addDays(6)->endOfDay();

        $startDate->addDays($offset);
        $endDate->addDays($offset);

        $year = $startDate->year;
        $month = $startDate->month;
        $day = $startDate->day;

        return redirect()->route('week', ['year' => $year, 'month' => $month, 'day' => $day]);
    }

    public function week(Request $request, $year, $month, $day)
    {

        $user_id = Auth::user()->id;
        $startDate = Carbon::createFromDate($year, $month, $day)->startOfDay();
        $endDate = $startDate->copy()->addDays(6)->endOfDay();


        $schedules = Schedule::where('user_id', $user_id)
            ->whereBetween('begin', [$startDate, $endDate])
            ->orderBy('begin', 'asc')
            ->get();

        foreach ($schedules as $schedule) {
            $schedule = addStatus($schedule);
        }

        $start = $startDate->format('Y/m/d');
        $end = $endDate->format('Y/m/d');

        return view('week', compact('schedules', 'year', 'month', 'day', 'start', 'end'));
    }

    public function setmonth(Request $request)
    {
        $year = now()->year;
        $month = now()->month;

        return redirect()->route('month', ['year' => $year, 'month' => $month]);
    }

    public function movemonth(Request $request)
    {
        $year = $request->query('year');
        $month = $request->query('month');
        $offset = $request->query('offset');

        if (!$year || !$month || !$offset) {
            abort(302, 'Inappropriate Query');
        }


        if ($offset == 'prev') {
            $offset = -1;
        } elseif ($offset == 'next') {
            $offset = 1;
        } else {
            $offset = 0;
        }
        $month = $month + $offset;

        if ($month > 12) {
            $year += floor($month / 12);
            $month = $month % 12;
        } elseif ($month < 1) {
            $year += ceil($month / 12) - 1;
            $month = 12 + ($month % 12);
        }

        return redirect()->route('month', ['year' => $year, 'month' => $month]);
    }

    public function month(Request $request, $year, $month)
    {
        $user_id = Auth::user()->id;
        $monthName = getMonthName($month);

        $schedules = Schedule::where('user_id', $user_id)
            ->whereYear('begin', $year)
            ->whereMonth('begin', $month)
            ->orderBy('begin', 'asc')
            ->get();

        foreach ($schedules as $schedule) {
            $schedule = addStatus($schedule);
        }

        return view('month', compact('schedules', 'year', 'month', 'monthName'));
    }
}

function getMonthName($month)
{
    $monthNames = [
        1 => 'January',
        2 => 'February',
        3 => 'March',
        4 => 'April',
        5 => 'May',
        6 => 'June',
        7 => 'July',
        8 => 'August',
        9 => 'September',
        10 => 'October',
        11 => 'November',
        12 => 'December',
    ];

    return $monthNames[$month] ?? 'Invalid Month';
}

function addStatus($schedule)
{
    $begin = Carbon::parse($schedule->begin);
    $end = Carbon::parse($schedule->end);

    if ($begin->diffInHours(now()) <= 24 && $begin->isFuture()) {
        $schedule->status = "approaching";
    } elseif ($begin->isPast() && $end->isFuture()) {
        $schedule->status = "ongoing";
    } elseif ($begin->isFuture()) {
        $schedule->status = "upcoming";
    } elseif ($end->isPast()) {
        $schedule->status = "done";
    }

    $schedule->begin = $begin->format('Y-m-d H:i');
    $schedule->end = $end->format('Y-m-d H:i');

    return $schedule;
}
