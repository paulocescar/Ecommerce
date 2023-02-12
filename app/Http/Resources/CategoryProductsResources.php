<?php

    namespace App\Http\Resources;

    use Illuminate\Http\Resources\Json\JsonResource;

    Class CategoryProductsResources extends JsonResource
    {
        /**
         * Transfor json response in to array
         */
        public function toArray($request): array
        {
            return [
                'id'                => $this->id,
                'descricao'         => $this->descricao,
                'idCategoriaPai'    => $this->idCategoriaPai,
            ];
        }
    }
