<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Http\Resources\ClienteResource;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
    public function apiIndex()
    {
        $colecaoClientes = Cliente::all();
        return ClienteResource::collection($colecaoClientes);
    }

    public function apiStore(ClienteRequest $request)
    {
        $clienteCadastrado = Cliente::create( $request->all() );
        return new ClienteResource($clienteCadastrado);
    }

    public function apiUpdate(ClienteRequest $request,Cliente $c)
    {
        //$clienteParaAtualizar = Cliente::find($id);
        //$clienteParaAtualizar->update( $request->all() );
        //return new ClienteResource($clienteParaAtualizar);
        $c->update( $request->all() );
        return new ClienteResource($c);
    }

    public function apiDelete($id)
    {
        Cliente::destroy($id);
        return response()->json(null,204);
    }

    public function apiShow(Cliente $c)
    {
        return new ClienteResource($c);
    }
}
