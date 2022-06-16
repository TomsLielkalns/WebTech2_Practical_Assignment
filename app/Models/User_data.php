<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Comments;
use App\Models\Submissions;

class User_data extends Model
{
    public $table = 'userdata';
    use HasFactory;
    protected $fillable = ['username', 'email'];
    public function comments_users()
    {
        return $this->hasMany(Comments::class);
    }
    public function submissions_users()
    {
        return $this->hasMany(Submissions::class);
    }
}
