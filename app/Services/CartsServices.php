<?php

namespace App\Services;
use App\Repositories\CartRepository;
use App\DataTransferObjects\CartsDTO;
use App\Http\Resources\CartsResource;
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

    public function updateByUserId(){
        DB::beginTransaction();
        try{

            $dto = $this->getByUserId();

            // $this->cartRepository->updateById($dto->id, $dto);
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
