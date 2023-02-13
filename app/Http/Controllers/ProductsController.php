<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductsResources;
use App\Http\Resources\ProductsCollection;
use App\DataTransferObjects\ProductsDTO;
use App\DataTransferObjects\ImagemDTO;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ProductsRequest;
use App\Services\ProductsServices;


class ProductsController extends Controller
{
    private $productsServices;

    public function __construct(
        ProductsServices $productsServices
    ){
        $this->productsServices = $productsServices;
    }

    public function get(): JsonResponse
    {
        $products = $this->productsServices->get();
        return response()->json(new ProductsCollection($products->all()));
    }

    public function getById($id): JsonResponse
    {
        $products = $this->productsServices->getById($id);
        return response()->json(new ProductsCollection($products));
    }

    public function getByCategory($id): JsonResponse
    {
        $products = $this->productsServices->getByCategory($id);
        return response()->json(new ProductsCollection($products));
    }
    
    public function store(ProductsRequest $request)
    {
        $images = $request->input('images');
        $dto = new ProductsDTO($request->all());
        try{
            return $this->productsServices->save($dto, $images);
        }catch(Exception $e){
            return $e->message();
        }
    }

    public function updateById($id, ProductsRequest $request)
    {
        $dto = new ProductsDTO($request->all());
        try{
            return $this->productsServices->updateById($id, $dto);
        }catch(Exception $e){
            return $e->message();
        }
    }
    
    public function deleteById($id)
    {
        try{
            return $this->productsServices->deleteById($id);
        }catch(Exception $e){
            return $e->message();
        }
    }
}
