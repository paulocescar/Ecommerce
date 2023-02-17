<?php

    namespace App\Http\Resources;

    use Illuminate\Http\Resources\Json\JsonResource;
    use App\Http\Resources\AddressesResource;

    Class CuponResource extends JsonResource
    {
        /**
         * Transfor json response in to array
         */
        public function toArray($request): array
        {
            return [
                'id'        => $this->id,
                'cupon'     => $this->cupon,
                'desconto'  => $this->desconto,
                'tipo_id'   => $this->tipo_id
            ];
        }
    }
