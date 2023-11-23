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
        $email = $request->input('email');
        $password = $request->input('senha');

        $user = DB::table('users')->where('email', $email)->first();

        if ($user && password_verify($password, $user->senha)) {
            // Credenciais válidas
            // Inicie manualmente uma sessão se necessário

            return response()->json(['message' => 'Login successful'], 200);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
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
