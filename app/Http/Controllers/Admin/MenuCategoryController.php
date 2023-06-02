<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MenuCategoryDeleteRequest;
use App\Http\Requests\Admin\MenuCategoryShowRequest;
use App\Http\Requests\Admin\MenuCategoryStoreRequest;
use App\Http\Requests\Admin\MenuCategoryUpdateRequest;
use App\Http\Resources\MenuCategoryResource;
use App\Http\Resources\ResultResource;
use App\Services\MenuCategoryService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MenuCategoryController extends Controller
{
    /** @var MenuCategoryService */
    protected MenuCategoryService $service;

    /**
     * @param MenuCategoryService $service
     */
    public function __construct(MenuCategoryService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $menuCategories = $this->service->getActiveAll();
        return MenuCategoryResource::collection($menuCategories);
    }

    /**
     * @param MenuCategoryShowRequest $request
     * @param $id
     * @return MenuCategoryResource
     */
    public function show(MenuCategoryShowRequest $request, $id): MenuCategoryResource
    {
        $menu = $this->service->getById($id);
        return new MenuCategoryResource($menu);
    }

    /**
     * @param MenuCategoryStoreRequest $request
     * @return MenuCategoryResource
     */
    public function store(MenuCategoryStoreRequest $request): MenuCategoryResource
    {
        $menu = $this->service->create([
            'name'                   => $request->get('name'),
            'order'                  => $request->get('order'),
            'is_active'              => $request->get('is_active'),
            'thumbnail'              => '',
            'default_menu_thumbnail' => ''
        ]);
        return new MenuCategoryResource($menu);
    }

    /**
     * @param MenuCategoryUpdateRequest $request
     * @param $id
     * @return MenuCategoryResource
     */
    public function update(MenuCategoryUpdateRequest $request, $id): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $menu = $this->service->update($id, [
            'name'                   => $request->get('name'),
            'order'                  => $request->get('order'),
            'is_active'              => $request->get('is_active'),
            'thumbnail'              => '',
            'default_menu_thumbnail' => ''
        ]);
        return \redirect(route('menu.show', ['id' => $id]));
    }

    /**
     * @param MenuCategoryDeleteRequest $request
     * @param $id
     * @return ResultResource
     */
    public function delete(MenuCategoryDeleteRequest $request, $id): ResultResource
    {
        $this->service->delete($id);
        return new ResultResource((object)['result' => true]);
    }
}
