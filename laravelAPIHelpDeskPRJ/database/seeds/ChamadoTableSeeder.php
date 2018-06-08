<?php

use Illuminate\Database\Seeder;
use App\Models\ChamadoCategoria;
use App\Models\chamadoFeedback;
use App\Models\ChamadoPrioridade;
use App\Models\ChamadoSituacao;
use App\Models\ChamadoUrgencia;
use App\Models\Departamento;
use App\Models\Organizacao;
use App\Models\Servico;
use App\Models\Chamado;
use App\User;

class ChamadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Chamado::class, 100)->make()->each(function ($chamado) {
            $organizacaoAutora = Organizacao::inRandomOrder()->first();
            $organizacaoServico = Organizacao::inRandomOrder()->first();
            $departamentoAutora = Departamento::where("organizacao_id", $organizacaoAutora->id)
                                        ->inRandomOrder()->first();
            
            $autor = User::where("organizacao_id", $organizacaoAutora->id)->inRandomOrder()->first();
            $analista = User::where("organizacao_id", $organizacaoServico->id)->inRandomOrder()->first();
            $responsavel = User::where("organizacao_id", $organizacaoServico->id)->inRandomOrder()->first();
            $servico = Servico::inRandomOrder()->first();
            
            $categoria = ChamadoCategoria::inRandomOrder()->first();
            $situacao = ChamadoSituacao::inRandomOrder()->first();
            $prioridade = ChamadoPrioridade::inRandomOrder()->first();
            $feedback = ChamadoFeedback::inRandomOrder()->first();
            $urgencia = ChamadoUrgencia::inRandomOrder()->first();
            
            $chamado->organizacao_id = $organizacaoAutora->id;
            $chamado->autor_id = $autor->id;
            $chamado->analista_id = $analista->id;
            $chamado->responsavel_id = $responsavel->id;
            $chamado->departamento_id = $departamentoAutora->id;
            $chamado->servico_id = $servico->id;
            $chamado->chamado_categoria_id = $categoria->id;
            $chamado->chamado_situacao_id = $situacao->id;
            $chamado->chamado_prioridade_id = $prioridade->id;
            $chamado->chamado_feedback_id = $feedback->id;
            $chamado->chamado_urgencia_id = $urgencia->id;
            $chamado->save();

            $watchersOrigem = User::where("organizacao_id", $organizacaoAutora->id)->inRandomOrder()->limit(mt_rand(0,2))->get();

            $watchersVisivel = User::whereHas('organizacao_visivel', function ($query) use($organizacaoAutora) {
                $query->where('organizacao_id', $organizacaoAutora->id);
            })->inRandomOrder()->limit(mt_rand(0,2))->get();

            $chamado->watchers()->attach($watchersOrigem);
            $chamado->watchers()->attach($watchersVisivel);
        });
    }
}
