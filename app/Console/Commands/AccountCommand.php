<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AccountCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'account';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change user account password';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $email = $this->ask('What is your email?');
        $password = $this->secret('Enter your password?');

        if (auth()->attempt(["email" => $email, "password" => $password])) {
            $this->info("Please enter new password");
            $new_password = $this->secret('new password:');
            $confirm_password = $this->secret('confirm password:');

            if ($new_password !== $confirm_password) {
                $this->error("Passwords mismatched. try again later!");
                return;
            }

            User::where('email', $email)->first()->update([
                'password' => bcrypt($new_password)
            ]);

            $this->info("Congratulation! Your account password has changed successfully!");

            return;
        }

        $this->error(__('auth.failed'));
    }
}
