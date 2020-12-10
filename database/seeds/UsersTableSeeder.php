<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    User::create ([
      'name' => 'Alan Wilian de Sousa',
      'username' => 'Alan Sousa',
      'password' => bcrypt('14789635sousa'),
      ]);
    }
  }
