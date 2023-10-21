<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\Confirmados;
use App\Models\Defunciones;
use App\Models\Negativos;
use App\Models\Sospechosos;

class Estado extends Model
{
    use HasFactory;
    protected $table = 'estados';
    protected $primaryKey = 'ID';
    public $incrementing = false;
    public $timesstamps = false;
    protected $attributes = ['poblacion', 'nombre', 'codigo'];

    public function confirmados():HasMany
    {
        return $this->hasMany(Confirmados::class);
    }

    public function defunciones():HasMany
    {
        return $this->hasMany(Defunciones::class);
    }

    public function negativos():HasMany
    {
        return $this->hasMany(Negativos::class);
    }

    public function sospechosos():HasMany
    {
        return $this->hasMany(Sospechosos::class);
    }
}
