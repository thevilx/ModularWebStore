<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'period' , 'description' , 'price'];

    public $timestamps = false;


    public function payments()
    {
        return $this->morphToMany(Payment::class, "paymentable");
    }
}
