<?php

namespace App\Services;
use App\Repositories\ProductsImagesRepositoy;
use App\DataTransferObjects\ProductsDTO;
use Illuminate\Support\Facades\Cache;
use DB;
/**
 * Class ProductsRepository.
 */
class ProductsImagesServices
{
    private $ProductsImagesRepositpy;

    public function __construct(
        ProductsImagesRepositoy $ProductsImagesRepositpy
    ){
        $this->ProductsImagesRepositpy = $ProductsImagesRepositpy;
    }

    public function get(){

        if (!Cache::has('productsImages')) {
            $products = $this->ProductsImagesRepositpy->get();
            Cache::put('productsImages', $products, 600); // 10 Minutes
        } else {
            $products = Cache::get('productsImages');
        }
        return $products;
    }
    
    public function getById($id){
        return $this->ProductsImagesRepositpy->getByProductId((int)$id);
    }

    public function save(ProductsDTO $dto){
        DB::beginTransaction();
        try{
            $this->ProductsImagesRepositpy->create($dto->toArray());
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
            $this->ProductsImagesRepositpy->updateById($id, $dto->toArray());
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
            $this->ProductsImagesRepositpy->deleteById($id);
            $this->forgetCache();
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }

    public function forgetCache(){
        Cache::forget('productsImages');
    }
}
