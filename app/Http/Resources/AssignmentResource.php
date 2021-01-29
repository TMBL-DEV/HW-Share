<?php

namespace App\Http\Resources;

use App\Models\AssignmentState;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class AssignmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "class" => $this->class,
            "state" => AssignmentState::getAss(Auth::user()->id, $this->id),
            "due_date" => $this->due_date,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
