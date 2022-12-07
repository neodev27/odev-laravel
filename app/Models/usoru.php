<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usoru extends Model
{
    protected $table = 'usoru';
    protected $guarded = ['id'];
    protected $id = 'tkid';
    protected $fillable = ['soru', 'dosya'];
    public $timestamps = false;
}
