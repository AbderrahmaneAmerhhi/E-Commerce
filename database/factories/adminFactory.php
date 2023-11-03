<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class adminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "name" => "admin",
            "email" => "admin@gmail.com",
            'email_verified_at' => now(),
            "password" => Hash::make("admin"),
            'remember_token' => Str::random(10),

        ];
    }
}
