<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Car;
use App\Models\Book;
use App\Models\Page;
use App\Models\User;
use App\Models\Shelf;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Interfaces\SlugBuilderInterface;
use Closure;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Shelf::truncate();
        // Book::truncate();
        // Page::truncate();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $admin =  User::create([
            'name' => 'Admin',
            'slug' => 'adminx',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'is_admin' => 1
        ]);

        /** 
         * Dumming content  
         */

        $createdBy = ['user_id' => $admin->id];
        Shelf::factory()->create(array_merge($createdBy, ['name' => 'Shelf-' . Str::random(3)]));
   
        $firstBook = Book::factory()->create(array_merge($createdBy, ['name'=>'Book' . ($admin->id) ], ['shelf_id' => 1]));
        $secondBook = Book::factory()->create(array_merge($createdBy, ['name'=>'Book' . ($admin->id+1) ], ['shelf_id' => 1]));
        $thirdBook = Book::factory()->create(array_merge($createdBy, ['name'=>'Book' . ($admin->id+2) ], ['shelf_id' => 1]));
        $forthBook = Book::factory()->create(array_merge($createdBy, ['name'=>'Book' . ($admin->id+3) ], ['shelf_id' => 1]));

        Page::factory(30)->create(array_merge($createdBy, ['name' => 'Page-' . Str::random(10), 'book_id' =>$firstBook->id]));
        Page::factory(30)->create(array_merge($createdBy, ['name' => 'Page-' . Str::random(10), 'book_id' =>$secondBook->id]));
        Page::factory(30)->create(array_merge($createdBy, ['name' => 'Page-' . Str::random(10), 'book_id' =>$thirdBook->id]));
        Page::factory(30)->create(array_merge($createdBy, ['name' => 'Page-' . Str::random(10), 'book_id' =>$forthBook->id]));

       
    }
}
