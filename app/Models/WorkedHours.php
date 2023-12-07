<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkedHours extends Model
{
    use HasFactory;

    protected $table = 'worked_hours';

    protected $fillable = [
        'user_id',
        'date',
        'hours_worked'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
