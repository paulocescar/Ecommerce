<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Products;

/**
 * Class ProductsRepository.
 */
class ProductsRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Products::class;
    }
    
    public function getByProductId($id): mixed
    {
        return Products::where('id',$id)->with(['categoria'])->get();
    }

    public function getByCategory($category_id)
    {
        return Products::where('categoria_id', $category_id)->with(['categoria'])->get();
    }
}
