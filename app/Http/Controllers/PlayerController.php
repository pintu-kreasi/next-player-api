<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Interfaces\PlayerRepositoryInterface;
use App\Classes\ApiResponseClass;
use App\Http\Resources\PlayerResource;
use Illuminate\Support\Facades\DB;


class PlayerController extends Controller
{
    //
    private PlayerRepositoryInterface $playerRepositoryInterface;

    public function __construct(PlayerRepositoryInterface $playerRepositoryInterface)
    {
        $this->playerRepositoryInterface = $playerRepositoryInterface;
    }

    public function index()
    {
        $data = $this->playerRepositoryInterface->index();

        return ApiResponseClass::sendResponse(PlayerResource::collection($data),'',200);
    }

    public function create()
    {
        //
        return ApiResponseClass::sendResponse([],'',200);
    }

    public function store(StorePlayerRequest $request)
    {
        $details = $request->input();
        // return ApiResponseClass::sendResponse($details,'Player Create Successful',201);
        DB::beginTransaction();
        try{
             $player = $this->playerRepositoryInterface->store($details);

             DB::commit();
             return ApiResponseClass::sendResponse(new PlayerResource($player),'Player Create Successful',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    public function show($id)
    {
        $player = $this->playerRepositoryInterface->getById($id);

        return ApiResponseClass::sendResponse(new PlayerResource($player),'',200);
    }

    public function edit(Player $player)
    {
        //
    }

    public function update(UpdatePlayerRequest $request, $id)
    {
        $updateDetails = $request->input();
        DB::beginTransaction();
        try{
             $player = $this->playerRepositoryInterface->update($updateDetails,$id);

             DB::commit();
             return ApiResponseClass::sendResponse($request->input(),'Player Update Successful',201);


        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    public function destroy($id)
    {
        $this->playerRepositoryInterface->delete($id);

        return ApiResponseClass::sendResponse('Player Delete Successful','',204);
    }

}
