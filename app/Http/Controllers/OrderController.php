<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResources;
use App\Http\Resources\OrderCollection;
use App\DataTransferObjects\OrdersDTO;
use App\DataTransferObjects\OrdersProductsDTO;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\OrderRequest;
use App\Services\OrdersServices;


class OrderController extends Controller
{
    private $ordersServices;

    public function __construct(
        OrdersServices $ordersServices
    ){
        $this->ordersServices = $ordersServices;
    }

    public function get(): JsonResponse
    {
        $orders = $this->ordersServices->get();
        return response()->json(new OrderCollection($orders->all()));
    }

    public function getById($id): JsonResponse
    {
        $orders = $this->ordersServices->getById($id);
        return response()->json(new OrderCollection($orders));
    }
    
    public function store(OrderRequest $request)
    {
        $pedidosProdutos = $request->input('pedidos_produtos');
        $dto = new OrdersDTO($request->all());
        try{
            return $this->ordersServices->save($dto, $pedidosProdutos);
        }catch(Exception $e){
            return $e->message();
        }
    }

    public function updateById($id, OrderRequest $request)
    {
        $dto = new OrdersDTO($request->all());
        try{
            return $this->ordersServices->updateById($id, $dto);
        }catch(Exception $e){
            return $e->message();
        }
    }
    
    public function deleteById($id)
    {
        try{
            return $this->ordersServices->deleteById($id);
        }catch(Exception $e){
            return $e->message();
        }
    }
}
