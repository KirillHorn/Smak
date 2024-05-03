<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class categoriesCafe extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date=Carbon::now();
        DB::table('categories_cafe')->insert([
            ['title_categories'=>'Итальянская кухня','created_at'=>$date,'updated_at'=>$date],
            ['title_categories'=>'Французская кухня','created_at'=>$date,'updated_at'=>$date],
            ['title_categories'=>'ФастФуд','created_at'=>$date,'updated_at'=>$date],
            ['title_categories'=>'Японская кухня','created_at'=>$date,'updated_at'=>$date],
            ['title_categories'=>'Китайская кухня','created_at'=>$date,'updated_at'=>$date],
        ]);
    }
}
