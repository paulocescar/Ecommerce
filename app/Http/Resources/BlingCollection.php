<?php

    namespace App\Http\Resources;
    
    use Illuminate\Http\Resources\Json\ResourceCollection;

    Class BlingCollection extends ResourceCollection
    {
        /**
         * Transfor request in to array
         */
        public function toArray($request)
        {
            return parent::toArray($request);
        }
    }
