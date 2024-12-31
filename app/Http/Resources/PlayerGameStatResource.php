<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerGameStatResource extends JsonResource
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
            'game_id' =>$this->game_id,
            'two_point' =>$this->two_point,
            'three_point' =>$this->three_point,
            'free_throw' =>$this->free_throw,
            'assist' =>$this->assist,
            'offensive_rebound' =>$this->offensive_rebound,
            'defensive_rebound' =>$this->defensive_rebound,
            'steal' =>$this->steal,
            'block' =>$this->block,
            'turn_over' =>$this->turn_over,
        ];
    }
}
