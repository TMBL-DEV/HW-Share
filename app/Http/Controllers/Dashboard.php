<?php

namespace App\Http\Controllers;

use App\Http\Resources\DashboardResource;
use App\Models\Assignment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Throwable;

class Dashboard extends Controller
{
    public function index()
    {
        $users = User::all();
        $dashboard = new \App\Models\Dashboard();
        $dashboardResource = new DashboardResource($dashboard);
        return Inertia::render('Dashboard', [
            "DashboardData" => $dashboardResource,
        ]);
    }

    public function rights($id, Request $request)
    {
        // if you dont have the rights, get error page
        if (!Auth::user() || !Auth::user()->admin) {
            abort(403, "You are not authorized to make this request");
        }
        try {
            // find user
            $user = User::find($id);
            // if there is no user return 404
            if (!$user) {
                abort(404, 'user not found');
            }
            // if the user is no admin make him one
            if ($user->admin == 0) {
                $user->admin = 1;
                // if the user is an admin, remove his rights
            } else {
                $user->admin = 0;
            }
            // save the changes
            $user->save();
        } catch (Throwable $th) {
            throw $th;
        }
        // en render the result
        return redirect(route('dashboard'));
    }

    public function assignments()
    {
        return Inertia::render('ManageAssignments', [
            'assignments' => Assignment::all(),
        ]);
    }
}
