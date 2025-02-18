<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'detalle',
    ];

    public static function rules()
    {
        return [
            'nombre' => 'required|string',
            'detalle' => 'nullable|string',
        ];
    }
    
    public function rol_users() {
        return $this->hasMany(RolUser::class);
    }
}
