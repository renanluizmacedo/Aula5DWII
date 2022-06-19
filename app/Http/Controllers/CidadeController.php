<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public $cidades = [[
        'id' => 1,
        'nome'  => 'Matinhos',
        'porte' => 'pequeno'
    ]];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $aux = session('cidades');

        if (!isset($aux)) {
            session(['cidades' => $this->cidades]);
        }
    }
    public function index()
    {
        $cidades = session('cidades');
        return view('cidades.index', compact('cidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // obtém os dados da sessão "clientes"
        $aux = session('cidades');

        // retorna um array contendo apenas os dados da coluna "id"
        $ids = array_column($aux, 'id');

        // verifica o total de elementos do array "id"
        if (count($ids) > 0) {
            // obtém o valor máximo do array "id" + 1
            $new_id = max($ids) + 1;
        } else {
            // configura novo id com 1
            $new_id = 1;
        }

        // Array com os dados do novo cadastro

        if ($request->porte == 1) {
            $porte = 'Pequeno';
        } else if ($request->porte == 2) {
            $porte = 'Médio';
        } else {
            $porte = 'Grande';
        }
        $novo = [
            'id' => $new_id,
            'nome' => $request->nome,
            'porte' => $porte
        ];


        // Insere novo cadastro no array
        array_push($aux, $novo);

        // Atualiza a sessão com o novo cadastro
        session(['cidades' => $aux]);

        // redireciona para lista de clientes
        return redirect()->route('cidade.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aux = session('cidades');

        // Obtém o índice do array "$aux" onde está o "$id" buscado
        $indice = array_search($id, array_column($aux, 'id'));

        // Armazena os dados do cliente para o índice obtido
        $dados = $aux[$indice];

        // retorna a "view" e passa os dados do cliente
        return view('cidades.show', compact('dados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aux = session('cidades');

        // Obtém o índice do array "$aux" onde está o "$id" buscado
        $indice = array_search($id, array_column($aux, 'id'));

        // Armazena os dados do cliente para o índice obtido
        $dados = $aux[$indice];

        // retorna a "view" e passa os dados do cliente
        return view('cidades.edit', compact('dados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if ($request->porte != null) {
            if ($request->porte == 1) {
                $porte = 'Pequeno';
            } else if ($request->porte == 2) {
                $porte = 'Médio';
            } else {
                $porte = 'Grande';
            }
            $alterado = [
                'id' => $id,
                'nome' => $request->nome,
                'porte' => $porte
            ];
            // Obtém os dados da variável de sessão "clientes"
            $aux = session('cidades');

            // Obtém o índice do array "$aux" onde está o "$id" buscado
            $indice = array_search($id, array_column($aux, 'id'));

            // Substitui os dados do cliente com as novas informações
            $aux[$indice] = $alterado;

            // Atualiza a sessão com a nova alteração
            session(['cidades' => $aux]);
        }

        // redireciona para lista de clientes
        return redirect()->route('cidade.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Obtém os dados da variável de sessão "clientes"
        $aux = session('cidades');

        // Obtém o índice do array "$aux" onde está o "$id" buscado
        $indice = array_search($id, array_column($aux, 'id'));

        // Remove o elemento em "indice" do array "$aux"
        unset($aux[$indice]);

        // Atualiza a sessão com a nova alteração
        session(['cidades' => $aux]);

        // redireciona para lista de clientes
        return redirect()->route('cidade.index');
    }
}
