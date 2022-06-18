<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountResetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::updateOrCreate([
            'email' => config('app.account.email'),
        ], [
            'name' => config('app.account.name'),
            'email' => config('app.account.email'),
            'password' => bcrypt(config('app.account.password')),
            'email_verified_at' => now()
        ]);
    }
}
