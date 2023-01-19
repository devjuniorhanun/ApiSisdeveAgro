<?php

namespace App\Http\Controllers\Api\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cadastros\SafraStoreRequest;
use App\Http\Requests\Api\Cadastros\SafraUpdateRequest;
use App\Http\Resources\Api\Cadastros\SafraCollection;
use App\Http\Resources\Api\Cadastros\SafraResource;
use App\Models\Api\Cadastros\Safra;
use Illuminate\Http\Request;

class SafraController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\Api\Cadastros\SafraCollection
     */
    public function index(Request $request)
    {
        $safras = Safra::all();

        return new SafraCollection($safras);
    }

    /**
     * @param \App\Http\Requests\Api\Cadastros\SafraStoreRequest $request
     * @return \App\Http\Resources\Api\Cadastros\SafraResource
     */
    public function store(SafraStoreRequest $request)
    {
        $safra = Safra::create($request->validated());

        return new SafraResource($safra);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Api\Cadastros\Safra $safra
     * @return \App\Http\Resources\Api\Cadastros\SafraResource
     */
    public function show(Request $request, Safra $safra)
    {
        return new SafraResource($safra);
    }

    /**
     * @param \App\Http\Requests\Api\Cadastros\SafraUpdateRequest $request
     * @param \App\Models\Api\Cadastros\Safra $safra
     * @return \App\Http\Resources\Api\Cadastros\SafraResource
     */
    public function update(SafraUpdateRequest $request, Safra $safra)
    {
        $safra->update($request->validated());

        return new SafraResource($safra);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Api\Cadastros\Safra $safra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Safra $safra)
    {
        $safra->delete();

        return response()->noContent();
    }
}
