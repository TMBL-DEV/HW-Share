<?php

namespace App\Http\Controllers;

use App\Http\Resources\Assignment as ResourcesAssignment;
use App\Http\Resources\AssignmentResource;
use App\Models\Assignment;
use App\Models\AssignmentState;
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
                // $assignments = Assignment::orderBy("due_date", 'asc')->whereDate("due_date", ">", $currentDate)->paginate(15);
                $currentDate = Carbon::now()->toDateString();
                $assignments = Assignment::orderBy("due_date", 'asc')->whereDate("due_date", ">=", $currentDate)->paginate(15);
                $pastDue = Assignment::orderBy("due_date", 'asc')->whereDate("due_date", "<", $currentDate)->paginate(15);
                $collection =  AssignmentResource::collection($assignments);
                $collectionPastDue =  AssignmentResource::collection($pastDue);
            } catch (\Exception $e) {
                $assignments = [];
                $pastDue = [];
            }
            return Inertia::render('Home', [
                "pastDueAssignments" => $collectionPastDue,
                "collection" => $collection
            ]);
        }

        return Inertia::render('Welcome');
    }
}
