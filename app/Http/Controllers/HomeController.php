<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
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
                $assignments = Assignment::orderBy("due_date", 'asc')->paginate(15);
            } catch (\Exception $e) {
                $assignments = [];
            }
            return Inertia::render('Home', ["assignments" => $assignments]);
        }

        return Inertia::render('Welcome');
    }
}
