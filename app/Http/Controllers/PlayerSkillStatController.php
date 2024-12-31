<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlayerSkillStatRequest;
use App\Http\Requests\UpdatePlayerSkillStatRequest;
use App\Models\PlayerSkillStat;
use App\Interfaces\PlayerSkillStatRepositoryInterface;
use App\Http\Resources\PlayerSkillStatResource;
use App\Classes\ApiResponseClass;
use Illuminate\Support\Facades\DB;

class PlayerSkillStatController extends Controller
{
    private PlayerSkillStatRepositoryInterface $playerSkillStatRepositoryInterface;

    public function __construct(PlayerSkillStatRepositoryInterface $playerSkillStatRepositoryInterface)
    {
        $this->playerSkillStatRepositoryInterface = $playerSkillStatRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->playerSkillStatRepositoryInterface->index();

        return ApiResponseClass::sendResponse(PlayerSkillStatResource::collection($data),'',200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlayerSkillStatRequest $request)
    {
        $details =[
            'player_id' => $request->player_id,
            'dribbling' => $request->dribbling,
            'passing' => $request->passing,
            'shooting' => $request->shooting,
            'defense' => $request->defense,
            'speed' => $request->speed,
            'durability' => $request->durability,
            'power' => $request->power,
            'cooperative' => $request->cooperative,
            'dicipline' => $request->dicipline,
            'effort' => $request->effort,
        ];
        DB::beginTransaction();
        try{
             $playerSkillStat = $this->playerSkillStatRepositoryInterface->store($details);

             DB::commit();
             return ApiResponseClass::sendResponse(new PlayerSkillStatResource($playerSkillStat),'Player Skill Stat Create Successful',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $playerSkillStat = $this->teamRepositoryInterface->getById($id);

        return ApiResponseClass::sendResponse(new PlayerSkillStatResource($playerSkillStat),'',200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlayerSkillStat $playerSkillStat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlayerSkillStatRequest $request, $id)
    {
        $updateDetails =[
            'player_id' => $request->player_id,
            'dribbling' => $request->dribbling,
            'passing' => $request->passing,
            'shooting' => $request->shooting,
            'defense' => $request->defense,
            'speed' => $request->speed,
            'durability' => $request->durability,
            'power' => $request->power,
            'cooperative' => $request->cooperative,
            'dicipline' => $request->dicipline,
            'effort' => $request->effort,
        ];
        DB::beginTransaction();
        try{
             $playerSkillStat = $this->playerSkillStatRepositoryInterface->update($updateDetails,$id);

             DB::commit();
             return ApiResponseClass::sendResponse('Team Update Successful','',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->playerSkillStatRepositoryInterface->delete($id);

        return ApiResponseClass::sendResponse('Player Skill Stat Delete Successful','',204);
    }
}
