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
use Carbon\Factory;
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
            'username' => 'Admin1',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $user = User::factory()->create();

        /** 
         * Dumming content  
         */
        $createdByAdmin = ['createdBy' => $admin->id];
        $createdByUser = ['createdBy' => $user->id];
        
        //Create Shelves
        Shelf::factory()->create(array_merge($createdByAdmin, ['name' => 'Shelf-' . Str::random(3)]));
        Shelf::factory()->create(array_merge($createdByUser, ['name' => 'Shelf-' . Str::random(3)]));
        Shelf::factory()->create(array_merge($createdByUser, ['name' => 'Shelf-' . Str::random(3)]));

        //Created Books
        $books = Book::factory(6)->create();

        //Created Pages
        foreach ($books as $book) {
            Page::factory()->create([
               'book_id' => $book->id,
               'name' => 'Page-' . Str::random(10)
            ]);
        }  
    }
}
