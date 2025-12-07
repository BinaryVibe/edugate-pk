<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'name',
        'city',
        'website_url',
        'logo_path',
        'description',
        'last_updated'
    ];

    // Relationship: A University has many Deadlines
    public function deadlines()
    {
        return $this->hasMany(AdmissionDeadline::class);
    }

    // Relationship: A University has many Programs
    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}