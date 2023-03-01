<?php

    namespace App\Http\Resources;

    use Illuminate\Http\Resources\Json\JsonResource;
    use App\Http\Resources\UsersResource;

    Class OrderResources extends JsonResource
    {
        /**
         * Transfor json response in to array
         */
        public function toArray($request): array
        {
            return [
                'id'                    => $this->id,
                'user_id'               => $this->user_id,
                'address_id'            => $this->address_id,
                'payment_type'          => $this->payment_type,
                'user'                  => new UsersResource($this->user_id)
            ];
        }
    }
