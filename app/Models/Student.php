<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'phone', 'password', 'is_active'
    ];

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'group_student', 'group_id', 'student_id');
    }
}
