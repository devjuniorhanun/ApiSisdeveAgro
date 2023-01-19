<?php

namespace App\Models\Api\Cadastros;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\Traits\Uuid;
use Spatie\Activitylog\LogOptions;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use SoftDeletes;
    use LogsActivity;
    use Uuid;
    
    // Define o nome da tabela
    protected $table = 'users';

    // Chave Primaria
    protected $primaryKey = 'id';

    // Define o campo deleted_at, ultilizado para exclusão com modo de segurança
    protected $dates = ['deleted_at'];

    //Define os campos da entidade
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Gravação do Log
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Usuários')
            ->logOnly(['name', 'email'])
            ->logOnlyDirty();
    }
}
