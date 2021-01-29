<?php

namespace App\Http\Controllers;

use App\Models\AssignmentState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AssignmentStateController extends Controller
{
    public function store($id, Int $state)
    {
        //check if the state numbers are right if not return an error page
        if ($state < 0 || $state > 3) abort(403, "forbidden code");
        //  get the assignment
        $assState = AssignmentState::where([
            ['user_id', '=', Auth::user()->id],
            ['assignment_id', '=', $id]
        ])->first();
        // check if the user already has a state on the assignment
        // if not create a new assignment state 
        if (!$assState) {
            // create new assignment state
            $assState = new AssignmentState();
            // set an assignment id as reference
            $assState->assignment_id = $id;
            // set an user id as reference to a user
            $assState->user_id = Auth::user()->id;
            // set a state for the assignment
            $assState->state = $state;
            // dial dump the new assignment state to check if everything is right
            // dd($assState);
        } else {
            $assState->state = $state;
        }
        $assState->save();
        return redirect(route('assignment', $id));
    }
}
