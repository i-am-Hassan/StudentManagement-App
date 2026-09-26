<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'syllabus', 'duration'];
    use HasFactory;

    /**
     * Get the batches for this course.
     */
    public function batches(): HasMany
    {
        return $this->hasMany(Batch::class);
    }
}
