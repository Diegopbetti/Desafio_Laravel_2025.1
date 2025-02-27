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
            <img src="{{ asset($product->photo) }}" class="w-5/6 h-5/6 rounded-lg object-cover">
        </div>
        <div class="flex flex-col justify-center items-center w-1/2 h-full">
            <div class="w-96 mb-10">
                <span class="text-3xl font-bold">{{$product->name}}:</span>
                <span class="text-2xl">R${{$product->price}}</span>
            </div>
            <div class="w-96 mb-6">
                <span class="text-xl"> {{$product->description}} </span>
            </div>
            <div class="w-96">
                <div class="mb-4 text-xl ">
                    <div class="">Autor: {{$product->announcer->name}}</div>
                    <div class="mt-3 ">Contato: {{$product->announcer->telephone}}</div>
                </div>
                <div class="text-2xl">
                    <span class="mr-6">Quantidade: {{$product->quantity}}</span>
                    <button class="bg-blue-500 w-24 py-2 rounded-full text-lg font-bold text-center transition-transform duration-300 hover:scale-110">Comprar</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>