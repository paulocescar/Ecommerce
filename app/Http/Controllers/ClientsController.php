<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ClientsResource;
use App\Http\Resources\ClientsCollection;
use App\DataTransferObjects\ClientsDTO;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ClientsRequest;
use App\Services\ClientsServices;


class ClientsController extends Controller
{
    private $clientsServices;

    public function __construct(
        ClientsServices $clientsServices
    ){
        $this->clientsServices = $clientsServices;
    }

    public function get(): JsonResponse
    {
        $client = $this->clientsServices->get();
        return response()->json(new ClientsCollection($client->all()));
    }

    public function getById($id): JsonResponse
    {
        $client = $this->clientsServices->getById($id);
        return response()->json(new ClientsResource($client));
    }
    
    public function store(ClientsRequest $request)
    {
        $dto = new ClientsDTO($request->all());
        try{
            return $this->clientsServices->save($dto);
        }catch(Exception $e){
            return $e->message();
        }
    }

    public function updateById($id, ClientsRequest $request)
    {
        $dto = new ClientsDTO($request->all());
        try{
            return $this->clientsServices->updateById($id, $dto);
        }catch(Exception $e){
            return $e->message();
        }
    }
    
    public function deleteById($id)
    {
        try{
            return $this->clientsServices->deleteById($id);
        }catch(Exception $e){
            return $e->message();
        }
    }
}
