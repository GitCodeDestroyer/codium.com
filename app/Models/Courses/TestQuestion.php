<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class TestQuestion
 */
class TestQuestion extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    /**
     * @return HasMany
     */
    public function answers()
    {
        return $this->hasMany(TestAnswer::class, 'question_id');
    }

    /**
     * @return HasMany
     */
    public function correct_answer()
    {
        return $this->hasMany(TestCorrectAnswer::class, 'question_id');
    }
}
