<?php

namespace App\Repositories;

use App\Models\PlayerSkillStat;
use App\Interfaces\PlayerSkillStatRepositoryInterface;


class PlayerSkillStatRepository implements PlayerSkillStatRepositoryInterface
{
    public function index(){
        return PlayerSkillStat::all();
    }

    public function getById($id){
       return PlayerSkillStat::findOrFail($id);
    }

    public function store(array $data){
       return PlayerSkillStat::create($data);
    }

    public function update(array $data,$id){
       return PlayerSkillStat::whereId($id)->update($data);
    }

    public function delete($id){
        PlayerSkillStat::destroy($id);
    }
}