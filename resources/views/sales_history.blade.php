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
                    <tr class="border-b border-gray-600">
                        <td class="px-3 py-2 text-center">Nokia</td>
                        <td class="px-3 py-2 text-center"><button class="btn-acao bg-[#ffffff] inline-flex items-center justify-center w-[20px] h-[20px] rounded-md border-none mt-1 cursor-pointer"></button></td>
                        <td class="px-3 py-2 text-center">12/10/2025</td>
                        <td class="px-3 py-2 text-center">R$4000,00</td>
                        <td class="px-3 py-2 text-center"><button class="btn-acao bg-[#000000] inline-flex items-center justify-center w-[20px] h-[20px] rounded-md border-none mt-1 cursor-pointer"></button></td>
                
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
