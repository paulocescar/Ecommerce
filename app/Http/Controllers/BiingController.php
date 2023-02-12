<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlingResource;
use App\Http\Resources\BlingCollection;
use App\DataTransferObjects\BlingDTO;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\BlingRequest;
use App\Services\BlingServices;

class BiingController extends Controller
{
    private $blingServices;

    public function __construct(
        BlingServices $blingServices
    ){
        $this->blingServices = $blingServices;
    }

    public function get(): JsonResponse
    {
        $client = $this->blingServices->get();
        return response()->json(new BlingCollection($client->all()));
    }

    public function getById($id): JsonResponse
    {
        $client = $this->blingServices->getById($id);
        return response()->json(new BlingResource($client));
    }
    
    public function getByUser(): JsonResponse
    {
        $blingSettigs = $this->blingServices->getByUser();
        return response()->json($blingSettigs);
    }

    public function store(BlingRequest $request)
    {
        $dto = new BlingDTO($request->all());
        try{
            return $this->blingServices->save($dto);
        }catch(Exception $e){
            return $e->message();
        }
    }

    public function updateById($id, BlingRequest $request)
    {
        $dto = new BlingDTO($request->all());
        try{
            return $this->blingServices->updateById($id, $dto);
        }catch(Exception $e){
            return $e->message();
        }
    }
    
    public function deleteById($id)
    {
        try{
            return $this->blingServices->deleteById($id);
        }catch(Exception $e){
            return $e->message();
        }
    }
}
