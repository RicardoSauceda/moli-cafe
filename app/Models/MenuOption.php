<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuOption extends Model
{
    use HasFactory;

    protected $table = 'menu_options';

    protected $fillable = [
        'option_name',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
