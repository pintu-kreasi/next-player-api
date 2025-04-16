<?php

namespace App\Repositories;
use App\Models\Team;
use App\Interfaces\TeamRepositoryInterface;
use Illuminate\Support\Facades\Auth;


class TeamRepository implements TeamRepositoryInterface
{
    // public $user = Auth::user();
    public function index(){
        $user = Auth::user();
        return Team::where('coach_id', $user->id)->get();
        // return Team::all();
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

