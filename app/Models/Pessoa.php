<?php

namespace App\Models;

use App\Models\Contato;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pessoa extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
    ];

    public function contatos () {
        return $this->hasMany(Contato::class, 'pessoa_id');
    }
}
