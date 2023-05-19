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
            'id'                  => $menu->id,
            'name'                => $menu->name,
            'menu_category_id'    => $menu->menu_category_id,
            'description'         => $menu->description,
            'thumbnail'           => $menu->thumbnail == null ? $menu->menuCategory->thumbnail : $menu->thumbnail,
            'price'               => $menu->price,
            'blends'              => BlendResource::collection($menu->blends),
            'is_remarks_required' => $menu->is_remarks_required,
            'created_at'          => $menu->created_at,
            'updated_at'          => $menu->updated_at,
        ];
    }
}
