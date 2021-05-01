<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\AssignmentState;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Inertia\Response;

class AssignmentController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('CreateAssignment');
    }

    public function store(): RedirectResponse
    {
        Request::validate([
            'title' => ['required', 'max:50'],
            'description' => ['required', 'max:500'],
            'classes' => ['required', 'max:50',],
            'dueDate' => ['required'],
        ]);

        $assignment = new Assignment();
        $assignment->title = request('title');
        $assignment->description = request('description');
        $assignment->class = request('classes');
        $assignment->due_date = request('dueDate');
        $assignment->save();

        return Redirect::route('home');
    }

    public function show($id): Response
    {
        $ass = Assignment::find($id);
        if (!$ass) abort(404, 'Assignment not found');
        $state = AssignmentState::getAss(Auth::user()->id, $id);
        if (!$state) $state = ['state' => 0];
        return Inertia::render('Assignment', ["assignment" => $ass, "state" => $state]);
    }

    public function edit(Assignment $assignment)
    {
        //todo edit page
    }

    public function update(Request $request, Assignment $assignment)
    {
        //todo update handling
    }

    public function destroy(Assignment $assignment)
    {
        //todo delete handling
    }
}
