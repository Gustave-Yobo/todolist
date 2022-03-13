<?php

namespace App\Models;

use App\Models\Tache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Statu extends Model
{
    use HasFactory;

    protected $fillable = ['nom',];

    public function taches()
    {
        return $this->hasMany(
            Tache::class, 'tache_id', 'id'
        );
        return $this->hasMany(Tache::class, 'tache_id', 'id');
    }
}
