<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jalan extends Model
{
    use HasFactory;
    function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    function kondisi()
    {
        return $this->hasMany(KondisiJalan::class);
    }
    function struktur()
    {
        return $this->hasMany(StrukturJalan::class);
    }
    function foto()
    {
        return $this->hasMany(FotoJalan::class);
    }
    function koordinat()
    {
        return $this->hasMany(KoordinatJalan::class);
    }
}
