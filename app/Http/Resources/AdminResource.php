<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class AdminResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        /** @var User $user */
        $user = $this->resource;

        return [
            'id'         => $user->id,
            'name'       => $user->name,
            'friends'    => FriendResource::collection($user->friends),
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ];
    }
}
