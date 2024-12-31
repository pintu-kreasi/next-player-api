<?php

namespace App\Repositories;

use App\Models\TeamMatch;
use App\Interfaces\TeamMatchRepositoryInterface;

class TeamMatchRepository implements TeamMatchRepositoryInterface
{
    public function index(){
        return TeamMatch::all();
    }

    public function getById($id){
       return TeamMatch::findOrFail($id);
    }

    public function store(array $data){
       return TeamMatch::create($data);
    }

    public function update(array $data,$id){
       return TeamMatch::whereId($id)->update($data);
    }

    public function delete($id){
        TeamMatch::destroy($id);
    }
}
