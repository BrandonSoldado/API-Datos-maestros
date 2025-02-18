<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'fecha_de_nacimiento',
        'telefono',
        'ci',
        'email',
        'direccion',
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

    public static function rules()
    {
        return [
            'nombre' => 'required|string',
            'fecha_de_nacimiento' => 'required|date',
            'telefono' => 'required|string',
            'ci' => 'required|string',
            'email' => 'required|email|unique:users',
            'direccion' => 'nullable|string',
            'password' => 'required|string',
        ];
    }

    public function juego_users() {
        return $this->hasMany(JuegoUser::class);
    }
    
    public function rol_users() {
        return $this->hasMany(RolUser::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }

    public function ganador_turnos()
    {
        return $this->hasMany(GanadorTurno::class);
    }

    public function ofertas()
    {
        return $this->hasMany(Oferta::class);
    }

    public function cuentas()
    {
        return $this->hasMany(Cuenta::class);
    }

    public function transferencias()
    {
        return $this->hasMany(Transferencia::class);
    }
}
