<?php

namespace App\Models;

use App\Models\User;
use App\Models\Statu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tache extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'detail', 'users_id', 'status_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statu()
    {
        return $this->belongsTo(Statu::class);
    }
}
