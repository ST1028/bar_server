<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FriendStoreRequest;
use App\Http\Resources\FriendResource;
use App\Services\FriendService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

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
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $friends = $request->user()->friends;
        return FriendResource::collection($friends);
    }

    /**
     * @param FriendStoreRequest $request
     * @return FriendResource
     * @throws \Throwable
     */
    public function store(FriendStoreRequest $request): FriendResource
    {
        \DB::beginTransaction();
        try {
            $friend = $this->service->create([
                'user_id'   => $request->user()->id,
                'name'      => $request->input('name'),
                'is_active' => true
            ]);
            \DB::commit();
            return new FriendResource($friend);
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }
    }
}
