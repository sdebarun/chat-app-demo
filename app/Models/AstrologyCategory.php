<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AstrologyCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'type','is_active'];

    public function consultants(){
        return $this->belongsToMany(User::class,'astrology_categories_users');
    }
}
