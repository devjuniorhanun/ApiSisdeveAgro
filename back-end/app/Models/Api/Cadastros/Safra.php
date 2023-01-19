<?php

namespace App\Models\Api\Cadastros;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Safra extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'empresa_id',
        'ano_agricula_id',
        'uuid',
        'nome',
        'inicio_safra',
        'final_safra',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'empresa_id' => 'integer',
        'ano_agricula_id' => 'integer',
        'inicio_safra' => 'date',
        'final_safra' => 'date',
        'status' => 'boolean',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function anoAgricula()
    {
        return $this->belongsTo(AnoAgricula::class);
    }
}
