<?php

namespace App\Http\Controllers\Api\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cadastros\AnoAgriculaStoreRequest;
use App\Http\Requests\Api\Cadastros\AnoAgriculaUpdateRequest;
use App\Http\Resources\Api\Cadastros\AnoAgriculaCollection;
use App\Http\Resources\Api\Cadastros\AnoAgriculaResource;
use App\Models\Api\Cadastros\AnoAgricula;
use Illuminate\Http\Request;

class AnoAgriculaController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\Api\Cadastros\AnoAgriculaCollection
     */
    public function index(Request $request)
    {
        $anoAgriculas = AnoAgricula::all();

        return AnoAgriculaResource::collection($anoAgriculas);
    }

    /**
     * @param \App\Http\Requests\Api\Cadastros\AnoAgriculaStoreRequest $request
     * @return \App\Http\Resources\Api\Cadastros\AnoAgriculaResource
     */
    public function store(AnoAgriculaStoreRequest $request)
    {
        $anoAgricula = AnoAgricula::create($request->validated());

        return new AnoAgriculaResource($anoAgricula);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Api\Cadastros\AnoAgricula $anoAgricula
     * @return \App\Http\Resources\Api\Cadastros\AnoAgriculaResource
     */
    public function show(Request $request, AnoAgricula $anoAgricula)
    {
        return new AnoAgriculaResource($anoAgricula);
    }

    /**
     * @param \App\Http\Requests\Api\Cadastros\AnoAgriculaUpdateRequest $request
     * @param \App\Models\Api\Cadastros\AnoAgricula $anoAgricula
     * @return \App\Http\Resources\Api\Cadastros\AnoAgriculaResource
     */
    public function update(AnoAgriculaUpdateRequest $request, AnoAgricula $anoAgricula)
    {
        $anoAgricula->update($request->validated());

        return new AnoAgriculaResource($anoAgricula);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Api\Cadastros\AnoAgricula $anoAgricula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, AnoAgricula $anoAgricula)
    {
        $anoAgricula->delete();

        return response()->noContent();
    }
}
