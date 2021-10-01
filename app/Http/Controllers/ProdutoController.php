<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Tipo;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;



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
    public function index(Request $request)
    {
        // verificar se o campo de busca foi
        if($request->busca != ''){

            // exibir todos os produtos relacionados com fornecedores e tipos pelo critério passado
            $produtos = $this->produto->with('fornecedor')->with('tipo')->where('nome_produto', 'like', '%'.$request->busca.'%')->get();
            
        }else {

            // exibir todos os produtos relacionados com fornecedores e tipos
            $produtos = $this->produto->with('fornecedor')->with('tipo')->get();
        }

        return view('app.produtos.index', ['produtos' => $produtos]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fornecedores = Fornecedor::all();
        $tipos = Tipo::all();

        return view('app.produtos.cadastrar', ['fornecedores' => $fornecedores, 'tipos' => $tipos]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validação de campos
        $request->validate($this->produto->rules(), $this->produto->feedback());
        
        $imagem = $request->file('imagem');

        $imagem_urn = $imagem->store('imagens/produtos', 'public');

        $produto = $this->produto->create([
            'nome_produto' => $request->nome_produto,
            'imagem' => $imagem_urn,
            'qtd_estoque' => $request->qtd_estoque,
            'qtd_reposicao' => $request->qtd_reposicao,
            'data_validade' => date('Y-m-d', strtotime($request->data_validade)),
            'preco_unitario' => $request->preco_unitario,
            'tipo_id' => $request->tipo_id,
            'fornecedor_id' => $request->fornecedor_id

        ]);

        // verificar se o produto foi cadastrado
        if($produto->id){

            $msg = 'O produto foi cadastrado com sucesso. ID: '.$produto->id;

        }else {

            $msg = 'Ocorreu um erro ao salvar o produto. Tente novamente.';
            
        }

        return view('app.produtos.msg', ['msg' => json_encode($msg)]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {

        return view('app.produtos.visualizar', ['produto' => $produto]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $fornecedores = Fornecedor::all();
        $tipos = Tipo::all();
        

        return view('app.produtos.editar', ['produto' => $produto, 'fornecedores' => $fornecedores, 'tipos' => $tipos]);

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

        // ajustar formato da data para ser salvo no banco de dados
        $produto->data_validade = date('Y-m-d', strtotime($request->data_validade));

        // verifica se uma nova imagem foi encaminhada na requisição
        if($request->file('imagem') != ''){

            // remove o arquivo antigo caso tenho sido enviado um arquivo novo
            Storage::disk('public')->delete($imagem_bd);
            $imagem = $request->file('imagem');
            $imagem_urn = $imagem->store('imagens/produtos', 'public');
            $produto->imagem = $imagem_urn;

        }

        $produto->save();

        // verificar se o produto foi cadastrado
        if($produto->id){

            $msg = 'O produto foi editado com sucesso. ID: '.$produto->id;
            

        }else {

            $msg = 'Ocorreu um erro ao editar o produto. Tente novamente.';
            
        }

        return view('app.produtos.msg', ['msg' => json_encode($msg)]);

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
            $msg = 'O recurso solicitado não existe';
        }else {

            // remove o arquivo
            Storage::disk('public')->delete($produto->imagem);
            
            $produto->delete();

            $msg = 'O produto foi removido com sucesso';
        }

        return view('app.produtos.msg', ['msg' => json_encode($msg)]);

    }

    public function search($string){

        echo $string; die;

    }


}
