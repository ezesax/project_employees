<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'lastname',
        'birthday',
        'roll_on_date',
        'project_id'
    ];

    public function project ()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
