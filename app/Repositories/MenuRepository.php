<?php

namespace App\Repositories;

use App\Models\Menu;
use Illuminate\Support\Collection;

class MenuRepository
{
    /** @var Menu */
    protected Menu $model;

    /**
     * @param Menu $model
     */
    public function __construct(Menu $model)
    {
        $this->model = $model;
    }

    /**
     * @return Collection|Menu[]
     */
    public function getAll(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param int $id
     * @return Menu|null
     */
    public function getById(int $id): ?Menu
    {
        return $this->model->find($id);
    }

    /**
     * @param array $attributes
     * @return Menu
     */
    public function create(array $attributes): Menu
    {
        return $this->model->create($attributes);
    }

    /**
     * @param int $id
     * @param array $attributes
     * @return Menu
     */
    public function update(int $id, array $attributes): Menu
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
