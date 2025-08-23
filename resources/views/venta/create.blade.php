<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Ventas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-4xl bg-white rounded-xl shadow-2xl overflow-hidden">
        <!-- Encabezado -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold"><i class="fas fa-cash-register mr-2"></i>Registro de Ventas</h1>
                    <p class="text-blue-100 mt-1">Complete el formulario para registrar una nueva venta</p>
                </div>
                <div class="bg-white/20 p-3 rounded-full">
                    <i class="fas fa-shopping-cart text-2xl"></i>
                </div>
            </div>
        </div>

        <form class="p-6 space-y-6">
            <!-- Información de la venta -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Fecha y Hora -->
                <div>
                    <label for="fecha" class="block text-sm font-medium text-gray-700 mb-1">Fecha de Venta</label>
                    <div class="relative">
                        <input 
                            type="date" 
                            id="fecha" 
                            name="fecha" 
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required
                        >
                        <i class="fas fa-calendar absolute right-3 top-3 text-gray-400"></i>
                    </div>
                </div>
                
                <div>
                    <label for="hora" class="block text-sm font-medium text-gray-700 mb-1">Hora de Venta</label>
                    <div class="relative">
                        <input 
                            type="time" 
                            id="hora" 
                            name="hora" 
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required
                        >
                        <i class="fas fa-clock absolute right-3 top-3 text-gray-400"></i>
                    </div>
                </div>
            </div>

            <!-- Información del cliente -->
            <div class="border-t border-b border-gray-200 py-5">
                <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-user-circle mr-2 text-blue-600"></i>Información del Cliente
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="cliente" class="block text-sm font-medium text-gray-700 mb-1">Nombre del Cliente</label>
                        <div class="relative">
                            <input 
                                type="text" 
                                id="cliente" 
                                name="cliente" 
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Nombre completo del cliente"
                                required
                            >
                            <i class="fas fa-user absolute right-3 top-3 text-gray-400"></i>
                        </div>
                    </div>
                    
                    <div>
                        <label for="documento" class="block text-sm font-medium text-gray-700 mb-1">N° Documento</label>
                        <div class="relative">
                            <input 
                                type="text" 
                                id="documento" 
                                name="documento" 
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="DNI, RUC, etc."
                            >
                            <i class="fas fa-id-card absolute right-3 top-3 text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detalles de productos -->
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-boxes mr-2 text-blue-600"></i>Detalles de Productos
                </h2>
                
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <!-- Producto 1 -->
                    <div class="grid grid-cols-12 gap-4 mb-4">
                        <div class="col-span-12 md:col-span-5">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Producto</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option selected>Seleccione un producto</option>
                                <option>Laptop HP Pavilion 15</option>
                                <option>iPhone 13 Pro Max 256GB</option>
                                <option>Samsung Galaxy S22 Ultra</option>
                                <option>Monitor LG 24" IPS</option>
                                <option>Teclado Mecánico Redragon</option>
                            </select>
                        </div>
                        <div class="col-span-4 md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Cantidad</label>
                            <input type="number" min="1" value="1" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="col-span-4 md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Precio Unit.</label>
                            <input type="number" step="0.01" min="0" placeholder="0.00" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="col-span-4 md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Subtotal</label>
                            <input type="text" value="$0.00" readonly class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-lg font-semibold">
                        </div>
                        <div class="col-span-12 md:col-span-1 flex items-end">
                            <button type="button" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash-alt text-lg"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Botón para agregar más productos -->
                    <button type="button" class="flex items-center text-blue-600 hover:text-blue-800 mt-2">
                        <i class="fas fa-plus-circle mr-2"></i>Agregar otro producto
                    </button>
                </div>
            </div>

            <!-- Resumen de pago -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-blue-50 p-5 rounded-lg border border-blue-100">
                <div>
                    <label for="metodo" class="block text-sm font-medium text-gray-700 mb-1">Método de Pago</label>
                    <select id="metodo" class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option>Efectivo</option>
                        <option>Tarjeta de Crédito</option>
                        <option>Tarjeta de Débito</option>
                        <option>Transferencia Bancaria</option>
                        <option>Yape / Plin</option>
                    </select>
                </div>
                
                <div>
                    <label for="descuento" class="block text-sm font-medium text-gray-700 mb-1">Descuento</label>
                    <div class="relative">
                        <input 
                            type="number" 
                            id="descuento" 
                            step="0.01" 
                            min="0" 
                            placeholder="0.00" 
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        >
                        <span class="absolute right-3 top-3 text-gray-500">%</span>
                    </div>
                </div>
                
                <div class="bg-white p-4 rounded border border-gray-200">
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-600">Subtotal:</span>
                        <span class="font-medium">$0.00</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-600">Descuento:</span>
                        <span class="font-medium text-red-600">-$0.00</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-600">IGV (18%):</span>
                        <span class="font-medium">$0.00</span>
                    </div>
                    <div class="flex justify-between font-bold text-lg pt-2 border-t border-gray-200">
                        <span class="text-gray-800">Total:</span>
                        <span class="text-blue-700">$0.00</span>
                    </div>
                </div>
            </div>

            <!-- Botones de acción -->
            <div class="flex flex-col-reverse md:flex-row justify-between gap-4 pt-4">
                <button type="button" class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium flex items-center justify-center">
                    <i class="fas fa-times-circle mr-2"></i> Cancelar
                </button>
                
                <div class="flex flex-col md:flex-row gap-3">
                    <button type="button" class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium flex items-center justify-center">
                        <i class="fas fa-receipt mr-2"></i> Generar Recibo
                    </button>
                    <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium flex items-center justify-center">
                        <i class="fas fa-check-circle mr-2"></i> Registrar Venta
                    </button>
                </div>
            </div>
        </form>
        
        <!-- Pie de página -->
        <div class="bg-gray-100 p-4 text-center text-sm text-gray-500 border-t border-gray-200">
            <p>Sistema de Ventas © 2023 - Todos los derechos reservados</p>
        </div>
    </div>
</body>
</html>