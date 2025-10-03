<!-- resources/views/components/usuarios.blade.php -->
<div>
    <h3 class="text-xl font-semibold">Usuarios Registrados</h3>
    <table class="min-w-full mt-4 bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="px-6 py-3 border-b">ID</th>
                <th class="px-6 py-3 border-b">Nombre</th>
                <th class="px-6 py-3 border-b">Correo electrónico</th>
                <th class="px-6 py-3 border-b">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="px-6 py-4 border-b">{{ $user->id }}</td>
                    <td class="px-6 py-4 border-b">{{ $user->name }}</td>
                    <td class="px-6 py-4 border-b">{{ $user->email }}</td>
                    <td class="px-6 py-4 border-b">
                        <!-- Aquí puedes agregar botones de acción como Editar o Eliminar -->
                        <a href="#" class="text-blue-600">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
