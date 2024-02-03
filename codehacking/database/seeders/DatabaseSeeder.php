<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::table('posts')->truncate();
 
        User::factory(10)->create()->each(function ($user) {
            $user->posts()->save(Post::factory()->make());
        });
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        //Post::factory(10)->create();
       //factory(App\Models\User::class, 10)->create();
       
        //->each(function($user){
        //$user->post()->save(factory(App\Models\Post::class))->make();
        //});

        //$this->call(UsersTableSeeder::class);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'example User',
        //     'email' => 'user@example.com',
        // ]);
    }
}
