<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasemeter extends Model
{
    use HasFactory;
    protected $fillable = [
        'priode'
        
    ];
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}
