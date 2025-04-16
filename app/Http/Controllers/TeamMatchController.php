<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTeamMatchRequest;
use App\Http\Requests\UpdateteamMatchRequest;
use App\Models\TeamMatch;
use App\Interfaces\TeamMatchRepositoryInterface;
use App\Classes\ApiResponseClass;
use App\Http\Resources\TeamMatchResource;
use Illuminate\Support\Facades\DB;

class TeamMatchController extends Controller
{
    private TeamMatchRepositoryInterface $teamMatchRepositoryInterface;

    public function __construct(TeamMatchRepositoryInterface $teamMatchRepositoryInterface)
    {
        $this->teamMatchRepositoryInterface = $teamMatchRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->teamMatchRepositoryInterface->index();

        return ApiResponseClass::sendResponse(TeamMatchResource::collection($data),'',200);
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
    public function store(StoreTeamMatchRequest $request)
    {
        $details = $request->input();
        DB::beginTransaction();
        try{
             $team = $this->teamMatchRepositoryInterface->store($details);

             DB::commit();
             return ApiResponseClass::sendResponse(new TeamMatchResource($team),'Team Match Create Successful',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamMatch $id)
    {
        $team = $this->teamMatchRepositoryInterface->getById($id);

        return ApiResponseClass::sendResponse(new TeamMatchResource($product),'',200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamMatch $teamMatch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamMatchRequest $request, TeamMatch $id)
    {
        $details =[
            'opponent' => $request->name,
            'location' => $request->location,
            'type' => $request->type,
            'team_id' => $request->team_id,
        ];
        DB::beginTransaction();
        try{
             $player = $this->teamMatchRepositoryInterface->update($details,$id);

             DB::commit();
             return ApiResponseClass::sendResponse('Team Match Update Successful','',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->teamMatchRepositoryInterface->delete($id);

        return ApiResponseClass::sendResponse('Team Matched Delete Successful','',204);
    }
}
