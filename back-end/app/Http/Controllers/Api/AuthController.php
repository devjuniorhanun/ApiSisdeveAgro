<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Cadastros\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ApiResponser;

    /**
     * Método de registro()
     * Responsavel por cadastrar um novo Usuário
     */
    public function register(Request $request)
    {
        // Valida os dados vindos do usuário
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        // Cria um novo usuário
        $user = User::create([
            'name' => $attr['name'],
            'password' => Hash::make($attr['password']),
            'email' => $attr['email']
        ]);

        // Retornar uma mensagens de Sucesso
        return $this->success([
            'token' => $user->createToken($request['device'])->plainTextToken
        ],201,"Usuário Cadastrado com Sucesso!");
    }

    /**
     * Método login()
     * Responsavel por verificar se o email e senha consiste no banco
     */
    public function login(Request $request)
    {
        // Valida os dados vindos do usuário
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        // Verifica se o login e senha são validos
        if (!Auth::attempt($attr)) {
            return $this->error('Login ou Senha invalidos', 401); // se não for validos
        }

        // Retornar uma mensagens de Sucesso
        return $this->success([
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ]);
    }

    /**
     * Método de logout()
     * Resposnavel por efeturar o logout do usuário
     */
    public function logout()
    {
        // Remove o token do banco
        auth()->user()->tokens()->delete();

        // Retornar uma mensagens de Sucesso
        return [
            'message' => 'Deslogado com Susseso'
        ];
    }
}