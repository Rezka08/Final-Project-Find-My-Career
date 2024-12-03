<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['nama','email','no_hp','umur','jenis_kelamin','deskripsi','id_user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
