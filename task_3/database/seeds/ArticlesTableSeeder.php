<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $articles = [
            ['title'=>'Tips Cepat Nikah', 'content'=>'lorem ipsum','writer'=>'akse'],
            ['title'=>'Haruskah Menunda Nikah?', 'content'=>'lorem ipsum','writer'=>'akse'],
            ['title'=>'Membangun Visi Misi Keluarga', 'content'=>'lorem ipsum','writer'=>'akse']
            ];
            // masukkan data ke database
            DB::table('articles')->insert($articles);
    }
}
