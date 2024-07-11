<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user=$request->all();
        $user['password']=bcrypt($request->password);
        $user = User::create($user);
        Auth::login($user);
        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        if (!$user) {
            abort(404, 'Usuario não encontrado');
        }
        return view('dentroCasa.usuario.user', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validação básica (adicione mais regras conforme necessário)
    $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        // adicione mais campos e regras de validação conforme necessário
    ]);

    // Captura todos os dados do request
    $dados = $request->all();

    // Depuração: Verifique os dados recebidos
    // dd($dados);

    try {
        // Encontra o usuário pelo ID e atualiza
        $user = User::findOrFail($id);
        $user->update($dados);

        // Redireciona de volta com uma mensagem de sucesso
        return redirect()->back()->with('success', 'Sucesso');
    } catch (\Exception $e) {
        // Captura exceções e redireciona de volta com uma mensagem de erro
        return redirect()->back()->with('error', 'Erro ao atualizar: ' . $e->getMessage());
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
