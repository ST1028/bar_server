<?php

namespace App\Http\Resources;

use App\Models\Menu;
use App\Models\MenuCategory;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class MenuCategoryResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        /** @var MenuCategory $menuCategory */
        $menuCategory = $this->resource;

        return [
            'id'         => $menuCategory->id,
            'name'       => $menuCategory->name,
            'menus'      => MenuResource::collection($menuCategory->menus->filter(fn(Menu $menu) => $menu->is_active)),
            'thumbnail'  => $menuCategory->thumbnail,
            'created_at' => $menuCategory->created_at,
            'updated_at' => $menuCategory->updated_at,
        ];
    }
}
