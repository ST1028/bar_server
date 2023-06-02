<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FriendService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FriendController extends Controller
{
    /** @var FriendService */
    protected FriendService $service;

    /**
     * @param FriendService $service
     */
    public function __construct(FriendService $service)
    {
        $this->service = $service;
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
        $this->service->updateAllDisabled();
        return \redirect(route('friend.index'));
    }
}
