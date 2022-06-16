<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User_data;
use App\Models\Specifics;

class Submissions extends Model
{
    use HasFactory;
    public function userdata()
    {
        return $this->belongsTo(User_data::class);
    }
    public function specifics()
    {
        return $this->belongsTo(Specifics::class);
    }
}
