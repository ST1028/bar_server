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
            'id'            => $menu->id,
            'name'          => $menu->name,
            'menu_category' => new MenuCategoryResource($menu->menu_category_id),
            'created_at'    => $menu->created_at,
            'updated_at'    => $menu->updated_at,
        ];
    }
}
