<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    protected $fillable = ['model','manufacturer','category','note'];
    protected $table = 'hardware';
    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    use HasFactory;
}