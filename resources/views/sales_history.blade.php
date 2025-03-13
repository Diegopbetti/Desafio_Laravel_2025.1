<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <main class="h-screen w-full bg-white flex flex-col items-center">
        <!-- Cabeçalho -->
        <div class="flex text-blue-950 text-6xl justify-center max-w-[1058px] w-full font-bold mt-16 mb-36">
            Histórico de vendas        
        </div>

        <!-- Tabela -->
        <div class="max-w-[1058px] w-full">
            <table class="w-full overflow-hidden text-white rounded-[10px] border-collapse">
                <thead class="bg-blue-950">
                    <tr class="bg-[#237ecd] text-white">
                        <th class="px-3 py-2 text-center">Name</th>
                        <th class="px-3 py-2 text-center">Photo</th>
                        <th class="px-3 py-2 text-center">Date of purchase</th>
                        <th class="px-3 py-2 text-center">Price</th>
                        <th class="px-3 py-2 text-center">Report</th>

                    </tr>
                </thead>
                <tbody class="bg-blue-950">
                    @foreach ($sales as $sale)
                        <tr class="border-b border-gray-600">
                            <td class="px-3 py-2 text-center">{{ $sale->product->name }}</td>
                            <td class="px-3 py-2 text-center flex justify-center items-center">
                                <button class="bg-[#ffffff] w-[30px] h-[30px] rounded-md flex items-center justify-center cursor-pointer" onclick="abrirModal('modal-{{ $sale->id }}')">
                                    🔍
                                </button>
                            </td>
                            <td class="px-3 py-2 text-center">{{ $sale->date->format('d/m/Y') }}</td>
                            <td class="px-3 py-2 text-center">R${{ number_format($sale->total_price, 2, ',', '.') }}</td>
                            <td class="px-3 py-2 text-center">
                                <a href="#" class="bg-black text-white px-4 py-2 rounded-md">Ver</a>
                            </td>
                        </tr> 
                        <div id="modal-{{ $sale->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center">
                            <div class="bg-white p-4 rounded-lg shadow-lg flex flex-col items-center">
                                <img src="{{ asset($sale->product->photo) }}" alt="Product Image" class="w-96 mr-12 h-auto rounded-md">
                                <button class="mt-4 bg-red-600 text-white px-4 py-2 rounded-md" 
                                    onclick="fecharModal('modal-{{ $sale->id }}')">
                                    Fechar
                                </button>
                            </div>
                        </div>  
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
