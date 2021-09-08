<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User();
        $user->name = 'wagner';
        $user->last_name = 'leon ramos';
        $user-> dni="87654322";
        $user->celular="987654321";
        $user->email="wagner@gmail.com";
        $user->password=bcrypt("12345678");
        $user->save();
    }
}
