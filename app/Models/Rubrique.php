<?php

namespace App\Models;

use App\Models\Tache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rubrique extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'tache_id'];

    public function taches()
    {
        return $this->hasMany(Tache::class);
    }
}
