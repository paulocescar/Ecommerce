<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Bling;
use DB;

/**
 * Class BlingRepository.
 */
class BlingRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Bling::class;
    }

    public function getByUser()
    {
        $user =  auth('sanctum')->user();
        $settings = DB::table('settings_bling AS sb')->where('user_id', $user->id)->get()->first();

        return $settings;
    }
}
