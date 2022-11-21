<?php

namespace App\Service;

use App\Models\User;
use App\Repository\AuthRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register($request){
        try {
            $dados = [];
            $dados['cod'] = (string) Str::uuid();

            if(isset($request['name'])){
                $dados['name'] = $request['name'];
                $dados['login'] = Str::slug($request['name'], '_');
            }

            if(isset($request['email'])){
                $dados['email'] = $request['email'];
            }

            if(isset($request['password'])){
                $dados['password'] = bcrypt($request['password']);
            }

            $dados['tipo'] = 'user';

            $dados['status'] = intval(1);

            $usuario = $this->authRepository->salvarUsuario($dados);

            return response()->json([
                'message' => 'Usuário Cadastrado com sucesso.',
                'usuario' => $usuario,

            ], 200);

        } catch (\Exception $ex) {
            return response()->json( $ex->getMessage(), 401);
        }

    }

    public function login($request){
        try {

            if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return response()->json([
                    'status' => false,
                    'message' => 'Erro. Email ou Senha inválido.',
                ], 401);
            }

            $user = $this->authRepository->buscarUsuario($request['email']);

            return response()->json([
                'message' => 'Usuário Logado com Sucesso.',
                'token' => $user->createToken(time().rand(0,9999))->plainTextToken
            ], 200);

        } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'message' => $ex->getMessage()
            ], 401);
        }

    }

    public function me(){
        return response()->json( Auth::user(), 200);
    }

    public function logout(){
        Auth::logout();

        session()->invalidate();

        session()->regenerateToken();

        return response()->json( 'Usuário DESLOGADO com sucesso.', 200);
    }

}
