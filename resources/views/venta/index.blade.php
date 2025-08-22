<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Ventas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(120deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
        }
        
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .sale-card {
            transition: all 0.3s ease;
        }
        
        .sale-card:hover {
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
        
        .status-badge {
            font-size: 0.75rem;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <header class="mb-8 text-center">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Gestión de Ventas</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Administra y realiza un seguimiento de todas tus ventas. Registra nuevas transacciones y consulta el historial de ventas.</p>
        </header>

        <!-- Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl p-6 shadow-sm card">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-shopping-cart text-blue-500 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">142</h3>
                        <p class="text-gray-600 text-sm">Ventas totales</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-sm card">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-check-circle text-green-500 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">$12,458</h3>
                        <p class="text-gray-600 text-sm">Ingresos totales</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-sm card">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-users text-purple-500 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">87</h3>
                        <p class="text-gray-600 text-sm">Clientes únicos</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-sm card">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-chart-line text-yellow-500 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">$142.50</h3>
                        <p class="text-gray-600 text-sm">Venta promedio</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-8">
            <!-- Card Header with Button -->
            <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-700 mb-4 sm:mb-0">Historial de Ventas</h2>
                <button id="btnAgregar" class="btn-primary bg-blue-500 hover:bg-blue-600 text-white font-medium py-3 px-5 rounded-lg flex items-center">
                    <i class="fas fa-plus-circle mr-2"></i> Nueva Venta
                </button>
            </div>

            <!-- Sales Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Venta</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Productos</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="ventasList" class="bg-white divide-y divide-gray-200">
                        <!-- Los datos se cargarán aquí mediante JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Sales -->
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Ventas Recientes</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Sales Cards will be added here -->
        </div>
    </div>

    <!-- Modal para agregar/editar venta -->
    <div id="modalVenta" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-50 px-4">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 id="modalTitle" class="text-xl font-semibold text-gray-700">Registrar Nueva Venta</h2>
            </div>
            <div class="px-6 py-4">
                <form id="ventaForm">
                    <input type="hidden" id="ventaId">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="cliente" class="block text-gray-700 text-sm font-medium mb-2">Cliente</label>
                            <select id="cliente" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="">Seleccione un cliente</option>
                                <option value="1">Juan Pérez</option>
                                <option value="2">María García</option>
                                <option value="3">Carlos López</option>
                                <option value="4">Ana Martínez</option>
                            </select>
                        </div>
                        <div>
                            <label for="fecha" class="block text-gray-700 text-sm font-medium mb-2">Fecha</label>
                            <input type="date" id="fecha" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-medium mb-2">Productos</label>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex items-center mb-4">
                                <select id="productoSelect" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 mr-2">
                                    <option value="">Seleccione un producto</option>
                                    <option value="1">Laptop HP Pavilion - $899.99</option>
                                    <option value="2">Smartphone Samsung - $699.99</option>
                                    <option value="3">Auriculares Inalámbricos - $129.99</option>
                                    <option value="4">Zapatillas Deportivas - $89.99</option>
                                </select>
                                <input type="number" id="cantidad" min="1" value="1" class="w-20 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 mr-2" placeholder="Cant.">
                                <a href="{{route('venta.create')}}" class="bg-blue-500 text-white px-3 py-2 rounded-lg hover:bg-blue-600">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                            
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Producto</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Precio</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Cantidad</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Subtotal</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="productosVenta">
                                    <!-- Productos agregados a la venta -->
                                </tbody>
                                <tfoot>
                                    <tr class="border-t border-gray-200">
                                        <td colspan="3" class="px-4 py-3 text-right font-medium text-gray-700">Total:</td>
                                        <td id="totalVenta" class="px-4 py-3 font-bold text-gray-800">$0.00</td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="estado" class="block text-gray-700 text-sm font-medium mb-2">Estado</label>
                        <select id="estado" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="completada">Completada</option>
                            <option value="pendiente">Pendiente</option>
                            <option value="cancelada">Cancelada</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="px-6 py-4 border-t border-gray-200 flex justify-end space-x-3">
                <button id="btnCancelar" class="px-5 py-2 text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors">Cancelar</button>
                <button id="btnGuardar" class="px-5 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">Guardar Venta</button>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transform transition-transform duration-300 translate-y-20 flex items-center">
        <i class="fas fa-check-circle mr-2"></i>
        <span id="toastMessage">Venta registrada con éxito</span>
    </div>

    <script>
        // Datos de ejemplo
        let ventas = [
            { id: 1001, cliente: "Juan Pérez", fecha: "2023-05-15", productos: "Laptop HP Pavilion", total: 899.99, estado: "completada" },
            { id: 1002, cliente: "María García", fecha: "2023-05-16", productos: "Smartphone Samsung, Auriculares", total: 829.98, estado: "completada" },
            { id: 1003, cliente: "Carlos López", fecha: "2023-05-17", productos: "Zapatillas Deportivas", total: 89.99, estado: "pendiente" },
            { id: 1004, cliente: "Ana Martínez", fecha: "2023-05-18", productos: "Auriculares Inalámbricos", total: 129.99, estado: "completada" },
            { id: 1005, cliente: "Pedro Rodríguez", fecha: "2023-05-19", productos: "Laptop HP Pavilion, Auriculares", total: 1029.98, estado: "cancelada" }
        ];

        // Productos disponibles
        const productos = [
            { id: 1, nombre: "Laptop HP Pavilion", precio: 899.99 },
            { id: 2, nombre: "Smartphone Samsung", precio: 699.99 },
            { id: 3, nombre: "Auriculares Inalámbricos", precio: 129.99 },
            { id: 4, nombre: "Zapatillas Deportivas", precio: 89.99 }
        ];

        // Elementos del DOM
        const ventasList = document.getElementById('ventasList');
        const modalVenta = document.getElementById('modalVenta');
        const btnAgregar = document.getElementById('btnAgregar');
        const btnCancelar = document.getElementById('btnCancelar');
        const btnGuardar = document.getElementById('btnGuardar');
        const ventaForm = document.getElementById('ventaForm');
        const modalTitle = document.getElementById('modalTitle');
        const toast = document.getElementById('toast');
        const toastMessage = document.getElementById('toastMessage');
        const productosVenta = document.getElementById('productosVenta');
        const totalVenta = document.getElementById('totalVenta');
        const btnAgregarProducto = document.getElementById('btnAgregarProducto');
        const productoSelect = document.getElementById('productoSelect');
        const cantidadInput = document.getElementById('cantidad');

        // Productos en la venta actual
        let productosEnVenta = [];

        // Cargar ventas en la tabla
        function cargarVentas() {
            ventasList.innerHTML = '';
            ventas.forEach(venta => {
                const tr = document.createElement('tr');
                
                // Determinar clase de estado
                let estadoClase = '';
                let estadoTexto = '';
                switch(venta.estado) {
                    case 'completada':
                        estadoClase = 'bg-green-100 text-green-800';
                        estadoTexto = 'Completada';
                        break;
                    case 'pendiente':
                        estadoClase = 'bg-yellow-100 text-yellow-800';
                        estadoTexto = 'Pendiente';
                        break;
                    case 'cancelada':
                        estadoClase = 'bg-red-100 text-red-800';
                        estadoTexto = 'Cancelada';
                        break;
                }
                
                tr.innerHTML = `
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-700">#${venta.id}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${venta.cliente}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${new Date(venta.fecha).toLocaleDateString()}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">${venta.productos}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-800">$${venta.total.toFixed(2)}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="status-badge ${estadoClase}">${estadoTexto}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button class="text-blue-600 hover:text-blue-900 mr-3">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="text-green-600 hover:text-green-900 mr-3">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="text-red-600 hover:text-red-900">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                `;
                ventasList.appendChild(tr);
            });
        }

        // Actualizar total de la venta
        function actualizarTotal() {
            const total = productosEnVenta.reduce((sum, producto) => sum + (producto.precio * producto.cantidad), 0);
            totalVenta.textContent = `$${total.toFixed(2)}`;
        }

        // Agregar producto a la venta
        btnAgregarProducto.addEventListener('click', () => {
            const productoId = productoSelect.value;
            const cantidad = parseInt(cantidadInput.value) || 1;
            
            if (!productoId) {
                showToast('Seleccione un producto', 'error');
                return;
            }
            
            const producto = productos.find(p => p.id == productoId);
            if (producto) {
                // Verificar si el producto ya está en la venta
                const existente = productosEnVenta.findIndex(p => p.id == productoId);
                
                if (existente >= 0) {
                    // Actualizar cantidad si ya existe
                    productosEnVenta[existente].cantidad += cantidad;
                } else {
                    // Agregar nuevo producto
                    productosEnVenta.push({
                        id: producto.id,
                        nombre: producto.nombre,
                        precio: producto.precio,
                        cantidad: cantidad
                    });
                }
                
                // Actualizar la tabla de productos
                actualizarTablaProductos();
                actualizarTotal();
                
                // Resetear selección
                productoSelect.value = '';
                cantidadInput.value = '1';
            }
        });

        // Actualizar tabla de productos en la venta
        function actualizarTablaProductos() {
            productosVenta.innerHTML = '';
            
            productosEnVenta.forEach((producto, index) => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td class="px-4 py-2 text-sm text-gray-700">${producto.nombre}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">$${producto.precio.toFixed(2)}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">${producto.cantidad}</td>
                    <td class="px-4 py-2 text-sm font-medium text-gray-700">$${(producto.precio * producto.cantidad).toFixed(2)}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">
                        <button class="text-red-500 hover:text-red-700 remove-product" data-index="${index}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                `;
                productosVenta.appendChild(tr);
            });
            
            // Agregar event listeners a los botones de eliminar
            document.querySelectorAll('.remove-product').forEach(button => {
                button.addEventListener('click', (e) => {
                    const index = parseInt(e.currentTarget.getAttribute('data-index'));
                    productosEnVenta.splice(index, 1);
                    actualizarTablaProductos();
                    actualizarTotal();
                });
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

        // Agregar nueva venta
        btnAgregar.addEventListener('click', () => {
            ventaForm.reset();
            document.getElementById('ventaId').value = '';
            document.getElementById('fecha').value = new Date().toISOString().split('T')[0];
            productosEnVenta = [];
            actualizarTablaProductos();
            actualizarTotal();
            modalTitle.textContent = 'Registrar Nueva Venta';
            modalVenta.classList.remove('hidden');
        });

        // Guardar venta
        btnGuardar.addEventListener('click', () => {
            const clienteSelect = document.getElementById('cliente');
            const clienteText = clienteSelect.options[clienteSelect.selectedIndex].text;
            const fecha = document.getElementById('fecha').value;
            const estado = document.getElementById('estado').value;
            
            if (!clienteSelect.value || !fecha || productosEnVenta.length === 0) {
                showToast('Complete todos los campos y agregue productos', 'error');
                return;
            }
            
            // Calcular total
            const total = productosEnVenta.reduce((sum, producto) => sum + (producto.precio * producto.cantidad), 0);
            
            // Lista de productos
            const listaProductos = productosEnVenta.map(p => p.nombre).join(', ');
            
            // Crear nueva venta
            const nuevaVenta = {
                id: ventas.length > 0 ? Math.max(...ventas.map(v => v.id)) + 1 : 1001,
                cliente: clienteText,
                fecha: fecha,
                productos: listaProductos,
                total: total,
                estado: estado
            };
            
            ventas.push(nuevaVenta);
            cargarVentas();
            modalVenta.classList.add('hidden');
            showToast('Venta registrada con éxito');
        });

        // Cancelar
        btnCancelar.addEventListener('click', () => {
            modalVenta.classList.add('hidden');
        });

        // Cargar datos iniciales
        cargarVentas();
        
        // Establecer fecha actual por defecto
        document.getElementById('fecha').value = new Date().toISOString().split('T')[0];
    </script>
</body>
</html>