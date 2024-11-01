<?php

// app/Models/Menu.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category', 'price', 'availability'];

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }
}
