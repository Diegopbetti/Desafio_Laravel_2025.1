<body>
    <div id="delete-{{ $user->id }}" class="fixed inset-0 items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg w-42 shadow-lg">
            <h2 class="text-xl font-bold mb-4">Excluir Usuário</h2>
            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
                <div class="flex justify-between mt-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded transition-transform hover:scale-105">
                        Excluir
                    </button>
                    <button type="button" onclick="fecharModal('delete-{{ $user->id }}')" class="ml-2 text-gray-600 hover:underline">
                        Fechar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>