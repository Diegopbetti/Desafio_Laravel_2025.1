<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen w-full flex justify-center items-center">
    <div class="flex justify-center items-center bg-blue-950 w-11/12 h-5/6 rounded-2xl text-white">
        <div class="w-1/2 h-full flex justify-center items-center">
            <img src="{{ asset('images/celular.webp') }}" class="w-5/6 h-5/6 rounded-lg object-cover">
        </div>
        <div class="flex flex-col justify-center items-center w-1/2 h-full">
            <div class="w-96 mb-10">
                <span class="text-3xl font-bold">Celular:</span>
                <span class="text-2xl">R$ 1500,00</span>
            </div>
            <div class="w-96 mb-6">
                <span class="text-xl">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lacinia lacinia iaculis.
                    Suspendisse potenti. Nam laoreet, sem et vehicula semper, libero nibh tincidunt mi, id ultricies
                    leo ante et arcu. Etiam in ex quam. Nulla non velit lobortis, fringilla orci ut, varius justo.
                    Cras ex lacus, elementum sit amet eros gravida, blandit viverra arcu.
                </span>
            </div>
            <div class="w-96">
                <div class="mb-4 text-xl">
                    <span class="mr-5">Autor: Mono lux</span>
                    <span class="ml-5">Contato: 4002-8922</span>
                </div>
                <div class="text-2xl">
                    <span class="mr-6">Quantidade: 1 unidade</span>
                    <button class="bg-blue-500 w-24 py-2 rounded-full text-lg font-bold text-center transition-transform duration-300 hover:scale-110">Comprar</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>