<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <main class="h-screen w-full bg-white flex flex-col justify-center items-center">
        <!-- Cabeçalho -->
        <div class="flex items-center justify-between max-w-[1058px] w-full">
            <h1 class=" text-white text-[24px] bg-blue-950 px-[10%] py-[1%] rounded-[20px] mb-5 whitespace-nowrap">
                Gerenciamento de Usuários
            </h1>
            <button class="p-[1%] text-[60px] leading-[25px] flex border-white mb-5 text-blue-950 cursor-pointer">
                +
            </button>
        </div>

        <!-- Tabela -->
        <div class="max-w-[1058px] w-full">
            <table class="w-full overflow-hidden text-white rounded-[10px] border-collapse">
                <thead class="bg-blue-950">
                    <tr class="bg-[#237ecd] text-white">
                        <th class="px-3 py-2 text-center">Name</th>
                        <th class="px-3 py-2 text-center">E-mail</th>
                        <th class="px-3 py-2 text-center">Password</th>
                        <th class="px-3 py-2 text-center">Address</th>
                        <th class="px-3 py-2 text-center">Telephone</th>
                        <th class="px-3 py-2 text-center">Birth</th>
                        <th class="px-3 py-2 text-center">CPF</th>
                        <th class="px-3 py-2 text-center">Balance</th>
                        <th class="px-3 py-2 text-center">Photo</th>
                        <th class="px-3 py-2 text-center">View</th>
                        <th class="px-3 py-2 text-center">Edit</th>
                        <th class="px-3 py-2 text-center">Delete</th>

                    </tr>
                </thead>
                <tbody class="bg-blue-950">
                    <tr class="border-b border-gray-600">
                        <td class="px-3 py-2 text-center">Vitão</td>
                        <td class="px-3 py-2 text-center">vitao@vitao.com</td>
                        <td class="px-3 py-2 text-center">fefefwefw</td>
                        <td class="px-3 py-2 text-center">Uganda</td>
                        <td class="px-3 py-2 text-center">4002-8922</td>
                        <td class="px-3 py-2 text-center">12/12/2012</td>
                        <td class="px-3 py-2 text-center">12345678900</td>
                        <td class="px-3 py-2 text-center">R$-22,00</td>
                        <td class="px-3 py-2 text-center">-</td>
                        <th class="px-3 py-2 text-center"><button class="btn-acao bg-[#00AEA0] inline-flex items-center justify-center w-[20px] h-[20px] rounded-md border-none mt-1 cursor-pointer"></button></th>
                        <th class="px-3 py-2 text-center"><button class="btn-acao bg-[#FFC739] inline-flex items-center justify-center w-[20px] h-[20px] rounded-md border-none mt-1 cursor-pointer"></button></th>
                        <th class="px-3 py-2 text-center"><button class="btn-acao bg-[#C70E3C] inline-flex items-center justify-center w-[20px] h-[20px] rounded-md border-none mt-1 cursor-pointer"></button></th>

                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
