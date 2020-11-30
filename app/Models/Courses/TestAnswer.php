<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class TestAnswer
 * @package App\Models\Courses
 */
class TestAnswer extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(TestQuestion::class);
    }
}
