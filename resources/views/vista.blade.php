<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barra de Navegación</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Barra de navegación -->
    <nav class="bg-blue-600 shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-white font-bold text-xl">Sistema de Gestión</span>
                </div>
                
                <!-- Menú para desktop -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{route('persona.index')}}" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Gestionar Persona</a>
                    <a href="{{route('producto.index')}}" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Gestionar Producto</a>
                    <a href="{{route('venta.index')}}" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Gestionar Venta</a>
                </div>
                
                <!-- Botón para mobile -->
                <div class="md:hidden flex items-center">
                    <button id="menu-btn" class="text-white focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Menú para mobile -->
        <div id="mobile-menu" class="md:hidden hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#" class="text-white hover:bg-blue-700 block px-3 py-2 rounded-md text-base font-medium">Gestionar Persona</a>
                <a href="#" class="text-white hover:bg-blue-700 block px-3 py-2 rounded-md text-base font-medium">Gestionar Producto</a>
                <a href="#" class="text-white hover:bg-blue-700 block px-3 py-2 rounded-md text-base font-medium">Gestionar Venta</a>
            </div>
        </div>
    </nav>

    <!-- Contenido de ejemplo -->
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Bienvenido al Sistema</h1>
        <p class="text-gray-600">Selecciona una opción del menú para comenzar a gestionar.</p>
    </div>

    <script>
        // Funcionalidad para el menú móvil
        document.getElementById('menu-btn').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>