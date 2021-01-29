<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\AssignmentState;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('CreateAssignment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // dd(Request::all());
        //
        try {
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

            return redirect(route('home'));
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ass = Assignment::find($id);
        if (!$ass) abort(404, 'Assignment not found');
        $state = AssignmentState::getAss(Auth::user()->id, $id);
        if (!$state) $state = ['state' => 0];
        return Inertia::render('Assignment', ["assignment" => $ass, "state" => $state]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        //
    }
}
