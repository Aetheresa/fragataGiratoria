<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center">
            Gestión de Productos
        </h2>
    </x-slot>

    <div class="py-8 max-w-6xl mx-auto">
        <div class="mb-4 flex justify-end">
            <a href="{{ route('productos.create') }}" class="btn-agregar px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                + Agregar Producto
            </a>
        </div>

        <table class="table-auto w-full border-collapse border border-gray-300 shadow-md">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Nombre</th>
                    <th class="border px-4 py-2">Descripción</th>
                    <th class="border px-4 py-2">Precio</th>
                    <th class="border px-4 py-2">Stock</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productos as $producto)
                    <tr class="text-center">
                        <td class="border px-4 py-2">{{ $producto->id_producto }}</td>
                        <td class="border px-4 py-2">{{ $producto->nombre }}</td>
                        <td class="border px-4 py-2">{{ $producto->descripcion }}</td>
                        <td class="border px-4 py-2">${{ number_format($producto->precio ?? 0, 2) }}</td>
                        <td class="border px-4 py-2">{{ $producto->stock ?? 0 }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('productos.edit', $producto->id_producto) }}" 
                               class="btn px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">✏️ Editar</a>
                            
                            <form action="{{ route('productos.destroy', $producto->id_producto) }}" 
                                  method="POST" 
                                  style="display:inline"
                                  onsubmit="return confirm('¿Seguro de borrar este producto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                    🗑️ Borrar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                </thead>
                    <tr>
                        <td colspan="6" class="border px-4 py-2 text-center text-gray-500">
                            No hay productos registrados
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Paginación --}}
        <div class="mt-4">
            {{ $productos->links() }}
        </div>
    </div>
</x-app-layout>
