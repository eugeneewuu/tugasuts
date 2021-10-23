<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $table ='game';
    protected $fillable =['nama_game','platform_game','tahun_rilis','nama_kategori'];
}
