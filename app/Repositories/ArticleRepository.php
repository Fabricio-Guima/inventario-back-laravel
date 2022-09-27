<?php

namespace App\Repositories;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleRepository
{
  protected $entity;

  public function __construct(Article $model)
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

  public function show(Article $article)
  {
    return $this->entity->where([
      [
        'status', 1
      ],
      [
        'id', '=', $article->id
      ]
    ])->first();
  }

  public function update(Article $article, array $data)
  {
    $article->fill($data);
    $article->save();
    return $article;
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
