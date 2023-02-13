<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Products_images;
use Hamcrest\Type\IsBoolean;
use DB;

/**
 * Class ProductsImagesRepositoy.
 */
class ProductsImagesRepositoy extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Products_images::class;
    }
    
    public function getByProductId($id): mixed
    {
        return Products_images::where('id',$id)->get();
    }

    public function createAll($images): mixed
    {
        DB::beginTransaction();
        try{
            foreach($images as $image){
                if(is_countable($image)){
                    $image['produto_id'] = $images['id'];
                    Products_images::create($image);
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

