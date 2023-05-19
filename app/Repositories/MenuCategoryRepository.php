<?php

namespace App\Repositories;

use App\Models\Menu;
use App\Models\MenuCategory;
use Illuminate\Support\Collection;

class MenuCategoryRepository
{
    /** @var MenuCategory */
    protected MenuCategory $model;

    /**
     * @param MenuCategory $model
     */
    public function __construct(MenuCategory $model)
    {
        $this->model = $model;
    }

    /**
     * @return Collection|MenuCategory[]
     */
    public function getAll(): Collection
    {
        return $this->model->all();
    }

    /**
     * @return Collection|MenuCategory[]
     */
    public function getActiveAll(): Collection
    {
        return $this->model->with('menus')->where('is_active', 1)->get();
    }

    /**
     * @param int $id
     * @return MenuCategory|null
     */
    public function getById(int $id): ?MenuCategory
    {
        return $this->model->find($id);
    }

    /**
     * @param array $attributes
     * @return MenuCategory
     */
    public function create(array $attributes): MenuCategory
    {
        return $this->model->create($attributes);
    }

    /**
     * @param int $id
     * @param array $attributes
     * @return MenuCategory
     */
    public function update(int $id, array $attributes): MenuCategory
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
