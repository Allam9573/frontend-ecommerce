<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CategoriasController extends Controller
{
    public function listarCategorias()
    {
        $client = new Client();
        try {
            $response = $client->request('GET', 'localhost:3000/api/categorias/listar-categorias');
            $categorias = json_decode($response->getBody(), true);
            return view('categorias', ['categorias' => $categorias]);
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
    public function crearCategoria(Request $request)
    {
        $nombre = $request->input('nombre');
        $client = new Client();
        try {
            $request = $client->request('POST', 'localhost:3000/api/categorias/crear-categoria', [
                'Content-Type' => 'application/json',
                'json' => [
                    'nombre' => $nombre
                ],
            ]);
            if ($request->getStatusCode() == 200) {
                return redirect()->route('categorias');
            }
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
}
