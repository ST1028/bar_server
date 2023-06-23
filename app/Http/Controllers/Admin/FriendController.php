<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Services\FriendService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FriendController extends Controller
{
    /** @var FriendService */
    protected FriendService $service;

    /** @var OrderService */
    protected OrderService $orderService;

    /**
     * @param FriendService $service
     * @param OrderService $orderService
     */
    public function __construct(
        FriendService $service,
        OrderService $orderService
    ) {
        $this->service = $service;
        $this->orderService = $orderService;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $friends = $this->service->getActiveAll();
        return view('admin.friend.index', compact('friends'));
    }

    /**
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function batchUpdate(): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $friends = $this->service->getActiveAll();
        /** @var Friend $friend */
        foreach ($friends as $friend) {
            $friend->orders()->update(['is_pay' => true]);
        }
        $this->service->updateAllDisabled();
        return \redirect(route('friend.index'));
    }
}
