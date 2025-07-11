<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'province',
        'district',
    ];

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}
