<?php

namespace Tests\Feature\Http\Controllers\Api\Cadastros;

use App\Models\AnoAgricula;
use App\Models\Empresa;
use App\Models\Safra;
use App\Models\Uuid;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\Cadastros\SafraController
 */
class SafraControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $safras = Safra::factory()->count(3)->create();

        $response = $this->get(route('safra.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\Cadastros\SafraController::class,
            'store',
            \App\Http\Requests\Api\Cadastros\SafraStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $empresa = Empresa::factory()->create();
        $ano_agricula = AnoAgricula::factory()->create();
        $uuid = Uuid::factory()->create();
        $nome = $this->faker->word;
        $status = $this->faker->boolean;

        $response = $this->post(route('safra.store'), [
            'empresa_id' => $empresa->id,
            'ano_agricula_id' => $ano_agricula->id,
            'uuid' => $uuid->id,
            'nome' => $nome,
            'status' => $status,
        ]);

        $safras = Safra::query()
            ->where('empresa_id', $empresa->id)
            ->where('ano_agricula_id', $ano_agricula->id)
            ->where('uuid', $uuid->id)
            ->where('nome', $nome)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $safras);
        $safra = $safras->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $safra = Safra::factory()->create();

        $response = $this->get(route('safra.show', $safra));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\Cadastros\SafraController::class,
            'update',
            \App\Http\Requests\Api\Cadastros\SafraUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $safra = Safra::factory()->create();
        $empresa = Empresa::factory()->create();
        $ano_agricula = AnoAgricula::factory()->create();
        $uuid = Uuid::factory()->create();
        $nome = $this->faker->word;
        $status = $this->faker->boolean;

        $response = $this->put(route('safra.update', $safra), [
            'empresa_id' => $empresa->id,
            'ano_agricula_id' => $ano_agricula->id,
            'uuid' => $uuid->id,
            'nome' => $nome,
            'status' => $status,
        ]);

        $safra->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($empresa->id, $safra->empresa_id);
        $this->assertEquals($ano_agricula->id, $safra->ano_agricula_id);
        $this->assertEquals($uuid->id, $safra->uuid);
        $this->assertEquals($nome, $safra->nome);
        $this->assertEquals($status, $safra->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $safra = Safra::factory()->create();

        $response = $this->delete(route('safra.destroy', $safra));

        $response->assertNoContent();

        $this->assertSoftDeleted($safra);
    }
}
