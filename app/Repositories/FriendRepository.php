<?php

namespace App\Repositories;

use App\Models\Friend;
use Illuminate\Support\Collection;

class FriendRepository
{
    /** @var Friend */
    protected Friend $model;

    /**
     * @param Friend $model
     */
    public function __construct(Friend $model)
    {
        $this->model = $model;
    }

    /**
     * @return Collection|Friend[]
     */
    public function getAll(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param int $id
     * @return Friend|null
     */
    public function getById(int $id): ?Friend
    {
        return $this->model->find($id);
    }

    /**
     * @param array $attributes
     * @return Friend
     */
    public function create(array $attributes): Friend
    {
        return $this->model->create($attributes);
    }

    /**
     * @param int $id
     * @param array $attributes
     * @return Friend
     */
    public function update(int $id, array $attributes): Friend
    {
        $user = $this->getById($id);
        $user->update($attributes);
        return $user;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->getById($id)->delete();
    }
}
