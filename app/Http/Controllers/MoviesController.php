<?php

namespace App\Http\Controllers;

use App\Models\movies;
use Illuminate\Http\Request;
use App\Http\Resources\FilmeResource;
use App\Http\Requests\FilmeRequest;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function apiIndex()
    {
        $colecaoFilmes = movies::all();
        return FilmeResource::collection($colecaoFilmes);
    }

    public function apiStore(FilmeRequest  $request)
    {
        $filmeCadastrado = movies::create( $request->all() );
        return new FilmeResource($filmeCadastrado);
    }


    public function apiUpdate(FilmeRequest $request, movies $m)
    {
        //$clienteParaAtualizar = Cliente::find($id);
        //$clienteParaAtualizar->update( $request->all() );
        //return new ClienteResource($clienteParaAtualizar);
        $m->update( $request->all() );
        return new FilmeResource($m);
    }

    public function apiDelete($id)
    {
        movies::destroy($id);
        return response()->json(['data' => 'Filme deletado com sucesso'],204);
    }

    public function apiShow(movies $m)
    {
        return new FilmeResource($m);
    }
}
