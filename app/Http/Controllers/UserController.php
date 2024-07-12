<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
    // Validação dos campos do formulário
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ],[
    'name.required' => 'O nome é obrigatório.',
    'name.max' => 'O nome não pode ter mais de 255 caracteres.',
    'email.required' => 'O e-mail é obrigatório.',
    'email.email' => 'Formato de e-mail inválido.',
    'email.max' => 'O e-mail não pode ter mais de 255 caracteres.',
    'email.unique' => 'Este e-mail já está cadastrado.',
    'password.required' => 'A senha é obrigatória.',
    'password.string' => 'A senha deve ser uma string.',
    'password.min' => 'A senha deve ter pelo menos 8 caracteres.',
    'password.confirmed' => 'A confirmação de senha não corresponde.',
    ]);

    try {
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->save();
        Auth::login($user);
        return redirect()->route('dashboard.index');
    } catch (\Exception $e) {
        if ($e->getCode() == 23000) {
            return back()->withErrors(['error' => 'Email já cadastrado']);
        }

        return back()->withErrors(['error' => 'Erro ao cadastrar usuário']);
    }
}

    /**
     * Display the specified resource.
     */
    public function show($nome)
    {
        $user = User::where('name', $nome)->first();
        if (!$user) {
            abort(404, 'Usuario não encontrado');
        }

        Gate::authorize('ver-user',$nome);

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
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
    ]);

    $dados = $request->all();

    try {
        $user = User::findOrFail($id);
        $user->update($dados);
        return redirect()->route('users.show',auth()->user()->name)->with('success', 'Sucesso'); // Redirecionar para uma rota específica
    } catch (\Exception $e) {
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
