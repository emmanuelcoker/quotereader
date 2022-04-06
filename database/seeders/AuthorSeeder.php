<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author_list = [
           'Jeffery Bezoz',
           'Shakespeare',
           'Anjelina Jolie',
           'Albert Einstein',
           'Ben Franklin'
        ];

        foreach ($author_list as $author) {
         $slug = str_replace(' ', '', $author);
         $author = Author::create([
                'author_name' => $author,
            ]);
        }
    }
}
