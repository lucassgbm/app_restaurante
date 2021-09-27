<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProdutoController extends Controller
{
    public function __construct(Produto $produto){
        $this->produto = $produto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // produtos relacionados com fornecedores e tipos
        $produtos = $this->produto->with('fornecedor', 'tipo')->get();

        return response()->json($produtos, 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // validação de campos
        $request->validate($this->produto->rules(), $this->produto->feedback());

        $imagem = $request->file('imagem');
        $imagem_urn = $imagem->store('imagens/produtos', 'public');

        $produto = $this->produto->create([
            'nome_produto' => $request->nome_produto,
            'imagem' => $imagem_urn,
            'qtd_estoque' => $request->qtd_estoque,
            'qtd_reposicao' => $request->qtd_reposicao,
            'data_validade' => $request->data_validade,
            'preco_unitario' => $request->preco_unitario,
            'tipo_id' => $request->tipo_id,
            'fornecedor_id' => $request->fornecedor_id

        ]);
        
        return response()->json($produto, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = $this->produto->find($id);

        if($produto === null){
            return response()->json(['erro' => 'O recurso solicitado não existe'],404);
        }

        if($request->method() === 'PATCH'){
                
            $regrasDinamicas = array();

            $teste = '';

            #percorrendo todas as regras definidas no Model
            foreach ($produto->rules() as $input => $regra){

                #colocar apenas as regras aplicáveis aos parâmetros parciais da requisição PATCH

                if(array_key_exists($input, $request->all())){
                    $regrasDinamicas[$input] = $regra;
                }

            }
                
            $request->validate($regrasDinamicas, $produto->feedback());

        // método PUT
        }else {
            $request->validate($produto->rules(), $produto->feedback());
        }

        // imagem salva no banco
        $imagem_bd = $produto->imagem;

        // preenche o objeto produto com todos os dados passados no request
        $produto->fill($request->all());

        // verifica se uma nova imagem foi encaminhada na requisição
        if($request->file('imagem') != ''){

            // remove o arquivo antigo caso tenho sido enviado um arquivo novo
            Storage::disk('public')->delete($imagem_bd);
            $imagem = $request->file('imagem');
            $imagem_urn = $imagem->store('imagens/produtos', 'public');
            $produto->imagem = $imagem_urn;

        }

        $produto->save();

        return response()->json($produto, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = $this->produto->find($id);

        if($produto === null){
            return response()->json(['erro' => 'O recurso solicitado não existe'],404);
        }

        // remove o arquivo
        Storage::disk('public')->delete($produto->imagem);

        $produto->delete();
        return response()->json(['msg' => 'O produto foi removido com sucesso'], 200);
    }
}
