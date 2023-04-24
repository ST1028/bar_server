<?php

namespace App\Services;

use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Support\Collection;

class OrderService
{
    /** @var OrderRepository */
    protected OrderRepository $repository;

    /**
     * @param OrderRepository $repository
     */
    public function __construct(OrderRepository $repository)
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
     * @return Order|null
     */
    public function getById(int $id): ?Order
    {
        return $this->repository->getById($id);
    }

    /**
     * @param array $data
     * @return Order
     */
    public function create(array $data): Order
    {
        return $this->repository->create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Order
     */
    public function update(int $id, array $data): Order
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
