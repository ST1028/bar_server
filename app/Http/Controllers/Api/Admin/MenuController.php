<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MenuDeleteRequest;
use App\Http\Requests\Admin\MenuShowRequest;
use App\Http\Requests\Admin\MenuStoreRequest;
use App\Http\Requests\Admin\MenuUpdateRequest;
use App\Http\Resources\MenuCategoryResource;
use App\Http\Resources\MenuResource;
use App\Http\Resources\ResultResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Services\MenuService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MenuController extends Controller
{
    /** @var MenuService */
    protected MenuService $service;

    /**
     * @param MenuService $service
     */
    public function __construct(MenuService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $menus = $this->service->getAll();
        return MenuResource::collection($menus);
    }

    /**
     * @param MenuShowRequest $request
     * @param $id
     * @return MenuResource
     */
    public function show(MenuShowRequest $request, $id): MenuResource
    {
        $menu = $this->service->getById($id);
        return new MenuResource($menu);
    }

    /**
     * @param MenuStoreRequest $request
     * @return MenuResource
     */
    public function store(MenuStoreRequest $request): MenuResource
    {
        $menu = $this->service->create([
            'name' => $request->get('name'),
            'menu_category_id' => $request->get('menu_category_id'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'recipe' => $request->get('recipe'),
            'is_active' => $request->get('is_active'),
            'is_remarks_required' => $request->get('is_remarks_required')
        ]);
        return new MenuResource($menu);
    }

    /**
     * @param MenuUpdateRequest $request
     * @param $id
     * @return MenuResource
     */
    public function update(MenuUpdateRequest $request, $id): MenuResource
    {
        $menu = $this->service->update($id, [
            'name' => $request->get('name'),
            'menu_category_id' => $request->get('menu_category_id'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'recipe' => $request->get('recipe'),
            'is_active' => $request->get('is_active'),
            'is_remarks_required' => $request->get('is_remarks_required')
        ]);
        return new MenuResource($menu);
    }

    /**
     * @param MenuDeleteRequest $request
     * @param $id
     * @return ResultResource
     */
    public function delete(MenuDeleteRequest $request, $id): ResultResource
    {
        $this->service->delete($id);
        return new ResultResource((object) ['result' => true]);
    }
}
