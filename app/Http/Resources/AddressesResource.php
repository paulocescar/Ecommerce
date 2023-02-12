<?php

    namespace App\Http\Resources;

    use Illuminate\Http\Resources\Json\JsonResource;

    Class AddressesResource extends JsonResource
    {
        /**
         * Transfor json response in to array
         */
        public function toArray($request): array
        {
            return [
                'id'        => $this->id,
                'zipcode'   => $this->zipcode,
                'city'      => $this->city,
                'street'    => $this->street,  
                'district'  => $this->district,
                'state'     => $this->state,  
                'country'   => $this->country
            ];
        }
    }
