<?php

namespace App\Repositories;
use App\Models\Team;
use App\Interfaces\TeamRepositoryInterface;


class TeamRepository implements TeamRepositoryInterface
{
    public function index(){
        return Team::all();
    }

    public function getById($id){
       return Team::findOrFail($id);
    }

    public function store(array $data){
       return Team::create($data);
    }

    public function update(array $data,$id){
       return Team::whereId($id)->update($data);
    }

    public function delete($id){
        Team::destroy($id);
    }
}

