<?php

namespace App\Services;
use App\Repositories\ClientsRepository;
use App\DataTransferObjects\ClientsDTO;
use Illuminate\Support\Facades\Cache;
use DB;
/**
 * Class ClientsServices.
 */
class ClientsServices
{
    private $clientsRepository;

    public function __construct(
        ClientsRepository $clientsRepository
    ){
        $this->clientsRepository = $clientsRepository;
    }

    public function get(){

        if (!Cache::has('clientes')) {
            $clients = $this->clientsRepository->getWith();
            Cache::put('clientes', $clients, 600); // 10 Minutes
        } else {
            $clients = Cache::get('clientes');
        }
        return $clients;
    }
    
    public function getById($id){
        return $this->clientsRepository->getById((int)$id);
    }

    public function save(ClientsDTO $dto){
        DB::beginTransaction();
        try{
            $this->clientsRepository->create($dto->toArray());
            $this->forgetCache();
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }

    public function updateById($id,ClientsDTO $dto){
        DB::beginTransaction();
        try{
            $this->clientsRepository->updateById($id, $dto->toArray());
            $this->forgetCache();
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }
    
    public function deleteById($id){
        DB::beginTransaction();
        try{
            $this->clientsRepository->deleteById($id);
            $this->forgetCache();
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }

    public function forgetCache(){
        Cache::forget('clientes');
    }
}
