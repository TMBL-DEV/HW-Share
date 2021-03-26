<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;

    private $users = null;
    private $assignments = null;

    public function assignments(): object
    {
        return $this->assignments = Assignment::all();
    }

    public function users(): object
    {
        return $this->users = User::all();
    }

    public function usersCount(): int
    {
        return count($this->users);
    }

    public function assignmentsCount(): int
    {
        return count($this->assignments);
    }

    public function pastDueAssignments()
    {
        return Assignment::whereDate('due_date', '<', Carbon::now())->get();
    }

    public function dueAssignments()
    {
        return Assignment::whereDate('due_date', '>=', Carbon::now())->get();
    }

}
