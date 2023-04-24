<?php

namespace App\Services;

use App\Models\Menu;
use App\Repositories\MenuRepository;
use Illuminate\Support\Collection;

class MenuService
{
    /** @var MenuRepository */
    protected MenuRepository $repository;

    /**
     * @param MenuRepository $repository
     */
    public function __construct(MenuRepository $repository)
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
     * @return Menu|null
     */
    public function getById(int $id): ?Menu
    {
        return $this->repository->getById($id);
    }

    /**
     * @param array $data
     * @return Menu
     */
    public function create(array $data): Menu
    {
        return $this->repository->create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Menu
     */
    public function update(int $id, array $data): Menu
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
