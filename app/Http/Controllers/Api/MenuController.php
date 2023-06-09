<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuCategoryResource;
use App\Http\Resources\MenuResource;
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
        $menus = $this->service->getActiveAll();
        return MenuResource::collection($menus);
    }
}
