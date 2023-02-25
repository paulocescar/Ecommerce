<?php

    namespace App\Http\Resources;

    use Illuminate\Http\Resources\Json\JsonResource;
    use App\Http\Resources\UsersResource;
    use App\Http\Resources\ProductsCollection;
    use App\Http\Resources\CuponResource;

    Class CartsResource extends JsonResource
    {
        /**
         * Transfor json response in to array
         */
        public function toArray($request): array
        {
            return [
                'id'            => $this->id,
                'user_id'       => $this->user_id,
                'produto_id'    => $this->produto_id,
                'cupon_id'      => $this->cupon_id,
                'preco'         => $this->preco,
                'quantidade'    => $this->quantidade,
                'usuario'       => $this->usuario,
                'produto'       => new ProductsCollection($this->produto),
                'cupon'         => new CuponResource($this->cupon_id)
            ];
        }
    }
