<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Flowers;
use App\Models\Submissions;

class Specifics extends Model
{
    use HasFactory;
    protected $fillable = ['species', 'color', 'bloom_season', 'lenght_mm', 'other'];
    public function flowers()
    {
        return $this->hasMany(Flowers::class);
    }
    public function submissions_specifics()
    {
        return $this->hasMany(Submissions::class);
    }
}
