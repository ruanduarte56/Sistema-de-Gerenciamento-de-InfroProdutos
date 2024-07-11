<?php

namespace App\Http\Controllers;

use App\Models\Afiliados;
use App\Models\filtros;
use App\Models\produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');
        $nicho = request('nicho');
        $formato_produto = request('formato_produto');
        $moeda = request('moeda');

        if($search){
            $produtos = DB::table('filtros_produtos')->where('porcetagem_afiliacao','!=',0)
        ->join('produtos', 'produtos_id', '=', 'produtos.id')->join('filtros', 'filtros_id', '=', 'filtros.id')
        ->where('produtos.nome', 'like', '%' . $search . '%')->orWhere('filtros.nicho',$nicho)->paginate(6);
        }
        else{
        $produtos=produtos::where('porcetagem_afiliacao','!=',0)->paginate(6);
        }
       
        return view('dentroCasa.produtos.mercado',compact('produtos','search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dentroCasa.produtos.criar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $id_user = Auth::user()->id;

            // Valida o formulário
            $request->validate([
                'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'nome' => 'required|string|min:7|max:255',
                'descricao' => 'required|string|min:100',
                'preco' => 'required|numeric|min:20|max:10000',
                'nicho' => 'required|string|in:saúde física,saúde mental,outro',
                'formato_produto' => 'required|string|in:curso digital,ebook digital,software',
                'idioma' => 'required|string|in:pt-br,en',
                'moeda' => 'required|string',
                'afiliados' => 'required|boolean',
                'porcetagem_afiliacao' => 'required_if:afiliados,1|numeric|min:0.2|max:0.7',
                'tipo-comissao' => 'required_if:afiliados,1|string',
                'hotlink-alternativos' => 'required_if:afiliados,1|boolean',
                'premio-afiliado' => 'required_if:afiliados,1|boolean',
            ],[
                'foto-produto.required' => 'A foto do produto é obrigatória.',
                'foto-produto.mimes' => 'A imagem deve ser do tipo jpeg, png, jpg, ou gif.',
                'foto-produto.max' => 'A imagem não pode ser maior que 1MB.',
                'nome.required' => 'O nome do produto é obrigatório.',
                'nome.string' => 'O nome do produto deve ser uma string.',
                'nome.max' => 'O nome do produto não pode ser maior que 255 caracteres.',
                'descricao.required' => 'A descrição do produto é obrigatória.',
                'descricao.string' => 'A descrição do produto deve ser uma string.',
                'preco.required' => 'O preço do produto é obrigatório.',
                'preco.numeric' => 'O preço do produto deve ser um número.',
                'nicho.required' => 'O nicho do produto é obrigatório.',
                'nicho.string' => 'O nicho do produto deve ser uma string.',
                'formato_produto.required' => 'O formato do produto é obrigatório.',
                'formato_produto.string' => 'O formato do produto deve ser uma string.',
                'idioma.required' => 'O idioma do produto é obrigatório.',
                'idioma.string' => 'O idioma do produto deve ser uma string.',
                'moeda.required' => 'A moeda do produto é obrigatória.',
                'moeda.string' => 'A moeda do produto deve ser uma string.',
                'afiliados.required' => 'O campo de afiliados é obrigatório.',
                'afiliados.boolean' => 'O campo de afiliados deve ser sim ou nao.',
                'porcetagem_afiliacao.required_if' => 'A porcentagem de afiliação é obrigatória quando afiliados é selecionado.',
                'porcetagem_afiliacao.numeric' => 'A porcentagem de afiliação deve ser um número.',
                'tipo-comissao.required_if' => 'O tipo de comissão é obrigatório quando afiliados é selecionado.',
                'tipo-comissao.string' => 'O tipo de comissão deve ser uma string.',
                'hotlink-alternativos.required_if' => 'O hotlink alternativo é obrigatório quando afiliados é selecionado.',
                'hotlink-alternativos.string' => 'O hotlink alternativo deve ser uma string.',
                'premio-afiliado.required_if' => 'O prêmio para afiliados é obrigatório quando afiliados é selecionado.',
                'premio-afiliado.string' => 'O prêmio para afiliados deve ser uma string.',
            ]);

            
            

            // Cria o produto com o caminho da imagem
            $produto = [
                'i_usuario' => $id_user,
                'pagina_de_vendas' => 'teste',
                'nome' => $request->input('nome'),
                'slug' => $request->input('nome'),
                //'imagem' => $request->input('foto-produto'),
                'descricao' => $request->input('descricao'),
                'preco' => $request->input('preco'),
            ];

            if ($request->imagem) {
                $nomeImagem = $request->imagem->getClientOriginalName(); // Obtém o nome original da imagem
                $request->imagem->storeAs('public/produtos', $nomeImagem); // Move a imagem para a pasta 'public/produtos'
                $produto['imagem'] = 'produtos/' . $nomeImagem; // Salva o caminho da imagem no banco de dados (por exemplo, 'produtos/nome-da-imagem.jpg')
            }

            if ($request->input('afiliados') == 1) {
                $produto['porcetagem_afiliacao'] = $request->input('porcetagem_afiliacao');
            };

            $produto = produtos::create($produto);

            $filtroAttributes = [
                'nicho' => $request->input('nicho'),
                'formato_produto' => $request->input('formato_produto'),
                'idioma' => $request->input('idioma'),
                'moeda' => $request->input('moeda'),
                'afiliados' => $request->input('afiliados'),
            ];

            // Verificar se 'afiliados' é igual a 1 e adicionar atributos adicionais ao filtro
            if ($request->input('afiliados') == 1) {
                $filtroAttributes['tipo_comissao'] = $request->input('tipo-comissao');
                $filtroAttributes['hotlink_alternativos'] = $request->input('hotlink-alternativos');
                $filtroAttributes['premio_afiliado'] = $request->input('premio-afiliado');
            } 

            // Criar o filtro com os atributos ajustados
            $filtros = Filtros::create($filtroAttributes);

            // Associar o filtro ao produto
            $produto->filtros()->attach($filtros->id);
            //

            //retorno
            return redirect()->route('meusprodutos.index')->with('success', 'Produto criado com sucesso!');
        } catch (\Exception $e) {
            //Log::error('Erro ao criar produto: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $produto = produtos::where('slug', $slug)->first();
        if (!$produto) {
            abort(404, 'Produto não encontrado');
        }
        return view('dentroCasa.produtos.pagina', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto= produtos::FindorFail($id);
        $filtro = filtros::findOrFail($id);
        return view('dentroCasa.produtos.atualizar',compact('produto','filtro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            //'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nome' => 'required|string|min:7|max:255',
            'descricao' => 'required|string|min:100',
            'preco' => 'required|numeric|min:20|max:10000',
            'nicho' => 'required|string|in:saúde física,saúde mental',
            'formato_produto' => 'required|string|in:curso digital,ebook digital,software',
            'idioma' => 'required|string|in:pt-br,en',
            'moeda' => 'required|string|in:real',
            'afiliados' => 'required|boolean',
            'porcetagem_afiliacao' => 'required_if:afiliados,1|numeric|min:0.2|max:0.7',
            'tipo-comissao' => 'required_if:afiliados,1|string',
            'hotlink-alternativos' => 'required_if:afiliados,1|boolean',
            'premio-afiliado' => 'required_if:afiliados,1|boolean',
        ],[
            'foto-produto.required' => 'A foto do produto é obrigatória.',
            'foto-produto.mimes' => 'A imagem deve ser do tipo jpeg, png, jpg, ou gif.',
            'foto-produto.max' => 'A imagem não pode ser maior que 1MB.',
            'nome.required' => 'O nome do produto é obrigatório.',
            'nome.string' => 'O nome do produto deve ser uma string.',
            'nome.max' => 'O nome do produto não pode ser maior que 255 caracteres.',
            'descricao.required' => 'A descrição do produto é obrigatória.',
            'descricao.string' => 'A descrição do produto deve ser uma string.',
            'preco.required' => 'O preço do produto é obrigatório.',
            'preco.numeric' => 'O preço do produto deve ser um número.',
            'nicho.required' => 'O nicho do produto é obrigatório.',
            'nicho.string' => 'O nicho do produto deve ser uma string.',
            'formato_produto.required' => 'O formato do produto é obrigatório.',
            'formato_produto.string' => 'O formato do produto deve ser uma string.',
            'idioma.required' => 'O idioma do produto é obrigatório.',
            'idioma.string' => 'O idioma do produto deve ser uma string.',
            'moeda.required' => 'A moeda do produto é obrigatória.',
            'moeda.string' => 'A moeda do produto deve ser uma string.',
            'afiliados.required' => 'O campo de afiliados é obrigatório.',
            'afiliados.boolean' => 'O campo de afiliados deve ser sim ou nao.',
            'porcetagem_afiliacao.required_if' => 'A porcentagem de afiliação é obrigatória quando afiliados é selecionado.',
            'porcetagem_afiliacao.numeric' => 'A porcentagem de afiliação deve ser um número.',
            'tipo-comissao.required_if' => 'O tipo de comissão é obrigatório quando afiliados é selecionado.',
            'tipo-comissao.string' => 'O tipo de comissão deve ser uma string.',
            'hotlink-alternativos.required_if' => 'O hotlink alternativo é obrigatório quando afiliados é selecionado.',
            'hotlink-alternativos.string' => 'O hotlink alternativo deve ser uma string.',
            'premio-afiliado.required_if' => 'O prêmio para afiliados é obrigatório quando afiliados é selecionado.',
            'premio-afiliado.string' => 'O prêmio para afiliados deve ser uma string.',
        ]);

        $produto = [
            'pagina_de_vendas' => 'teste',
            'nome' => $request->input('nome'),
            'slug' => $request->input('nome'),
            //'imagem' => $request->input('foto-produto'),
            'descricao' => $request->input('descricao'),
            'preco' => $request->input('preco'),
        ];

        if ($request->imagem) {
            $nomeImagem = $request->imagem->getClientOriginalName(); // Obtém o nome original da imagem
            $request->imagem->storeAs('public/produtos', $nomeImagem); // Move a imagem para a pasta 'public/produtos'
            $produto['imagem'] = 'produtos/' . $nomeImagem; // Salva o caminho da imagem no banco de dados (por exemplo, 'produtos/nome-da-imagem.jpg')
        }

        if ($request->input('afiliados') == 1) {
            $produto['porcetagem_afiliacao'] = $request->input('porcetagem_afiliacao');
        };

         produtos::FindorFail($id)->update($produto);

         $filtroAttributes = [
            'nicho' => $request->input('nicho'),
            'formato_produto' => $request->input('formato_produto'),
            'idioma' => $request->input('idioma'),
            'moeda' => $request->input('moeda'),
            'afiliados' => $request->input('afiliados'),
        ];

        // Verificar se 'afiliados' é igual a 1 e adicionar atributos adicionais ao filtro
        if ($request->input('afiliados') == 1) {
            $filtroAttributes['tipo_comissao'] = $request->input('tipo-comissao');
            $filtroAttributes['hotlink_alternativos'] = $request->input('hotlink-alternativos');
            $filtroAttributes['premio_afiliado'] = $request->input('premio-afiliado');
        } 

        // Criar o filtro com os atributos ajustados
        $filtros = Filtros::findOrFail($id)->update($filtroAttributes);       
        return redirect()->route('meusprodutos.index')->with('success', 'Produto criado com sucesso!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $produto = produtos::find($id);
        $produto->delete();
        return redirect()->route('meusprodutos.index');
    }

    public function afiliado(){
        $id = Auth::user()->id;
        $produtos = Afiliados::where('afiliados.i_usuario', $id)
        ->join('produtos', 'afiliados.i_produto', '=', 'produtos.id')
        ->select('produtos.*')
        ->get();
        return view('dentroCasa.produtos.afiliados',compact('produtos'));
    }

}
