<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Pedidos_produtos;
use Hamcrest\Type\IsBoolean;
use DB;

/**
 * Class OrderProductsRepository.
 */
class OrderProductsRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Pedidos_produtos::class;
    }
    
    public function getByProductId($id): mixed
    {
        return Pedidos_produtos::where('id',$id)->with(['produtos','produtos.images'])->get();
    }

    public function createAll($pedidoProdutos): mixed
    {
        DB::beginTransaction();
        try{
            foreach($pedidoProdutos as $produto){
                if(is_countable($produto)){
                    $image['pedido_id'] = $pedidoProdutos['id'];
                    Pedidos_produtos::create($produto);
                }
            }
            DB::commit();
            return true;
        }catch(Exception $erro){
            DB::rollback();
            return false;
        }
    }
}

