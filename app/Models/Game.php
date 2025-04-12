<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'created_by'];

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function versions()
    {
        return $this->hasMany(GameVersion::class);
    }
}
