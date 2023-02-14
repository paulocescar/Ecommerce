<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryProductsResources;
use App\Http\Resources\CategoryProductsCollection;
use App\DataTransferObjects\CategoriesProductsDTO;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CategoriesProductsRequest;
use App\Services\CategoriesProductsServices;
use App\Models\Categories_products;

class CategoryProductsController extends Controller
{
    private $categoriesProductsServices;

    public function __construct(
        CategoriesProductsServices $categoriesProductsServices
    ){
        $this->categoriesProductsServices = $categoriesProductsServices;
    }

    public function get($pages = 0): JsonResponse
    {
        $categories = $this->categoriesProductsServices->get($pages);
        return response()->json(new CategoryProductsCollection($categories->all()));
    }

    public function getById($id): JsonResponse
    {
        $category = $this->categoriesProductsServices->getById($id);
        return response()->json(new CategoryProductsResources($category));
    }
    
    public function store(CategoriesProductsRequest $request)
    {
        $dto = new CategoriesProductsDTO($request->all());
        try{
            return $this->categoriesProductsServices->save($dto);
        }catch(Exception $e){
            return $e->message();
        }
    }

    public function updateById($id, CategoriesProductsRequest $request)
    {
        $dto = new CategoriesProductsDTO($request->all());
        try{
            return $this->categoriesProductsServices->updateById($id, $dto);
        }catch(Exception $e){
            return $e->message();
        }
    }
    
    public function deleteById($id)
    {
        try{
            return $this->categoriesProductsServices->deleteById($id);
        }catch(Exception $e){
            return $e->message();
        }
    }

    public function semPai(){
        $cat = Categories_products::semPai()->get()->first();
        return $cat->formatted_created;
    }
}
