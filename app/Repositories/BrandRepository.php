<?php

namespace App\Repositories;

use App\Models\Brand;


class BrandRepository
{
  protected $entity;

  public function __construct(Brand $model)
  {
    $this->entity = $model;
  }

  public function store(array $data)
  {
    $result = $this->entity->create($data);

    return $result;
  }
}
