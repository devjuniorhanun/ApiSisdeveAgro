<?php

namespace App\Models\Api\Cadastros;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\Traits\Uuid;
use Spatie\Activitylog\LogOptions;

class Empresa extends Model
{
    use HasFactory, SoftDeletes;

    use LogsActivity;
    use Uuid;

    // Define o nome da tabela
    protected $table = 'empresas';

    // Chave Primaria
    protected $primaryKey = 'id';

    // Define o campo deleted_at, ultilizado para exclusão com modo de segurança
    protected $dates = ['deleted_at'];

    //Define os campos da entidade
    protected $fillable = [
        'uuid',
        'nome',
        'cnpj',
        'inscricao',
        'url',
        'email',
        'telefone',
        'logo',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    // Gravação do Log
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Empresas')
            ->logOnly([
                'uuid',
                'nome',
                'cnpj',
                'inscricao',
                'url',
                'email',
                'telefone',
                'logo',
                'status',
            ])
            ->logOnlyDirty();
    }
}
