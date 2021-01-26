<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentState extends Model
{
    use HasFactory;
    // takes in 2 arguments, the assignment id and the user id
    public static function find($uuid, $id)
    {
        // starts a query and returns the first result
        $assState = AssignmentState::where([
            ['user_id', '=', $uuid],
            ['assignment_id', '=', $id]
        ])->first();
        return $assState;
    }
}
