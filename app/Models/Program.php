<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'university_id',
        'program_name',
        'criteria'
    ];

    // Inverse Relationship
    public function university()
    {
        return $this->belongsTo(University::class);
    }
}