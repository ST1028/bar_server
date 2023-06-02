<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MenuDeleteRequest;
use App\Http\Requests\Admin\MenuShowRequest;
use App\Http\Requests\Admin\MenuStoreRequest;
use App\Http\Requests\Admin\MenuUpdateRequest;
use App\Http\Resources\MenuResource;
use App\Http\Resources\ResultResource;
use App\Models\MenuCategory;
use App\Services\MenuCategoryService;
use App\Services\MenuService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuController extends Controller
{
    /** @var MenuService */
    protected MenuService $service;

    /** @var MenuCategoryService */
    protected MenuCategoryService $menuCategoryService;

    /**
     * @param MenuService $service
     * @param MenuCategoryService $menuCategoryService
     */
    public function __construct(MenuService $service, MenuCategoryService $menuCategoryService)
    {
        $this->service = $service;
        $this->menuCategoryService = $menuCategoryService;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $menus = $this->service->getAll();
        return view('admin.menu.index', compact('menus'));
    }

    /**
     * @param MenuShowRequest $request
     * @param int $id
     * @return View
     */
    public function show(MenuShowRequest $request, int $id): View
    {
        $menu = $this->service->getById($id);
        $menuCategories = $this->menuCategoryService->getAll();
        return view('admin.menu.show', compact('menu', 'menuCategories'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $menuCategories = $this->menuCategoryService->getAll();
        return view('admin.menu.show', compact('menuCategories'));
    }

    /**
     * @param MenuStoreRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(MenuStoreRequest $request): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
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
        return \redirect(route('menu.show', ['id' => $menu->id]));
    }

    /**
     * @param MenuUpdateRequest $request
     * @param $id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(MenuUpdateRequest $request, $id): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
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
        return \redirect(route('menu.show', ['id' => $menu->id]));
    }

    /**
     * @param MenuDeleteRequest $request
     * @param $id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function delete(MenuDeleteRequest $request, $id): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $this->service->delete($id);
        return \redirect(route('menu.index'));
    }
}
