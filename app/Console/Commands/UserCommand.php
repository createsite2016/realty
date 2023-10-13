<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Support\Facades\Hash;
use Leeto\PackageCommand\Command;
use MoonShine\MoonShineAuth;

class UserCommand extends Command
{
    protected $signature = 'admin:user {--username=} {--name=} {--password=}';

    protected $description = 'Create user';

    public function handle(): void
    {
        $username = $this->option('username') ?: $this->ask(
            'Username(' . config(
                'moonshine.auth.fields.username',
                'email'
            ) . ')'
        );
        $name = $this->option('name') ?: $this->ask('Name');
        $password = $this->option('password') ?: $this->secret('Password');

        if ($username && $name && $password) {
            MoonShineAuth::model()->query()->create([
                config('moonshine.auth.fields.username', 'email') => $username,
                config('moonshine.auth.fields.name', 'name') => $name,
                config(
                    'moonshine.auth.fields.password',
                    'password'
                ) => Hash::make($password),
                'role_id' => 1,
            ]);

            $this->components->info('User is created');
        } else {
            $this->components->error('All params is required');
        }
    }
}
