<?php

namespace App\Http\Controllers;

use App\Http\Resources\AssignmentResource;
use App\Models\Assignment;
use Carbon\Carbon;
use Exception;
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
                $assignments = Assignment::due();
                $pastDue = Assignment::pastDue();
                $collection = AssignmentResource::collection($assignments);
                $collectionPastDue = AssignmentResource::collection($pastDue);
            } catch (Exception $e) {
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
