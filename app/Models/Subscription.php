<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['user_id' , 'plan_id' , 'trial_start_date' , 'trial_end_date'];

    public $timestamps = false;

}
