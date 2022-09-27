<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryRepository
{
  protected $entity;

  public function __construct(Category $model)
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

  public function show(Category $category)
  {
    return $this->entity->where([
      [
        'status', 1
      ],
      [
        'id', '=', $category->id
      ]
    ])->first();
  }

  public function update(Category $category, array $data)
  {
    $category->fill($data);
    $category->save();
    return $category;
  }

  public function search(String $filter)
  {
    $result = $this->entity->where(function ($query) use ($filter) {
      if ($filter) {
        $query->Where('name', 'LIKE', "%${filter}%");
      }
    })->latest()
      ->paginate();

    return $result;
  }
}
