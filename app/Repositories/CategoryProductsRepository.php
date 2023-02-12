<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Categories_products;

/**
 * Class CategoryProductsRepository.
 */
class CategoryProductsRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Categories_products::class;
    }

    public function getByCatogoryId($id): mixed
    {
        return Categories_products::find($id);
    }
}
