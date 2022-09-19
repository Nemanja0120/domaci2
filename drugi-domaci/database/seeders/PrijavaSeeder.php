<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Termin;
use Illuminate\Database\Seeder;

class PrijavaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 40; $i++) {
            $id = rand(1, 10);
            $user_id = rand(1, 10);
            $termin = Termin::where('id', $id)->get()[0];
            $max = $termin->max_broj_prijava;
            $trenutno = $termin->broj_prijava;

            if ($trenutno < $max) {
                DB::table('prijava')->insert([
                    'naziv' => Str::random(5) . "_NAZIV PRIJAVE",
                    'user_id' =>  $user_id,
                    'termin_id' => $id,
                ]);
                Termin::find($id)->increment('broj_prijava');
            }
        }
    }
}
