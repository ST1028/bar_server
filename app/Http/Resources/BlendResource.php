<?php

namespace App\Http\Resources;

use App\Models\Blend;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class BlendResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        /** @var Blend $blend */
        $blend = $this->resource;

        return [
            'id'         => $blend->id,
            'name'       => $blend->name,
            'created_at' => $blend->created_at,
            'updated_at' => $blend->updated_at,
        ];
    }
}
