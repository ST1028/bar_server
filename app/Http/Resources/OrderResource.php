<?php

namespace App\Http\Resources;

use App\Models\Order;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class OrderResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        /** @var Order $order */
        $order = $this->resource;

        return [
            'id'         => $order->id,
            'menu'       => new MenuResource($order->menu),
            'price'      => $order->price,
            'menu_id'    => $order->menu_id,
            'blend_id'   => $order->blend_id,
            'friend'     => $order->friend,
            'friend_id'  => $order->friend_id,
            'created_at' => $order->created_at,
            'updated_at' => $order->updated_at,
        ];
    }
}
