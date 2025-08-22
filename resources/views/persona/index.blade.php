<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Personas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Gestión de Personas</h1>
            <p class="text-gray-600">Administra el listado de personas registradas</p>
        </header>

        <!-- Card Container -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Card Header with Button -->
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-700">Lista de Personas</h2>
                <a href="{{route('persona.create')}}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg flex items-center transition-colors">
                    <i class="fas fa-plus mr-2"></i> Agregar Persona
                </a>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Apellido</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="personasList" class="bg-white divide-y divide-gray-200">
                        <!-- Los datos se cargarán aquí mediante JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal para agregar/editar persona -->
    <div id="modalPersona" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 id="modalTitle" class="text-xl font-semibold text-gray-700">Agregar Persona</h2>
            </div>
            <div class="px-6 py-4">
                <form id="personaForm">
                    <input type="hidden" id="personaId">
                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-700 text-sm font-medium mb-2">Nombre</label>
                        <input type="text" id="nombre" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="apellido" class="block text-gray-700 text-sm font-medium mb-2">Apellido</label>
                        <input type="text" id="apellido" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                        <input type="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </form>
            </div>
            <div class="px-6 py-4 border-t border-gray-200 flex justify-end space-x-3">
                <button id="btnCancelar" class="px-4 py-2 text-gray-700 border border-gray-300 rounded-md hover:bg-gray-100">Cancelar</button>
                <button id="btnGuardar" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Guardar</button>
            </div>
        </div>
    </div>

    <!-- Modal para ver persona -->
    <div id="modalVerPersona" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-700">Detalles de Persona</h2>
            </div>
            <div class="px-6 py-4">
                <div class="mb-4">
                    <p class="text-gray-600 text-sm font-medium">Nombre</p>
                    <p id="verNombre" class="text-gray-800"></p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-600 text-sm font-medium">Apellido</p>
                    <p id="verApellido" class="text-gray-800"></p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-600 text-sm font-medium">Email</p>
                    <p id="verEmail" class="text-gray-800"></p>
                </div>
            </div>
            <div class="px-6 py-4 border-t border-gray-200 flex justify-end">
                <button id="btnCerrarVer" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Cerrar</button>
            </div>
        </div>
    </div>

    <script>
        // Datos de ejemplo
        let personas = [
            { id: 1, nombre: "Juan", apellido: "Pérez", email: "juan.perez@example.com" },
            { id: 2, nombre: "María", apellido: "González", email: "maria.gonzalez@example.com" },
            { id: 3, nombre: "Carlos", apellido: "López", email: "carlos.lopez@example.com" }
        ];

        // Elementos del DOM
        const personasList = document.getElementById('personasList');
        const modalPersona = document.getElementById('modalPersona');
        const modalVerPersona = document.getElementById('modalVerPersona');
        const btnAgregar = document.getElementById('btnAgregar');
        const btnCancelar = document.getElementById('btnCancelar');
        const btnGuardar = document.getElementById('btnGuardar');
        const btnCerrarVer = document.getElementById('btnCerrarVer');
        const personaForm = document.getElementById('personaForm');
        const modalTitle = document.getElementById('modalTitle');

        // Cargar personas en la tabla
        function cargarPersonas() {
            personasList.innerHTML = '';
            personas.forEach(persona => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${persona.nombre}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${persona.apellido}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${persona.email}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button onclick="verPersona(${persona.id})" class="text-blue-600 hover:text-blue-900 mr-3">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button onclick="editarPersona(${persona.id})" class="text-green-600 hover:text-green-900 mr-3">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="eliminarPersona(${persona.id})" class="text-red-600 hover:text-red-900">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                `;
                personasList.appendChild(tr);
            });
        }

        // Ver persona
        window.verPersona = function(id) {
            const persona = personas.find(p => p.id === id);
            if (persona) {
                document.getElementById('verNombre').textContent = persona.nombre;
                document.getElementById('verApellido').textContent = persona.apellido;
                document.getElementById('verEmail').textContent = persona.email;
                modalVerPersona.classList.remove('hidden');
            }
        }

        // Editar persona
        window.editarPersona = function(id) {
            const persona = personas.find(p => p.id === id);
            if (persona) {
                document.getElementById('personaId').value = persona.id;
                document.getElementById('nombre').value = persona.nombre;
                document.getElementById('apellido').value = persona.apellido;
                document.getElementById('email').value = persona.email;
                modalTitle.textContent = 'Editar Persona';
                modalPersona.classList.remove('hidden');
            }
        }

        // Eliminar persona
        window.eliminarPersona = function(id) {
            if (confirm('¿Estás seguro de que quieres eliminar esta persona?')) {
                personas = personas.filter(p => p.id !== id);
                cargarPersonas();
            }
        }

        // Agregar nueva persona
        btnAgregar.addEventListener('click', () => {
            personaForm.reset();
            document.getElementById('personaId').value = '';
            modalTitle.textContent = 'Agregar Persona';
            modalPersona.classList.remove('hidden');
        });

        // Guardar persona (nueva o editada)
        btnGuardar.addEventListener('click', () => {
            const id = document.getElementById('personaId').value;
            const nombre = document.getElementById('nombre').value;
            const apellido = document.getElementById('apellido').value;
            const email = document.getElementById('email').value;

            if (nombre && apellido && email) {
                if (id) {
                    // Editar persona existente
                    const index = personas.findIndex(p => p.id == id);
                    if (index !== -1) {
                        personas[index] = { id: parseInt(id), nombre, apellido, email };
                    }
                } else {
                    // Agregar nueva persona
                    const newId = personas.length > 0 ? Math.max(...personas.map(p => p.id)) + 1 : 1;
                    personas.push({ id: newId, nombre, apellido, email });
                }
                
                cargarPersonas();
                modalPersona.classList.add('hidden');
            } else {
                alert('Por favor, completa todos los campos.');
            }
        });

        // Cancelar edición/agregado
        btnCancelar.addEventListener('click', () => {
            modalPersona.classList.add('hidden');
        });

        // Cerrar modal de ver
        btnCerrarVer.addEventListener('click', () => {
            modalVerPersona.classList.add('hidden');
        });

        // Cargar datos iniciales
        cargarPersonas();
    </script>
</body>
</html>