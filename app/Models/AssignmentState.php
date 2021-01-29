<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentState extends Model
{
    use HasFactory;
    // takes in 2 arguments, the assignment id and the user id
    public static function getAss($uuid, $id)
    {
        // starts a query and returns the first result
        $assState = AssignmentState::where([
            ['assignment_id', '=', $id],
            ['user_id', '=', $uuid]
        ])->first();
        return $assState;
    }
    public static function index($uuid)
    {
        // starts a query and returns the first result
        $assState = AssignmentState::where([
            ['user_id', '=', $uuid]
        ])->get();
        return $assState;
    }
}
