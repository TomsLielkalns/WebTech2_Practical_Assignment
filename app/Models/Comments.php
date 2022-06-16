<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User_data;
use App\Models\Flowers;

class Comments extends Model
{
    use HasFactory;
    protected $fillable = ['users_id', 'flowers_id', 'comment'];
    public function userdata()
    {
        return $this->belongsTo(User_data::class);
    }
    public function flowers()
    {
        return $this->belongsTo(Flowers::class);
    }
}
