<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' =>$this->id,
            'name' => $this->name,
            'email' => $this->email,
            'dob' => $this->dob,
            'position' => $this->position,
            'team_id' => $this->team_id,
            'matches' => $this->team->matches,
            'game_stats' => $this->game_stats,
        ];
    }
}
