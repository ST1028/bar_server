<?php

namespace App\Services;

use App\Models\Friend;
use App\Repositories\FriendRepository;
use Illuminate\Support\Collection;

class FriendService
{
    /** @var FriendRepository */
    protected FriendRepository $repository;

    /**
     * @param FriendRepository $repository
     */
    public function __construct(FriendRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    /**
     * @param int $id
     * @return Friend|null
     */
    public function getById(int $id): ?Friend
    {
        return $this->repository->getById($id);
    }

    /**
     * @param array $data
     * @return Friend
     */
    public function create(array $data): Friend
    {
        return $this->repository->create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Friend
     */
    public function update(int $id, array $data): Friend
    {
        return $this->repository->update($id, $data);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
