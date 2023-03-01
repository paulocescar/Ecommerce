<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'pedido_id'     => $this->pedido_id,
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
