<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Первый способ добавления в таблицу
        DB::insert('INSERT INTO `articles` (`name`, `description`, `text`, `img`) VALUES (?,?,?,?)', 
        	['1blog1', 
        	'description of 1blog1', 
        	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi laudantium, sapiente quos molestias aut ut eos repudiandae modi eum voluptatibus consectetur ducimus atque quidem asperiores ipsa nisi quae explicabo officia.', 
        	'pic1.png']);
        // Второй способ добавления в таблицу
        DB::table('articles')->insert(
        	[
        		['name' => '2blog2', 'description' => 'description of blog', 'text' => 'text blog2', 'img' => 'pic2.png']
        	]
        	);
        // Третий способ добавления в таблицу
        Article::create(['name' => '3blog3', 'description' => 'description of blog', 'text' => 'text blog3', 'img' =>'pic3.png']);
    }
}
