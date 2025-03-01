<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="view" class="fixed inset-0 items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg w-1/3 shadow-lg">
            <h2 class="text-xl font-bold mb-4">Visualizar Usuário</h2>
            <form action="@csrf">
                <input type="text" placeholder="Name" class="border p-2 w-full mb-2 rounded" readonly>
                <input type="email" placeholder="Email" class="border p-2 w-full mb-2 rounded" readonly>
                <input type="password" placeholder="Password" class="border p-2 w-full mb-2 rounded" readonly>
                <input type="text" placeholder="Address" class="border p-2 w-full mb-2 rounded" readonly>
                <input type="tel" placeholder="Telephone" class="border p-2 w-full mb-2 rounded" pattern="[0-9]{10,11}" readonly>
                <div class="flex">
                    <input type="date" placeholder="Birth date" class="border p-2 w-1/3 mb-2 rounded" readonly>
                    <input type="text" placeholder="CPF" class="border p-2 w-2/3 mb-2 rounded" readonly>
                </div>
                <input type="number" placeholder="Balance" class="border p-2 w-full mb-2 rounded" readonly>
                <input type="file" placeholder="Phoyo" class="border p-2 w-full mb-2 rounded">

                <div class="flex justify-end mt-4">
                    <button type="button" onclick="fecharModal('view')" class="ml-2 text-gray-600 hover:underline">
                        Fechar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>