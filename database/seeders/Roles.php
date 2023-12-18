<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

    use Illuminate\Support\Facades\DB;


class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date=Carbon::now();
       DB::table('roles')->insert([
        ['title'=>'Клиент', 'created_at'=>$date,'updated_at'=>$date],
        ['title'=>'Модератор', 'created_at'=>$date,'updated_at'=>$date],
       ]);
    }
}
