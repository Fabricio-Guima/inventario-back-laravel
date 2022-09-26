<?php

namespace App\Services;

use App\Models\Measure;
use App\Models\User;
use App\Repositories\MeasureRepository;

class MeasureService
{
  protected $repository;

  public function __construct(MeasureRepository $MeasureRepository)
  {
    $this->repository = $MeasureRepository;
  }

  public function index()
  {
    return $this->repository->index();
  }

  public function store(array $data)
  {
    return $this->repository->store($data);
  }

  public function show(Measure $measure)
  {
    return $this->repository->show($measure);
  }

  public function update(Measure $measure, array $data)
  {

    return $this->repository->update($measure, $data);
  }

  public function getUserAuth(): User
  {
    return auth()->user();
  }
}
