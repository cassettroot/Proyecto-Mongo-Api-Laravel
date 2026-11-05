<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products', function () {
    return response()->json(Product::all());
});

Route::get('/catalogo-libros', function () {
    // Petición al primer proyecto que corre en el puerto 8001
    $response = Http::get('http://127.0.0.1:8001/api/libros');

    if ($response->successful()) {
        return response()->json([
            'status' => 'success',
            'data' => $response->json()
        ]);
    }

    return response()->json([
        'status' => 'error',
        'message' => 'No se pudo conectar con la API de Libros'
    ], 500);
});