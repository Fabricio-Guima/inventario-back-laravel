<?php

namespace App\Services;

use App\Models\Article;
use App\Models\User;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;

class ArticleService
{
  protected $repository;

  public function __construct(ArticleRepository $articleRepository)
  {
    $this->repository = $articleRepository;
  }

  public function index()
  {
    return $this->repository->index();
  }

  public function store(array $data)
  {
    return $this->repository->store($data);
  }

  public function show(Article $article)
  {
    return $this->repository->show($article);
  }

  public function update(Article $article, array $data)
  {

    return $this->repository->update($article, $data);
  }

  public function getUserAuth(): User
  {
    return auth()->user();
  }

  public function search(String $filter)
  {
    return $this->repository->search($filter);
  }
}
