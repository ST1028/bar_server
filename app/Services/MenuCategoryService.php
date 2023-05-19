<?php

namespace App\Services;

use App\Models\MenuCategory;
use App\Repositories\MenuCategoryRepository;
use Illuminate\Support\Collection;

class MenuCategoryService
{
    /** @var MenuCategoryRepository */
    protected MenuCategoryRepository $repository;

    /**
     * @param MenuCategoryRepository $repository
     */
    public function __construct(MenuCategoryRepository $repository)
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

    public function getActiveAll(): Collection
    {
        return $this->repository->getActiveAll();
    }

    /**
     * @param int $id
     * @return MenuCategory|null
     */
    public function getById(int $id): ?MenuCategory
    {
        return $this->repository->getById($id);
    }

    /**
     * @param array $data
     * @return MenuCategory
     */
    public function create(array $data): MenuCategory
    {
        return $this->repository->create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return MenuCategory
     */
    public function update(int $id, array $data): MenuCategory
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
