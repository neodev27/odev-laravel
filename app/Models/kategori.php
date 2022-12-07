<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    
    public $timestamps = 'false';
    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $fillable = ['urunturu'];
    public function urun()
    {
        return $this->hasOne('App\Models\urun');
    }
}