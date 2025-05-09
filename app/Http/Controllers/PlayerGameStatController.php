<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlayerGameStatRequest;
use App\Http\Requests\UpdatePlayerGameStatRequest;
use App\Models\PlayerGameStat;
use App\Interfaces\PlayerGameStatRepositoryInterface;
use App\Http\Resources\PlayerGameStatResource;
use App\Classes\ApiResponseClass;
use Illuminate\Support\Facades\DB;

class PlayerGameStatController extends Controller
{
    private PlayerGameStatRepositoryInterface $playerGameStatRepositoryInterface;

    public function __construct(PlayerGameStatRepositoryInterface $playerGameStatRepositoryInterface)
    {
        $this->playerGameStatRepositoryInterface = $playerGameStatRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(StorePlayerGameStatRequest $request)
    {
        $data = $this->playerGameStatRepositoryInterface->index();

        return ApiResponseClass::sendResponse(PlayerGameStatResource::collection($data),'',200);
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
    public function store(StorePlayerGameStatRequest $request)
    {
        $details = $request->input();

        // return response()->json($details, 401);
        DB::beginTransaction();
        try{
            $playerGameStat = $this->playerGameStatRepositoryInterface->store($details);

             DB::commit();
             return ApiResponseClass::sendResponse(new PlayerGameStatResource($playerGameStat),'Player Game Stat Create Successful',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $playerGameStat = $this->playerGameStatRepositoryInterface->getById($id);

        return ApiResponseClass::sendResponse(new PlayerGameStatResource($playerGameStat),'',200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlayerGameStat $playerGameStat)
    {
        return response()->json([], 401);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlayerGameStatRequest $request, $id)
    {
        $updateDetails = $request->input();
        DB::beginTransaction();
        try{
             $playerGameStat = $this->playerGameStatRepositoryInterface->update($updateDetails,$id);

             DB::commit();
             return ApiResponseClass::sendResponse('Player Game Stats Update Successful','',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->playerGameStatRepositoryInterface->delete($id);

        return ApiResponseClass::sendResponse('Player Game Stat Delete Successful','',204);
    }


    public function custom()
    {
        return ApiResponseClass::sendResponse(['test'=>'test'],'Player Create Successful',201);

    }

}
