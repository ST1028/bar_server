<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ResultResource;
use App\Models\Blend;
use App\Services\LineNotifyService;
use App\Services\MenuService;
use Illuminate\Http\Request;
use App\Services\OrderService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderController extends Controller
{
    /** @var OrderService */
    protected OrderService $service;

    /** @var MenuService */
    protected MenuService $menuService;

    /** @var LineNotifyService */
    protected LineNotifyService $lineNotifyService;

    /**
     * @param OrderService $service
     * @param MenuService $menuService
     * @param LineNotifyService $lineNotifyService
     */
    public function __construct(OrderService $service, MenuService $menuService, LineNotifyService $lineNotifyService)
    {
        $this->service = $service;
        $this->menuService = $menuService;
        $this->lineNotifyService = $lineNotifyService;
    }

    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $orders = $this->service->getActiveAll();
        return OrderResource::collection($orders);
    }

    /**
     * @param OrderRequest $request
     * @return ResultResource
     * @throws \Throwable
     */
    public function store(OrderRequest $request): ResultResource
    {
        \DB::beginTransaction();
        try {
            $menuId = $request->input('menu_id');
            $blendId = $request->input('blend_id');
            $menu = $this->menuService->getById($menuId);
            $remarks = $request->input('remarks', '');
            $blend = $blendId != null ? $menu->blends()->where('blend_id', $blendId)->first(): null;
            $friends = $request->user()->friends()->whereIn('id', $request->input('friend_ids', []))->get();
            foreach ($request->input('friend_ids', []) as $friendId) {
                $this->service->create([
                    'friend_id' => $friendId,
                    'menu_id'   => $menuId,
                    'blend_id'  => $blendId,
                    'price'     => $menu->price,
                    'remarks'   => $remarks,
                    'is_pay'    => false
                ]);
            }
            $lineNoticeText = (string) view('api.line_notify',
                compact('friends', 'blend', 'menu', 'remarks')
            );
            $this->lineNotifyService->handle($lineNoticeText);
            \DB::commit();
            return new ResultResource((object)['result' => true]);
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }
    }
}
