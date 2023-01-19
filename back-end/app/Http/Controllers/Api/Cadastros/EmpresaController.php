<?php

namespace App\Http\Controllers\Api\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cadastros\EmpresaRequest;
use App\Http\Resources\Api\Cadastros\EmpresaCollection;
use App\Http\Resources\Api\Cadastros\EmpresaResource;
use App\Models\Api\Cadastros\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\Api\Cadastros\EmpresaCollection
     */
    public function index(Request $request)
    {
        $empresas = Empresa::all();

        return new EmpresaCollection($empresas);
    }

    /**
     * @param \App\Http\Requests\Api\Cadastros\EmpresaStoreRequest $request
     * @return \App\Http\Resources\Api\Cadastros\EmpresaResource
     */
    public function store(EmpresaRequest $request)
    {
        //dd($request->all());
        $empresa = Empresa::create($request->validated());

        return new EmpresaResource($empresa);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Api\Cadastros\Empresa $empresa
     * @return \App\Http\Resources\Api\Cadastros\EmpresaResource
     */
    public function show(Request $request, Empresa $empresa)
    {
        return new EmpresaResource($empresa);
    }

    /**
     * @param \App\Http\Requests\Api\Cadastros\EmpresaRequest $request
     * @param \App\Models\Api\Cadastros\Empresa $empresa
     * @return \App\Http\Resources\Api\Cadastros\EmpresaResource
     */
    public function update(EmpresaRequest $request, Empresa $empresa)
    {
        $empresa->update($request->validated());

        return new EmpresaResource($empresa);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Api\Cadastros\Empresa $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Empresa $empresa)
    {
        $empresa->delete();

        return response()->noContent();
    }
}
