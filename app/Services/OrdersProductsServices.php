<?php

namespace App\Services;
use App\Repositories\OrderProductsRepository;
use App\DataTransferObjects\OrdersProductsDTO;
use Illuminate\Support\Facades\Cache;
use DB;
/**
 * Class OrdersProductsServices.
 */
class OrdersProductsServices
{
    private $orderProductsRepository;

    public function __construct(
        OrderProductsRepository $orderProductsRepository
    ){
        $this->orderProductsRepository = $orderProductsRepository;
    }

    public function get(){

        if (!Cache::has('orderProducts')) {
            $products = $this->orderProductsRepository->get();
            Cache::put('orderProducts', $products, 600); // 10 Minutes
        } else {
            $products = Cache::get('orderProducts');
        }
        return $products;
    }
    
    public function getById($id){
        return $this->orderProductsRepository->getByProductId((int)$id);
    }

    public function save(OrdersProductsDTO $dto){
        DB::beginTransaction();
        try{
            $this->orderProductsRepository->create($dto->toArray());
            $this->forgetCache();
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }

    public function updateById($id, OrdersProductsDTO $dto){
        DB::beginTransaction();
        try{
            $this->orderProductsRepository->updateById($id, $dto->toArray());
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
            $this->orderProductsRepository->deleteById($id);
            $this->forgetCache();
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }

    public function forgetCache(){
        Cache::forget('orderProducts');
    }
}
