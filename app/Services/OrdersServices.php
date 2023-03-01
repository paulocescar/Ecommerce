<?php

namespace App\Services;
use App\Repositories\OrderRepository;
use App\Repositories\OrderProductsRepository;
use App\DataTransferObjects\OrdersDTO;
use Illuminate\Support\Facades\Cache;
use DB;
/**
 * Class OrdersServices.
 */
class OrdersServices
{   
    private $orderRepository;
    private $orderProductsRepository;

    public function __construct(
        OrderRepository $orderRepository,
        OrderProductsRepository $orderProductsRepository
    ){
        $this->orderRepository = $orderRepository;
        $this->orderProductsRepository = $orderProductsRepository;
    }

    public function get(){
        if (!Cache::has('orders')) {
            $orders = $this->orderRepository->with(['pedidosProdutos','pedidosProdutos.produtos','pedidosProdutos.produtos.images'])->get();
            Cache::put('orders', $orders, 600); // 10 Minutes
        } else {
            $orders = Cache::get('orders');
        }
        return $orders;
    }
    
    public function getById($id){
        return $this->orderRepository->with(['pedidosProdutos','pedidosProdutos.produtos','pedidosProdutos.produtos.images'])->where('id',$id)->get();
    }

    public function save(OrdersDTO $dto, $pedidosProdutos){
        DB::beginTransaction();
        try{
            $produto = $this->orderRepository->create($dto->toArray());
            $id = $produto->id;
            $pedidosProdutos['id'] = $id;
            $this->orderProductsRepository->createAll($pedidosProdutos);
            $this->forgetCache();
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }

    public function updateById($id, OrdersDTO $dto){
        DB::beginTransaction();
        try{
            $this->orderRepository->updateById($id, $dto->toArray());
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
            $this->orderRepository->deleteById($id);
            $this->forgetCache();
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }

    public function forgetCache(){
        Cache::forget('orders');
    }
}
