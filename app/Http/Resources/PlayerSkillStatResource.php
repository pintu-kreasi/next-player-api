<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerSkillStatResource extends JsonResource
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
            'player_id' => $this->player_id,
            'dribbling' => $this->dribbling,
            'passing' => $this->passing,
            'shooting' => $this->shooting,
            'defense' => $this->defense,
            'speed' => $this->speed,
            'durability' => $this->durability,
            'power' => $this->power,
            'cooperative' => $this->cooperative,
            'dicipline' => $this->dicipline,
            'effort' => $this->effort,
        ];
    }
}
