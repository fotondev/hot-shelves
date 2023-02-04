<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Book;
use App\Models\Page;
use App\Models\Role;
use App\Models\User;
use App\Models\Shelf;
use App\Models\Permission;
use Illuminate\Support\Str;
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

        //Create permissions
        Permission::create(['name' => 'create content']);
        Permission::create(['name' => 'edit content']);
        Permission::create(['name' => 'delete content']);
        Permission::create(['name' => 'give permissions']);


        //Create roles
        $writer = Role::create(['name' => 'writer']);
        $writer->attachPermission('create content');

        $editor = Role::create(['name' => 'editor']);
        $editor->attachPermission('edit content');
        $editor->attachPermission('delete content');

        $viewer = Role::create(['name' => 'viewer']);


        //Admin can everithing
        $adminRole = Role::create(['name' => 'Admin']);
        $admin =  User::create([
            'name' => 'Admin',
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $admin->roles()->attach($adminRole);

        //Create users and attach roles
        $user = User::factory()->create();
        $user2 = User::factory()->create();
        $user3 = User::factory()->create();


        $user->roles()->attach($writer);
        $user2->roles()->attach($editor);
        $user3->roles()->attach($viewer);

      
        $createdByAdminRole = ['createdBy' => $admin->id];
        $createdByUser = ['createdBy' => $user->id];

        //Create Shelves
        Shelf::factory()->create(array_merge($createdByAdminRole, ['name' => 'Shelf-' . Str::random(3)]));
        Shelf::factory()->create(array_merge($createdByUser, ['name' => 'Shelf-' . Str::random(3)]));
        Shelf::factory()->create(array_merge($createdByUser, ['name' => 'Shelf-' . Str::random(3)]));

        //Create Books
        $books = Book::factory(6)->create();

        //Create Pages
        foreach ($books as $book) {
            Page::factory(10)->create([
                'book_id' => $book->id,
            ]);
        }
    }
}
