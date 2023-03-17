<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Dots extends Model
{
    use HasUuids;
    use HasFactory;
    protected $table = 'dots';
    protected $fillable = ['place', 'longitude', 'latitude'];
}
