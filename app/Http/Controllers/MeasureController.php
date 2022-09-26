<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeasureRequest;
use App\Http\Resources\MeasureResource;
use App\Models\Measure;
use App\Services\MeasureService;
use Illuminate\Http\Request;

class MeasureController extends Controller
{
    public function __construct(MeasureService $measureService)
    {
        $this->service = $measureService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MeasureResource::collection($this->service->index());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeasureRequest $request)
    {
        return new MeasureResource($this->service->store($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Measure  $measure
     * @return \Illuminate\Http\Response
     */
    public function show(Measure $measure)
    {
        return new MeasureResource($this->service->show($measure));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Measure  $measure
     * @return \Illuminate\Http\Response
     */
    public function update(Measure $measure, MeasureRequest $request)
    {
        return new MeasureResource($this->service->update($measure, $request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Measure  $measure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Measure $measure)
    {
        return $measure->delete();
    }

    public function search(Request $request)
    {
        $filter = $request->filter ?? '';

        return $this->service->search($filter);
    }
}
