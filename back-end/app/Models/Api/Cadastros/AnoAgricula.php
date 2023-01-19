<?php

namespace App\Models\Api\Cadastros;

use App\Models\Traits\EmpresaId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\Traits\Uuid;
use Spatie\Activitylog\LogOptions;

class AnoAgricula extends Model
{
    use HasFactory, SoftDeletes;    

    use LogsActivity;
    use Uuid;
    use EmpresaId;

    // Define o nome da tabela
    protected $table = 'ano_agriculas';

    // Chave Primaria
    protected $primaryKey = 'id';

    // Define o campo deleted_at, ultilizado para exclusão com modo de segurança
    protected $dates = ['deleted_at'];

    //Define os campos da entidade
    protected $fillable = [
        'empresa_id',
        'uuid',
        'nome',
        'data_abertura',
        'data_fechamento',
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

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    // Gravação do Log
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('AnoAGricula')
            ->logOnly([
                'empresa_id',
                'uuid',
                'nome',
                'data_abertura',
                'data_fechamento',
                'status',
            ])
            ->logOnlyDirty();
    }
}
