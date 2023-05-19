<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuCategoryResource;
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
}
