<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nim',
        'first_name',
        'last_name',
        'gender',
        'selected_courses',
        'status',
    ];

    protected $table = 'students';
    public $timestamps = false;

    protected $primaryKey = null;

    public $incrementing = false;
}
