<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Edit User Details
     *
     * @param  Request $request
     * @return Response
     */
    public function updateProfile(Request $request){
        $validated = $request->validate([
            'age' => "numeric",
            'address' => 'string',
            'phone' => 'regex:/(09)[0-9]{9}/|digits:11|numeric',
            'email' => 'email',
        ]);

        User::where('id' , auth()->user()->id)->update($validated);

        return ['massage' => "اطلاعات با موفقیت ثبت شدند"];
    }
}
