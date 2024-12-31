<?php

namespace App\Repositories;
use App\Models\Player;
use App\Interfaces\PlayerRepositoryInterface;

class PlayerRepository implements PlayerRepositoryInterface
{
    public function index(){
        return Player::all();
    }

    public function getById($id){
       return Player::findOrFail($id);
    }

    public function store(array $data){
       return Player::create($data);
    }

    public function update(array $data,$id){
       return Player::whereId($id)->update($data);
    }

    public function delete($id){
        Player::destroy($id);
    }
}
