<?php

namespace App\Services;

use App\Models\Category;
use App\Models\User;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryService
{
  protected $repository;

  public function __construct(CategoryRepository $categoryRepository)
  {
    $this->repository = $categoryRepository;
  }

  public function index()
  {
    return $this->repository->index();
  }

  public function store(array $data)
  {
    return $this->repository->store($data);
  }

  public function show(Category $category)
  {
    return $this->repository->show($category);
  }

  public function update(Category $category, array $data)
  {

    return $this->repository->update($category, $data);
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
