<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col items-center">
    <div class="flex justify-between items-center h-20 bg-blue-950 text-white w-full">
        <h1 class="text-3xl ml-10">TechMarket</h1>
        <div>
            <button class="underline mr-2 transition-transform duration-300 hover:scale-110">Filtrar</button>
            <input class="bg-blue-950 rounded-xl h-8 mr-10 " placeholder="Pesquisar"></input>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-x-5 gap-y-5 w-1/2 mt-12">
        <div class="flex flex-col items-center bg-blue-950 w-48 rounded-xl p-3">
            <img src="{{ asset('images/celular.webp') }}" alt="" class="w-48 h-40 rounded-xl object-contain">     
            <div class="flex flex-col w-full text-white mt-3">
                <div class="flex justify-between items-center w-full">
                    <span class="ml-1 font-bold">Celular</span>
                    <span class="mr-1 text-right">$1500,00</span>  
                </div>
                <div class="flex justify-between w-full mt-4">
                    <button class="bg-blue-500 w-20 py-1 rounded-full text-xs font-bold text-center transition-transform duration-300 hover:scale-110">Visualizar</button>                         
                    <button class="bg-blue-500 w-20 py-1 rounded-full text-xs font-bold text-center transition-transform duration-300 hover:scale-110">Comprar</button>
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center bg-blue-950 w-48 rounded-xl p-3">
            <img src="{{ asset('images/celular.webp') }}" alt="" class="w-48 h-40 rounded-xl object-contain">     
            <div class="flex flex-col w-full text-white mt-3">
                <div class="flex justify-between items-center w-full">
                    <span class="ml-1 font-bold">Celular</span>
                    <span class="mr-1 text-right">$1500,00</span>  
                </div>
                <div class="flex justify-between w-full mt-4">
                    <button class="bg-blue-500 w-20 py-1 rounded-full text-xs font-bold text-center transition-transform duration-300 hover:scale-110">Visualizar</button>                         
                    <button class="bg-blue-500 w-20 py-1 rounded-full text-xs font-bold text-center transition-transform duration-300 hover:scale-110">Comprar</button>
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center bg-blue-950 w-48 rounded-xl p-3">
            <img src="{{ asset('images/celular.webp') }}" alt="" class="w-48 h-40 rounded-xl object-contain">     
            <div class="flex flex-col w-full text-white mt-3">
                <div class="flex justify-between items-center w-full">
                    <span class="ml-1 font-bold">Celular</span>
                    <span class="mr-1 text-right">$1500,00</span>  
                </div>
                <div class="flex justify-between w-full mt-4">
                    <button class="bg-blue-500 w-20 py-1 rounded-full text-xs font-bold text-center transition-transform duration-300 hover:scale-110">Visualizar</button>                         
                    <button class="bg-blue-500 w-20 py-1 rounded-full text-xs font-bold text-center transition-transform duration-300 hover:scale-110">Comprar</button>
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center bg-blue-950 w-48 rounded-xl p-3">
            <img src="{{ asset('images/celular.webp') }}" alt="" class="w-48 h-40 rounded-xl object-contain">     
            <div class="flex flex-col w-full text-white mt-3">
                <div class="flex justify-between items-center w-full">
                    <span class="ml-1 font-bold">Celular</span>
                    <span class="mr-1 text-right">$1500,00</span>  
                </div>
                <div class="flex justify-between w-full mt-4">
                    <button class="bg-blue-500 w-20 py-1 rounded-full text-xs font-bold text-center transition-transform duration-300 hover:scale-110">Visualizar</button>                         
                    <button class="bg-blue-500 w-20 py-1 rounded-full text-xs font-bold text-center transition-transform duration-300 hover:scale-110">Comprar</button>
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center bg-blue-950 w-48 rounded-xl p-3">
            <img src="{{ asset('images/celular.webp') }}" alt="" class="w-48 h-40 rounded-xl object-contain">     
            <div class="flex flex-col w-full text-white mt-3">
                <div class="flex justify-between items-center w-full">
                    <span class="ml-1 font-bold">Celular</span>
                    <span class="mr-1 text-right">$1500,00</span>  
                </div>
                <div class="flex justify-between w-full mt-4">
                    <button class="bg-blue-500 w-20 py-1 rounded-full text-xs font-bold text-center transition-transform duration-300 hover:scale-110">Visualizar</button>                         
                    <button class="bg-blue-500 w-20 py-1 rounded-full text-xs font-bold text-center transition-transform duration-300 hover:scale-110">Comprar</button>
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center bg-blue-950 w-48 rounded-xl p-3">
            <img src="{{ asset('images/celular.webp') }}" alt="" class="w-48 h-40 rounded-xl object-contain">     
            <div class="flex flex-col w-full text-white mt-3">
                <div class="flex justify-between items-center w-full">
                    <span class="ml-1 font-bold">Celular</span>
                    <span class="mr-1 text-right">$1500,00</span>  
                </div>
                <div class="flex justify-between w-full mt-4">
                    <button class="bg-blue-500 w-20 py-1 rounded-full text-xs font-bold text-center transition-transform duration-300 hover:scale-110">Visualizar</button>                         
                    <button class="bg-blue-500 w-20 py-1 rounded-full text-xs font-bold text-center transition-transform duration-300 hover:scale-110">Comprar</button>
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center bg-blue-950 w-48 rounded-xl p-3">
            <img src="{{ asset('images/celular.webp') }}" alt="" class="w-48 h-40 rounded-xl object-contain">     
            <div class="flex flex-col w-full text-white mt-3">
                <div class="flex justify-between items-center w-full">
                    <span class="ml-1 font-bold">Celular</span>
                    <span class="mr-1 text-right">$1500,00</span>  
                </div>
                <div class="flex justify-between w-full mt-4">
                    <button class="bg-blue-500 w-20 py-1 rounded-full text-xs font-bold text-center transition-transform duration-300 hover:scale-110">Visualizar</button>                         
                    <button class="bg-blue-500 w-20 py-1 rounded-full text-xs font-bold text-center transition-transform duration-300 hover:scale-110">Comprar</button>
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center bg-blue-950 w-48 rounded-xl p-3">
            <img src="{{ asset('images/celular.webp') }}" alt="" class="w-48 h-40 rounded-xl object-contain">     
            <div class="flex flex-col w-full text-white mt-3">
                <div class="flex justify-between items-center w-full">
                    <span class="ml-1 font-bold">Celular</span>
                    <span class="mr-1 text-right">$1500,00</span>  
                </div>
                <div class="flex justify-between w-full mt-4">
                    <button class="bg-blue-500 w-20 py-1 rounded-full text-xs font-bold text-center transition-transform duration-300 hover:scale-110">Visualizar</button>                         
                    <button class="bg-blue-500 w-20 py-1 rounded-full text-xs font-bold text-center transition-transform duration-300 hover:scale-110">Comprar</button>
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center bg-blue-950 w-48 rounded-xl p-3">
            <img src="{{ asset('images/celular.webp') }}" alt="" class="w-48 h-40 rounded-xl object-contain">     
            <div class="flex flex-col w-full text-white mt-3">
                <div class="flex justify-between items-center w-full">
                    <span class="ml-1 font-bold">Celular</span>
                    <span class="mr-1 text-right">$1500,00</span>  
                </div>
                <div class="flex justify-between w-full mt-4">
                    <button class="bg-blue-500 w-20 py-1 rounded-full text-xs font-bold text-center transition-transform duration-300 hover:scale-110">Visualizar</button>                         
                    <button class="bg-blue-500 w-20 py-1 rounded-full text-xs font-bold text-center transition-transform duration-300 hover:scale-110">Comprar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center m-8 w-full text-white">
        <button class="bg-blue-950 mx-1 px-3 py-1 rounded-xl">1</button>
        <button class="bg-blue-500 mx-1 px-3 py-1 rounded-xl">2</button>
        <button class="bg-blue-500 mx-1 px-3 py-1 rounded-xl">3</button>
        <button class="bg-blue-500 mx-1 px-3 py-1 rounded-xl">4</button>
    </div>
</body>
