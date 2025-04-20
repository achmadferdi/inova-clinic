<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitAction extends Model
{
    use HasFactory;

    protected $fillable = [
        'visit_id',
        'medical_action_id',
        'price',
    ];

    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }

    public function medicalAction()
    {
        return $this->belongsTo(MedicalAction::class);
    }
}
