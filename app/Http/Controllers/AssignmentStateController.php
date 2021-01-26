<?php

namespace App\Http\Controllers;

use App\Models\AssignmentState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentStateController extends Controller
{
    public function store($id, $state)
    {
        // dd($id, $state);
        $assState = AssignmentState::where([
            ['user_id', '=', Auth::user()->id],
            ['assignment_id', '=', $id]
        ])->first();

        if (!$assState) {
            dd('oofed');
        }
    }
}
