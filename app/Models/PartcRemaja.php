<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartcRemaja extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'email',
        'alamat',
        'notel',
        'hamilke',
        'hpht',
        'hpl',
        'hb',
        'desa_id'
    ];

    use HasFactory;
    protected $dates = ['hpht', 'hpl'];

    public function desa()
    {
        return $this->belongsTo('App\Models\Desa', 'desa_id');
    }
}
