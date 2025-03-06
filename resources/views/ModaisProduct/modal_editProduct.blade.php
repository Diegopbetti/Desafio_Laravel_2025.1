<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @foreach ($products as $product)      
    <div id="edit-{{ $product->id }}" class="fixed inset-0 items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg w-1/3 shadow-lg">
            <h2 class="text-xl font-bold mb-4">Editar Produto</h2>
            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Define o método como PUT -->
                <div class="mb-2 flex justify-between items-center">
                    <div class="flex items-center">
                        <input type="file" name="photo" placeholder="Photo" class="border p-2 w-full mb-2 rounded">
                        <img src="{{ asset($product->photo) }}" alt="Foto do produto" class="w-12 h-12 rounded-full object-cover ml-4">
                    </div>
                </div>
                <input type="text" name="name" placeholder="Name" class="border p-2 w-full mb-2 rounded" value="{{ $product->name }}" required>
                <div class="flex">
                    <input type="text" name="category" placeholder="Category" class="border p-2 w-1/2 mb-2 rounded" value="{{ $product->category }}" required>
                    <input type="number" name="price" placeholder="Price" class="border p-2 w-1/2 mb-2 rounded" min="0" value="{{ $product->price }}" required>
                </div>
                <textarea name="description" placeholder="Description" class="border p-2 h-24 w-full mb-2 rounded resize-none" required>{{ $product->description }}</textarea>
                <div class="flex justify-end mt-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded transition-transform hover:scale-105">
                        Editar
                    </button>
                    <button type="button" onclick="fecharModal('edit-{{ $product->id }}')" class="ml-2 text-gray-600 hover:underline">
                        Fechar
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
</body>
</html>