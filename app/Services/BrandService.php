<?php

namespace App\Services;

use App\Models\Brand;
use App\Models\User;
use App\Repositories\BrandRepository;

class BrandService
{
  protected $repository;

  public function __construct(BrandRepository $brandRepository)
  {
    $this->repository = $brandRepository;
  }

  public function store(array $data)
  {
    $this->repository->store($data);
  }

  public function getUserAuth(): User
  {
    return auth()->user();
  }
}
