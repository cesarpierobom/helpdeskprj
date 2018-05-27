<?php

use Illuminate\Database\Seeder;
use App\Models\Organizacao;
use App\Models\ChamadoFeedback;

class ChamadoFeedbackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ChamadoFeedback::class, 100)->make()->each(function($feedback) {
            $organizacao = Organizacao::inRandomOrder()->first();
            $feedback->organizacao_id = $organizacao->id;
            $feedback->save();
        });
    }
}
