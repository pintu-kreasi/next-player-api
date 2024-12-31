<?php

namespace App\Repositories;

use App\Models\PlayerGameStat;
use App\Interfaces\PlayerGameStatRepositoryInterface;

class PlayerGameStatRepository implements PlayerGameStatRepositoryInterface
{
    public function index(){
        return PlayerGameStat::all();
    }

    public function getById($id){
       return PlayerGameStat::findOrFail($id);
    }

    public function store(array $data){
       return PlayerGameStat::create($data);
    }

    public function update(array $data,$id){
       return PlayerGameStat::whereId($id)->update($data);
    }

    public function delete($id){
        PlayerGameStat::destroy($id);
    }
}
