<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Specifics;
use App\Models\Comments;

class Flowers extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'specifics_id '];
    public function specifics()
    {
        return $this->belongsTo(Specifics::class);
    }
    public function comments_flowers()
    {
        return $this->hasMany(Comments::class);
    }
}
