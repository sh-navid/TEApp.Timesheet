<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class MakeAdminUserCommand extends Command
{
    protected $signature = 'make:admin-user';
    protected $description = 'Make admin user';

    public function handle()
    {
        User::create(["username" => "admin", "password" => Hash::make("@dm!n123")]);
    }
}
