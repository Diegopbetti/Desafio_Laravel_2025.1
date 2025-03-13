<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PagSeguroController extends Controller
{   
    public function createCheckout(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1|max:99',
        ]);

        // Recupera o produto
        $product = Product::findOrFail($request->input('product_id'));

        // Calcula o preço total
        $totalPrice = $product->price * $request->input('quantity');

        $transaction = Transaction::create([
            'reference_id' => uniqid(), // Criando ID único
            'product_id' => $product->id,
            'buyer_id' => auth()->id(),
            'seller_id' => $product->announcer_id,
            'product_quantity' => $request->input('quantity'),
            'total_price' => $totalPrice,
            'date' => now(),
        ]);

        // Configurações do PagSeguro
        $url = config('services.pagseguro.checkout_url');
        $token = config('services.pagseguro.token');

        // Dados para o PagSeguro
        $items = [
            [
                'name' => $product->name,
                'quantity' => $request->input('quantity'),
                'unit_amount' => (int)($product->price * 100), // Valor em centavos
            ],
        ];

        // Envia a requisição para o PagSeguro
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
        ])->withoutVerifying()->post($url, [
            'reference_id' => uniqid(), // ID único para a transação
            'items' => $items, // Itens do carrinho
        ]);

        // Verifica se a requisição foi bem-sucedida
        if ($response->successful()) {
            $transaction->update([
                'reference_id'=> $response->json()['reference_id'],
            ]);

            // Redireciona para o link de pagamento do PagSeguro
            $payLink = data_get($response->json(), 'links.1.href');
            return redirect()->away($payLink);
        }

        // Tratamento de erro
        return redirect()->route('erro')->withErrors([
            'error' => 'Erro ao processar o pagamento. Tente novamente mais tarde.',
        ]);
    }
}