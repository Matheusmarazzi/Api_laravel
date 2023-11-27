<?php

namespace App\Http\Controllers;
use App\Models\Users;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use DB;


class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'senha');

        $user = Users::where('email', $credentials['email'])->first();
        

        if ($credentials['senha'] == $user->senha) {
            // Credenciais válidas
            return response()->json(['message' => 'Login bem-sucedido'], 200);
        } else {
            // Credenciais inválidas
            return response()->json(['error' => 'Credenciais inválidas'], 401);
        }
    }

    public function apiStore(Request $request)
    {
        $UserCadastrado = Users::create( $request->all() );
        return new UserResource($UserCadastrado);
    }

    public function apiUpdate(Request $request,Users $u)
    {
        //$UserParaAtualizar = User::find($id);
        //$UserParaAtualizar->update( $request->all() );
        //return new UserResource($UserParaAtualizar);
        $u->update( $request->all() );
        return new UserResource($u);
    }

    public function apiDelete($id)
    {
        Users::destroy($id);
        return response()->json(null,204);
    }

    public function apiShow(Users $u)
    {
        return new UserResource($u);
    }
}
