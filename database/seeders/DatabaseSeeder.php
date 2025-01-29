<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Contact;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'first_name' => 'Esteban',
            'last_name' => 'Campos',
            'email' => 'admin@admin.com',
            'password' => 'secret',
            'owner' => true,
        ]);

        Organization::factory()->create([
            'name' => 'club 1',
            'description' => 'Description of Organization 1',
        ]);

    }
}
