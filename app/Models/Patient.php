<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birth_date',
        'gender',
        'address',
        'region_id',
        'phone',
        'email',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
