<?php

namespace App\Repositories;

use App\Models\Measure;

class MeasureRepository
{
  protected $entity;

  public function __construct(Measure $model)
  {
    $this->entity = $model;
  }

  public function index()
  {
    return $this->entity->where('status', 1)->get();
  }

  public function store(array $data)
  {
    return $this->entity->create($data);
  }

  public function show(Measure $measure)
  {
    return $this->entity->where([
      [
        'status', 1
      ],
      [
        'id', '=', $measure->id
      ]
    ])->first();
  }

  public function update(String $measure, array $data)
  {
    return $this->entity->where('id', $measure)->update($data);
  }
}
