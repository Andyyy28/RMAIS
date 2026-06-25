<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = collect([
            ['slug' => 'farmer', 'name' => 'Farmer'],
            ['slug' => 'rice_trader', 'name' => 'Rice Trader / Buyer'],
            ['slug' => 'consumer', 'name' => 'Consumer'],
            ['slug' => 'admin', 'name' => 'Admin'],
            ['slug' => 'super_admin', 'name' => 'Super Admin'],
        ])->mapWithKeys(fn (array $role) => [
            $role['slug'] => Role::updateOrCreate(
                ['slug' => $role['slug']],
                ['name' => $role['name']],
            ),
        ]);

        collect([
            ['name' => 'Demo Farmer', 'email' => 'farmer@rmais.test', 'role' => 'farmer'],
            ['name' => 'Demo Rice Trader', 'email' => 'trader@rmais.test', 'role' => 'rice_trader'],
            ['name' => 'Demo Consumer', 'email' => 'consumer@rmais.test', 'role' => 'consumer'],
            ['name' => 'Demo Admin', 'email' => 'admin@rmais.test', 'role' => 'admin'],
            ['name' => 'Demo Super Admin', 'email' => 'superadmin@rmais.test', 'role' => 'super_admin'],
        ])->each(fn (array $account) => User::updateOrCreate(
            ['email' => $account['email']],
            [
                'name' => $account['name'],
                'password' => 'password',
                'role_id' => $roles[$account['role']]->id,
            ],
        ));
    }
}
