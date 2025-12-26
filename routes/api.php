<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rota de teste para receber a foto
Route::post('/capture', function (Request $request) {
    
    // 1. Valida se enviou uma imagem
    $request->validate([
        'photo' => 'required|image',
    ]);

    // 2. Salva a foto na pasta pública do servidor
    $path = $request->file('photo')->store('captures', 'public');

    // 3. Responde com um JSON de sucesso (simulando a IA)
    return response()->json([
        'success' => true,
        'message' => 'Foto recebida com sucesso!',
        'data' => [
            'nickname' => 'Minha Primeira Planta',
            'scientific_name' => 'Araucaria angustifolia',
            'xp_earned' => 100,
            // Gera o link para ver a imagem no navegador
            'image_url' => asset('storage/' . $path)
        ]
    ]);
});