<?php

namespace App\Http\Resources;

use App\Models\Friend;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class FriendResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        /** @var Friend $friend */
        $friend = $this->resource;

        return [
            'id'         => $friend->id,
            'name'       => $friend->name,
            'orders'     => OrderResource::collection($friend->orders),
            'created_at' => $friend->created_at,
            'updated_at' => $friend->updated_at,
        ];
    }
}
