<?php

namespace App\Services;
use App\Repositories\BlingRepository;
use App\DataTransferObjects\BlingDTO;
use Illuminate\Support\Facades\Cache;
use DB;
/**
 * Class BlingServices.
 */
class BlingServices
{
    private $blingRepository;

    public function __construct(
        BlingRepository $blingRepository
    ){
        $this->blingRepository = $blingRepository;
    }

    public function get(){
        if (!Cache::has('bling')) {
            $bling = $this->blingRepository->get();
            Cache::put('bling', $bling, 600); // 10 Minutes
        } else {
            $bling = Cache::get('bling');
        }
        return $bling;
    }
    
    public function getById($id){
        return $this->blingRepository->getById((int)$id);
    }

    public function getByUser(){
        if (!Cache::has('blingUser')) {
            $bling = $this->blingRepository->getByUser();
            Cache::put('blingUser', $bling, 600); // 10 Minutes
        } else {
            $bling = Cache::get('blingUser');
        }
        return $bling;
    }

    public function save(BlingDTO $dto){
        DB::beginTransaction();
        try{
            $user =  auth('sanctum')->user();
            $dto->user_id = $user->id;
            $this->blingRepository->create($dto->toArray());
            $this->forgetCache();
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }

    public function updateById($id, BlingDTO $dto){
        DB::beginTransaction();
        try{
            $this->blingRepository->updateById($id, $dto->toArray());
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
            $this->blingRepository->deleteById($id);
            $this->forgetCache();
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }

    public function forgetCache(){
        Cache::forget('bling');
        Cache::forget('blingUser');
    }
}
