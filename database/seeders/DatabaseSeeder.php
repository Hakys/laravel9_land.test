<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /*
        $user = new App\Models\User();
        $user->setName('Daniel');
        $user->setEmail('daniel@danielgara.com');
        $user->setPassword(bcrypt('passwordVerySecret'));
        $user->setBalance(5000);
        $user->setRole('admin');
        $user->save();
        exit
        */

        User::Create([
			"name" => "Hakys",
			"email" => "hakyss@gmail.com",
			"password" => bcrypt("password"),
			"role" => "admin",
            'balance' => 5000,
		]);
        $this->call(ContactoSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ReunionSeeder::class);
    }
}
