<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'job_id' => $this->job_id,
            'status' => $this->status,
            'cover_letter' => $this->cover_letter,
            'job' => $this->whenLoaded('job'),
            'created_at' => $this->created_at,
        ];
    }
}