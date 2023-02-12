<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Clients;

/**
 * Class ClientsRepository.
 */
class ClientsRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Clients::class;
    }

    public function getWith(){
        return Clients::with(['address'])->get();
    }
}
