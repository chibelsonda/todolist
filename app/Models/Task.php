<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'status',
    ];

    public function getStatusAttribute($value)
    {
        if (is_int($value)){
            return (bool)$value;
        }
        return $value;
    }
}
