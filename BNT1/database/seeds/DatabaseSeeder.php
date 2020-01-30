<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(Admin::class);
        DB::table("users")->insert(
          [
            'name' => 'admin001',
            'email' => 'admin001@bnt.com',
            'password' => password_hash('bnt2020', PASSWORD_DEFAULT),
            'isAdmin' => true
          ]);
    }
}
