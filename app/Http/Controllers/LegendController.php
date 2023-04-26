<?php

namespace App\Http\Controllers;

use App\Http\Requests\Legend\FilterRequest;
use App\Http\Requests\Legend\StoreRequest;
use App\Http\Requests\Legend\UpdateRequest;
use App\Http\Resources\LegendResource;
use App\Models\Legend;
use App\Services\LegendService;

class LegendController extends Controller
{

    public $service;

    function __construct(LegendService $service)
    {
        $this->service = $service;
    }

    public function index(FilterRequest $request)
    {
        $data = $request->validated();
        $legends = $this->service->index($data);
        return LegendResource::collection($legends);
    }


    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $legend = $this->service->store($data);
        return new LegendResource($legend);
    }


    public function show(Legend $legend)
    {
        return new LegendResource($legend);
    }


    public function update(UpdateRequest $request, Legend $legend)
    {

    }


    public function destroy(Legend $legend)
    {
        return $legend->delete();
    }
}
