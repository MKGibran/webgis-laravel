<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Polygons extends Model
{
    use HasUuids;
    use HasFactory;
    protected $table = 'polygons';
    protected $fillable = ['geojson'];
}
