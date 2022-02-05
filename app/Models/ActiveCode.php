<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveCode extends Model
{
    use HasFactory;

    // protected $table = 'active_codes';

    protected $fillable = ['phone' , 'code' , 'expired_at'];

    public $timestamps = false;

    public function scopeGenerateCode($query, $phone)
    {

        if ($code = $this->getAliveCodeForPhone($phone)) {
            $code = $code->code;
        }

        else {

            do {
                $code = mt_rand(100000, 999999);
            } while ($this->checkIfCodeIsUnique($phone, $code));

            $this->create([
                'phone' => $phone,
                'code' => $code,
                'expired_at' => now()->addMinutes(5),
            ]);
        }

        return $code;
    }


    protected function scopeVerifyCode($query, $code, $phone)
    {
        return !!$this->where('phone', $phone)->whereCode($code)->where('expired_at', '>', now())->first();
    }

    // *********************************************************************************
    // Relations ***********************************************************************
    // *********************************************************************************

    // check if a code is expired or not
    private function getAliveCodeForPhone($phone)
    {
        return $this->where('phone' , $phone)->where('expired_at', '>', now())->first();
    }

    // check if a code is unique
    private function checkIfCodeIsUnique($phone, $code)
    {
        return !!$this->where('phone', $phone)->whereCode($code)->first();
    }
}
