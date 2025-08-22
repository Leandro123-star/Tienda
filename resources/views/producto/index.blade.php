<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
            min-height: 100vh;
        }
        
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .product-card {
            transition: all 0.3s ease;
        }
        
        .product-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        
        .btn-primary {
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(59, 130, 246, 0.3);
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <header class="mb-8 text-center">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Gestión de Productos</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Administra tu inventario de productos de manera eficiente. Agrega, visualiza y gestiona todos tus productos en un solo lugar.</p>
        </header>

        <!-- Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl p-6 shadow-sm card">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-boxes text-blue-500 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">128</h3>
                        <p class="text-gray-600 text-sm">Productos totales</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-sm card">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-check-circle text-green-500 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">96</h3>
                        <p class="text-gray-600 text-sm">Disponibles</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-sm card">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-times-circle text-red-500 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">32</h3>
                        <p class="text-gray-600 text-sm">Agotados</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <!-- Card Header with Button -->
            <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-700 mb-4 sm:mb-0">Lista de Productos</h2>
                <a href="{{route('producto.create')}}" class="btn-primary bg-blue-500 hover:bg-blue-600 text-white font-medium py-3 px-5 rounded-lg flex items-center">
                    <i class="fas fa-plus-circle mr-2"></i> Agregar Producto
                </a>
            </div>

            <!-- Products Grid -->
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="productosGrid">
                    <!-- Product Cards will be added here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para agregar/editar producto -->
    <div id="modalProducto" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-50 px-4">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-md">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 id="modalTitle" class="text-xl font-semibold text-gray-700">Agregar Producto</h2>
            </div>
            <div class="px-6 py-4">
                <form id="productoForm">
                    <input type="hidden" id="productoId">
                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-700 text-sm font-medium mb-2">Nombre del Producto</label>
                        <input type="text" id="nombre" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ej: Laptop HP Pavilion" required>
                    </div>
                    <div class="mb-4">
                        <label for="categoria" class="block text-gray-700 text-sm font-medium mb-2">Categoría</label>
                        <select id="categoria" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">Seleccione una categoría</option>
                            <option value="electronica">Electrónica</option>
                            <option value="ropa">Ropa</option>
                            <option value="hogar">Hogar</option>
                            <option value="deportes">Deportes</option>
                            <option value="libros">Libros</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="precio" class="block text-gray-700 text-sm font-medium mb-2">Precio ($)</label>
                        <input type="number" id="precio" step="0.01" min="0" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ej: 299.99" required>
                    </div>
                    <div class="mb-4">
                        <label for="stock" class="block text-gray-700 text-sm font-medium mb-2">Stock</label>
                        <input type="number" id="stock" min="0" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ej: 50" required>
                    </div>
                    <div class="mb-4">
                        <label for="descripcion" class="block text-gray-700 text-sm font-medium mb-2">Descripción</label>
                        <textarea id="descripcion" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Descripción del producto"></textarea>
                    </div>
                </form>
            </div>
            <div class="px-6 py-4 border-t border-gray-200 flex justify-end space-x-3">
                <button id="btnCancelar" class="px-5 py-2 text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors">Cancelar</button>
                <button id="btnGuardar" class="px-5 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">Guardar Producto</button>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transform transition-transform duration-300 translate-y-20 flex items-center">
        <i class="fas fa-check-circle mr-2"></i>
        <span id="toastMessage">Producto agregado con éxito</span>
    </div>

    <script>
        // Datos de ejemplo
        let productos = [
            { id: 1, nombre: "Laptop HP Pavilion", categoria: "electronica", precio: 899.99, stock: 15, descripcion: "Laptop con procesador Intel i5, 8GB RAM, 512GB SSD" },
            { id: 2, nombre: "Smartphone Samsung Galaxy", categoria: "electronica", precio: 699.99, stock: 0, descripcion: "Teléfono inteligente con pantalla AMOLED de 6.5 pulgadas" },
            { id: 3, nombre: "Zapatillas Deportivas", categoria: "deportes", precio: 89.99, stock: 42, descripcion: "Zapatillas ligeras para running y entrenamiento" },
            { id: 4, nombre: "Auriculares Inalámbricos", categoria: "electronica", precio: 129.99, stock: 28, descripcion: "Auriculares con cancelación de ruido y 20h de batería" },
            { id: 5, nombre: "Libro de Cocina", categoria: "libros", precio: 24.99, stock: 19, descripcion: "Recetas gourmet para principiantes y expertos" },
            { id: 6, nombre: "Juego de Sábanas", categoria: "hogar", precio: 49.99, stock: 0, descripcion: "Juego de sábanas de algodón egipcio, tamaño queen" }
        ];

        // Elementos del DOM
        const productosGrid = document.getElementById('productosGrid');
        const modalProducto = document.getElementById('modalProducto');
        const btnAgregar = document.getElementById('btnAgregar');
        const btnCancelar = document.getElementById('btnCancelar');
        const btnGuardar = document.getElementById('btnGuardar');
        const productoForm = document.getElementById('productoForm');
        const modalTitle = document.getElementById('modalTitle');
        const toast = document.getElementById('toast');
        const toastMessage = document.getElementById('toastMessage');

        // Categorías con iconos
        const categorias = {
            electronica: { nombre: "Electrónica", icono: "fa-microchip", color: "blue" },
            ropa: { nombre: "Ropa", icono: "fa-tshirt", color: "pink" },
            hogar: { nombre: "Hogar", icono: "fa-home", color: "yellow" },
            deportes: { nombre: "Deportes", icono: "fa-running", color: "green" },
            libros: { nombre: "Libros", icono: "fa-book", color: "purple" }
        };

        // Cargar productos en la cuadrícula
        function cargarProductos() {
            productosGrid.innerHTML = '';
            productos.forEach(producto => {
                const categoriaInfo = categorias[producto.categoria] || { nombre: "General", icono: "fa-box", color: "gray" };
                const card = document.createElement('div');
                card.className = `product-card bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-md transition-all duration-300`;
                card.innerHTML = `
                    <div class="p-5">
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-10 h-10 bg-${categoriaInfo.color}-100 rounded-lg flex items-center justify-center">
                                <i class="fas ${categoriaInfo.icono} text-${categoriaInfo.color}-500"></i>
                            </div>
                            <span class="px-3 py-1 text-xs font-medium rounded-full ${producto.stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}">
                                ${producto.stock > 0 ? 'Disponible' : 'Agotado'}
                            </span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">${producto.nombre}</h3>
                        <p class="text-gray-600 text-sm mb-4">${producto.descripcion}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-gray-800">$${producto.precio.toFixed(2)}</span>
                            <span class="text-sm text-gray-500">Stock: ${producto.stock}</span>
                        </div>
                    </div>
                `;
                productosGrid.appendChild(card);
            });
        }

        // Mostrar toast de notificación
        function showToast(message, type = 'success') {
            toastMessage.textContent = message;
            
            if (type === 'error') {
                toast.classList.remove('bg-green-500');
                toast.classList.add('bg-red-500');
            } else {
                toast.classList.remove('bg-red-500');
                toast.classList.add('bg-green-500');
            }
            
            toast.classList.remove('translate-y-20');
            
            setTimeout(() => {
                toast.classList.add('translate-y-20');
            }, 3000);
        }

        // Agregar nuevo producto
        btnAgregar.addEventListener('click', () => {
            productoForm.reset();
            document.getElementById('productoId').value = '';
            modalTitle.textContent = 'Agregar Producto';
            modalProducto.classList.remove('hidden');
        });

        // Guardar producto (nuevo o editado)
        btnGuardar.addEventListener('click', () => {
            const id = document.getElementById('productoId').value;
            const nombre = document.getElementById('nombre').value;
            const categoria = document.getElementById('categoria').value;
            const precio = parseFloat(document.getElementById('precio').value);
            const stock = parseInt(document.getElementById('stock').value);
            const descripcion = document.getElementById('descripcion').value;

            if (nombre && categoria && !isNaN(precio) && !isNaN(stock)) {
                if (id) {
                    // Editar producto existente
                    const index = productos.findIndex(p => p.id == id);
                    if (index !== -1) {
                        productos[index] = { id: parseInt(id), nombre, categoria, precio, stock, descripcion };
                        showToast('Producto actualizado con éxito');
                    }
                } else {
                    // Agregar nuevo producto
                    const newId = productos.length > 0 ? Math.max(...productos.map(p => p.id)) + 1 : 1;
                    productos.push({ id: newId, nombre, categoria, precio, stock, descripcion });
                    showToast('Producto agregado con éxito');
                }
                
                cargarProductos();
                modalProducto.classList.add('hidden');
            } else {
                showToast('Por favor complete todos los campos correctamente', 'error');
            }
        });

        // Cancelar edición/agregado
        btnCancelar.addEventListener('click', () => {
            modalProducto.classList.add('hidden');
        });

        // Cargar datos iniciales
        cargarProductos();
    </script>
</body>
</html>