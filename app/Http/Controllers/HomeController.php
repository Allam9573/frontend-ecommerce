<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function home()
    {
        $client = new Client();
        try {
            $request = $client->request('GET', 'http://localhost:3000/api/productos/listar-productos');
            $productos = json_decode($request->getBody(), true);
            $request = $client->request('GET', 'http://localhost:3000/api/categorias/listar-categorias');
            $categorias = json_decode($request->getBody(), true);
            return view('home', ['productos' => $productos, 'categorias' => $categorias]);
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
}
