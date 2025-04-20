<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'employee_id',
        'visit_date',
        'visit_type',
        'notes',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function actions()
    {
        return $this->hasMany(VisitAction::class);
    }

    public function medicines()
    {
        return $this->hasMany(VisitMedicine::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
