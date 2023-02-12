<?php

namespace App\Services;
use App\Repositories\ProductsRepository;
use App\DataTransferObjects\ProductsDTO;
use Illuminate\Support\Facades\Cache;
use DB;
/**
 * Class ProductsRepository.
 */
class ProductsServices
{
    private $productsRepository;

    public function __construct(
        ProductsRepository $productsRepository
    ){
        $this->productsRepository = $productsRepository;
    }

    public function get(){

        if (!Cache::has('products')) {
            $products = $this->productsRepository->get();
            Cache::put('products', $products, 600); // 10 Minutes
        } else {
            $products = Cache::get('products');
        }
        return $products;
    }
    
    public function getById($id){
        return $this->productsRepository->getByProductId((int)$id);
    }

    public function getByCategory($category_id){
        return $this->productsRepository->getByCategory((int)$category_id);
    }

    public function save(ProductsDTO $dto){
        DB::beginTransaction();
        try{
            $this->productsRepository->create($dto->toArray());
            $this->forgetCache();
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }

    public function updateById($id,ProductsDTO $dto){
        DB::beginTransaction();
        try{
            $this->productsRepository->updateById($id, $dto->toArray());
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
            $this->productsRepository->deleteById($id);
            $this->forgetCache();
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }

    public function forgetCache(){
        Cache::forget('products');
    }
}
