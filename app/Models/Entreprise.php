<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'users_id'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
