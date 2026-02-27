<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        if (!$user) {
            $user = User::factory()->create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
            ]);
        }

        $categories = [
            ['name' => 'Fiction', 'description' => 'Fiction books'],
            ['name' => 'Non-Fiction', 'description' => 'Non-fiction books'],
            ['name' => 'Science', 'description' => 'Science books'],
        ];

        foreach ($categories as $catData) {
            $category = Category::create($catData);

            Book::create([
                'seller_id' => $user->id,
                'category_id' => $category->id,
                'title' => $category->name . ' Book 1',
                'description' => 'Description for ' . $category->name . ' Book 1',
                'price' => 29.99,
            ]);

            Book::create([
                'seller_id' => $user->id,
                'category_id' => $category->id,
                'title' => $category->name . ' Book 2',
                'description' => 'Description for ' . $category->name . ' Book 2',
                'price' => 39.99,
            ]);
        }
    }
}
