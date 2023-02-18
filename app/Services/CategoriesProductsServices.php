<?php

namespace App\Services;
use App\Repositories\CategoryProductsRepository;
use App\DataTransferObjects\CategoriesProductsDTO;
use Illuminate\Support\Facades\Cache;
use DB;
/**
 * Class CategoriesProductsServices.
 */
class CategoriesProductsServices
{
    private $categoryProductsRepository;

    public function __construct(
        CategoryProductsRepository $categoryProductsRepository
    ){
        $this->categoryProductsRepository = $categoryProductsRepository;
    }

    public function get($pages = 0){
        $this->forgetCache();
        if (!Cache::has('categoriesProducts')) {
            if($pages){
                $categories = $this->categoryProductsRepository->with(['categoriaPai'])->orderBy('id', 'DESC')->paginate($pages);
            }else{
                $categories = $this->categoryProductsRepository->with(['categoriaPai'])->orderBy('id', 'DESC')->get();
            }
            Cache::put('categoriesProducts', $categories, 600); // 10 Minutes
        } else {
            $categories = Cache::get('categoriesProducts');
        }
        return $categories;
    }
    
    public function getById($id){
        return $this->categoryProductsRepository->getByCatogoryId((int)$id);
    }

    public function save(CategoriesProductsDTO $dto){
        DB::beginTransaction();
        try{
            $this->categoryProductsRepository->create($dto->toArray());
            $this->forgetCache();
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }

    public function updateById($id,CategoriesProductsDTO $dto){
        DB::beginTransaction();
        try{
            $this->categoryProductsRepository->updateById($id, $dto->toArray());
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
            $this->categoryProductsRepository->deleteById($id);
            $this->forgetCache();
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }

    public function forgetCache(){
        Cache::forget('categoriesProducts');
    }
}
