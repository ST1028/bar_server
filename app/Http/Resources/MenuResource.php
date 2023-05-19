<?php

namespace App\Http\Resources;

use App\Models\Menu;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class MenuResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        /** @var Menu $menu */
        $menu = $this->resource;

        return [
            'id'               => $menu->id,
            'name'             => $menu->name,
            'menu_category_id' => $menu->menu_category_id,
            'description'      => $menu->description,
            'thumbnail'        => $menu->thumbnail,
            'price'            => $menu->price,
            'blends'           => $menu->blends,
            'created_at'       => $menu->created_at,
            'updated_at'       => $menu->updated_at,
        ];
    }
}
