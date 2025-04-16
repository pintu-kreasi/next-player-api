<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Team;
use App\Interfaces\TeamRepositoryInterface;
use App\Classes\ApiResponseClass;
use App\Http\Resources\TeamResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class TeamController extends Controller
{
    private TeamRepositoryInterface $teamRepositoryInterface;

    public function __construct(TeamRepositoryInterface $teamRepositoryInterface)
    {
        $this->teamRepositoryInterface = $teamRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->teamRepositoryInterface->index();

        return ApiResponseClass::sendResponse(TeamResource::collection($data),'',200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return ApiResponseClass::sendResponse([],'',200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        // $user = Auth::user();
        // $details =[
        //     'name' => $request->name,
        //     'address' => $request->address??null,
        //     'province' => $request->province??null,
        //     'city' => $request->city??null,
        //     'coach_id' => $request->user()->id,
        // ];
        $details = $request->input();
        $details['coach_id'] = $request->user()->id;
        
        DB::beginTransaction();
        try{
            $team = $this->teamRepositoryInterface->store($details);
            DB::commit();
            return ApiResponseClass::sendResponse(new TeamResource($team),'Team Create Successful',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $team = $this->teamRepositoryInterface->getById($id);

        return ApiResponseClass::sendResponse(new TeamResource($team),'',200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, $id)
    {
        $updateDetails = $request->input();

        DB::beginTransaction();
        try{
             $team = $this->teamRepositoryInterface->update($updateDetails,$id);

             DB::commit();
             return ApiResponseClass::sendResponse($request->input(),'Team Update Successful',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->teamRepositoryInterface->delete($id);

        return ApiResponseClass::sendResponse('Player Delete Successful','',204);
    }
}
