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
            <form method="GET" action="{{ route('home_page') }}" class="flex items-center">
                <select name="category" class="bg-blue-950 text-white rounded-xl h-10 mr-2 px-7 text-left pl-3">
                    <option value="">Todas as categorias</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                            {{ ucfirst($category) }}
                        </option>
                    @endforeach
                </select>

                <input type="text" name="search" value="{{ request('search') }}" 
                    placeholder="Pesquisar" class="bg-blue-950 text-white rounded-xl h-10 px-3">

                <button type="submit" class="underline ml-2 mr-10 transition-transform duration-300 hover:scale-110">
                    Filtrar
                </button>
            </form>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-x-5 gap-y-5 w-1/2 mt-12">
        @foreach($products as $product)
        <div class="flex flex-col items-center bg-blue-950 w-48 rounded-xl p-3">
            <img src="{{ asset($product->photo) }}" alt="{{$product->name}}" class="w-48 h-40 rounded-xl object-contain">     
            <div class="flex flex-col w-full text-white mt-3">
                <div class="flex justify-between items-center w-full">
                    <span class="ml-1 font-bold">{{ $product->name }}</span>
                    <span class="mr-1 text-right">${{ $product->price }}</span>  
                </div>
                <form action="/checkout" method="POST" onsubmit="return verificarCompra(event, {{ $product->announcer_id }})">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="quantity" value="1">
                    <div class="flex justify-between w-full mt-4">
                        <a href="{{ route('individual_page', $product->id) }}}" class="bg-blue-500 w-20 py-1 rounded-full text-xs font-bold text-center transition-transform duration-300 hover:scale-110">Visualizar</a>                         
                        <button type="submit" class="bg-blue-500 w-20 py-1 rounded-full text-xs font-bold text-center transition-transform duration-300 hover:scale-110">Comprar</button>
                    </div>
                </form>                
            </div>
        </div>
        @endforeach
    </div>
    <div class="flex justify-center m-8 w-full text-white">
    @if ($products->currentPage() > 1)
        <a href="{{ $products->previousPageUrl() }}" class="bg-blue-500 mx-1 px-3 py-1 rounded-xl">
            <
        </a>
    @endif

    @for ($i = 1; $i <= $products->lastPage(); $i++)
        <a href="{{ $products->url($i) }}" 
           class="mx-1 px-3 py-1 rounded-xl 
                  {{ $products->currentPage() == $i ? 'bg-blue-950 text-white' : 'bg-blue-500' }}">
            {{ $i }}
        </a>
    @endfor

    @if ($products->hasMorePages())
        <a href="{{ $products->nextPageUrl() }}" class="bg-blue-500 mx-1 px-3 py-1 rounded-xl">
            >
        </a>
    @endif
    </div>

</body>
<script>
    function verificarCompra(event, sellerId) {
        const userId = {{ auth()->id() ?? 'null' }}; 
        
        if (userId === sellerId) {
            event.preventDefault(); 
            alert("Você não pode comprar seu próprio produto!");
            return false;
        }
        return true;
    }
</script>
</html>
