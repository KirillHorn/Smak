<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date=Carbon::now();
        DB::table('categories')->insert([
            ['title'=>'Бургеры','created_at'=>$date,'updated_at'=>$date],
            ['title'=>'Суп','created_at'=>$date,'updated_at'=>$date],
            ['title'=>'Суши и Роллы','created_at'=>$date,'updated_at'=>$date],
            ['title'=>'Пицца','created_at'=>$date,'updated_at'=>$date],
            ['title'=>'Блинны','created_at'=>$date,'updated_at'=>$date],
        ]);
    }
}
