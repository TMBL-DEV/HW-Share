<?php

namespace App\Http\Resources;

use App\Models\Dashboard;
use Illuminate\Http\Resources\Json\JsonResource;

class DashboardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Dashboard $request
     * @return array
     */
    public function toArray($request)
    {
        //dashboard data thingies yes...

        return [
            "users" => $this->users(),
            "userCount" => $this->usersCount(),
            "assignments" => $this->assignments(),
            "assignmentCount" => $this->assignmentsCount(),
            "pastDueCount" => count($this->pastDueAssignments()),
            "dueCount" => count($this->dueAssignments()),
        ];
    }
}
