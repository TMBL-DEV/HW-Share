<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()) {
            try {
                //code...
                $currentDate = Carbon::now()->toDateString();
                $assignments = Assignment::orderBy("due_date", 'asc')->whereDate("due_date", ">", $currentDate)->paginate(15);
                $pastDue = Assignment::orderBy("due_date", 'asc')->whereDate("due_date", "<", $currentDate)->paginate(15);
            } catch (\Exception $e) {
                $assignments = [];
                $pastDue = [];
            }
            return Inertia::render('Home', [
                "assignments" => $assignments,
                "pastDueAssignments" => $pastDue
            ]);
        }

        return Inertia::render('Welcome');
    }
}
