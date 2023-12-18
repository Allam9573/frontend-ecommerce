<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProductoController extends Controller
{

    public function productos()
    {
        $client = new Client();
        try {
            $response = $client->request('GET', 'http://localhost:3000/api/productos/listar-productos');
            $productos = json_decode($response->getBody(), true);

            $response = $client->request('GET', 'http://localhost:3000/api/categorias/listar-categorias');
            $categorias = json_decode($response->getBody(), true);

            return view('productos', ['productos' => $productos, 'categorias' => $categorias]);
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }

    public function crearProducto(Request $request)
    {
        $nombre = $request->input('nombre');
        $precio = $request->input('precio');
        $descripcion = $request->input('descripcion');

        $client = new Client();

        try {
            $response = $client->request('POST', 'http://localhost:3000/api/productos/crear', [
                'Content-Type' => 'application/json',
                'json' => [
                    'nombre' => $nombre,
                    'precio' => $precio,
                    'descripcion' => $descripcion
                ],
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect()->route('productos');
            }
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
}
