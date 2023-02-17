<?php

namespace App\Services;
use App\Repositories\CartRepository;
use App\DataTransferObjects\CartsDTO;
use Illuminate\Support\Facades\Cache;
use DB;
/**
 * Class CartsServices.
 */
class CartsServices
{
    private $cartRepository;

    public function __construct(
        CartRepository $cartRepository
    ){
        $this->cartRepository = $cartRepository;
    }

    public function get(){
        if (!Cache::has('carrinhos')) {
            $carts = $this->cartRepository->with(['produtos','usuario','cupon'])->get();
            Cache::put('carrinhos', $carts, 600); // 10 Minutes
        } else {
            $carts = Cache::get('carrinhos');
        }
        return $carts;
    }
    
    public function getByUserId(){
        return $this->cartRepository->with(['produtos','usuario','cupon'])->where('user_id',auth()->user()->id)->get();
    }

    public function save(CartsDTO $dto){
        DB::beginTransaction();
        try{
            $cart = $this->cartRepository->where('user_id',auth()->user()->id)->get();
            if(is_countable($cart) && count($cart) == 0){
                $this->cartRepository->create($dto->toArray());
                $this->forgetCache();
                DB::commit();
            }
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }

    public function updateById($id,CartsDTO $dto){
        DB::beginTransaction();
        try{
            $this->cartRepository->updateById($id, $dto->toArray());
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
            $this->cartRepository->deleteById($id);
            $this->forgetCache();
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }

    public function forgetCache(){
        Cache::forget('carrinhos');
    }
}
