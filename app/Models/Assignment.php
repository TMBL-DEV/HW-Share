<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class Assignment extends Model
{
    use HasFactory;

    public static function pastDue(): LengthAwarePaginator
    {
        return self::orderBy("due_date", 'asc')->whereDate("due_date", "<", Carbon::now()->toDateString())->paginate(15);
    }

    public static function due(): LengthAwarePaginator
    {
        return self::orderBy("due_date", 'asc')->whereDate("due_date", ">=", Carbon::now()->toDateString())->paginate(15);
    }

}
