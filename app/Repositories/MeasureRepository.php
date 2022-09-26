<?php

namespace App\Repositories;

use App\Models\Measure;
use Illuminate\Http\Request;

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

  public function update(Measure $measure, array $data)
  {
    $measure->fill($data);
    $measure->save();
    return $measure;
  }

  public function search(String $filter)
  {
    $result = $this->entity->where(function ($query) use ($filter) {
      if ($filter) {
        $query->orWhere('name', 'LIKE', "%${filter}%")->orWhere('code', 'LIKE', "%${filter}%");
      }
    })->latest()
      ->paginate();

    return $result;
  }
}
