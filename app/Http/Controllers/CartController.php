<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Cart;
use App\Http\Resources\CartsCollection;
use App\Services\CartsServices;
use App\Http\Requests\CartRequest;
use App\DataTransferObjects\CartsDTO;
use App\Http\Resources\CartsResource;

class CartController extends Controller
{
    private $cartsServices;
    
    public function __construct(CartsServices $cartsServices)
    {
        $this->cartsServices = $cartsServices;
    }

    public function get(){
        $carts = $this->cartsServices->get();
        return response()->json(new CartsCollection($carts->all()));
    }

    public function store(CartRequest $request){
        $dto = new CartsDTO($request->all());
        try{
            return $this->cartsServices->save($dto);
        }catch(Exception $e){
            return $e->message();
        }
    }

    public function getByUserId(){
        $carts = $this->cartsServices->getByUserId();
        return response()->json(new CartsCollection($carts));
    }

    public function updateByUserId()
    {
        try{
            return $this->cartsServices->updateByUserId();
        }catch(Exception $e){
            return $e->message();
        }
    }
    
}
