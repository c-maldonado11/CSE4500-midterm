<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['service','software','content','hardware_id'];

    protected $table = 'notes';
    
    public function hardware()
    {
        return $this->belongsTo(Hardware::class);
    }
    
}