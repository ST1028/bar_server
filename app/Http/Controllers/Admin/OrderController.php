<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrderDeleteRequest;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    /** @var OrderService */
    protected OrderService $service;

    /**
     * @param OrderService $service
     */
    public function __construct(
        OrderService $service
    ) {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $orders = $this->service->getNotPay();
        return view('admin.order.index', compact('orders'));
    }

    /**
     * @param OrderDeleteRequest $request
     * @param $id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function delete(OrderDeleteRequest $request, $id): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $this->service->delete($id);
        return \redirect(route('order.index'))->with(['success' => true, 'message' => '削除しました']);
    }
}
