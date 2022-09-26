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

  public function index()
  {
    return $this->repository->index();
  }


  public function store(array $data)
  {
    return $this->repository->store($data);
  }

  public function show(Brand $brand)
  {
    return $this->repository->show($brand);
  }

  public function getUserAuth(): User
  {
    return auth()->user();
  }
}
