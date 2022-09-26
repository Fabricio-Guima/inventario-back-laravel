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

  public function index()
  {
    return $this->entity->where('status', 1)->get();
  }

  public function store(array $data)
  {
    $result = $this->entity->create($data);

    return $result;
  }

  public function show(Brand $brand)
  {
    return $this->entity->where([
      [
        'status', 1
      ],
      [
        'id', '=', $brand->id
      ]
    ])->first();
  }
}
