<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use HasFactory;
    
    //softdeletes
    use SoftDeletes;

    //fillable
    protected $fillable = ['name', 'description'];

    public function projects() {
        return $this->hasMany(Project::class);
    }
}
