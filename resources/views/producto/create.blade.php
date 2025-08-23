<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-2xl bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Crear Nuevo Producto</h1>
        
        <form class="space-y-4">
            <!-- Nombre del Producto -->
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre del Producto</label>
                <input 
                    type="text" 
                    id="nombre" 
                    name="nombre" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Ingrese el nombre del producto"
                    required
                >
            </div>
            
            <!-- Descripción -->
            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                <textarea 
                    id="descripcion" 
                    name="descripcion" 
                    rows="3"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Describa el producto"
                    required
                ></textarea>
            </div>
            
            <!-- Precio y Stock -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="precio" class="block text-sm font-medium text-gray-700 mb-1">Precio ($)</label>
                    <input 
                        type="number" 
                        id="precio" 
                        name="precio" 
                        min="0" 
                        step="0.01"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="0.00"
                        required
                    >
                </div>
                
                <div>
                    <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">Stock Disponible</label>
                    <input 
                        type="number" 
                        id="stock" 
                        name="stock" 
                        min="0"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="0"
                        required
                    >
                </div>
            </div>
            
            <!-- Categoría -->
            <div>
                <label for="categoria" class="block text-sm font-medium text-gray-700 mb-1">Categoría</label>
                <select 
                    id="categoria" 
                    name="categoria"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
                    <option value="" disabled selected>Seleccione una categoría</option>
                    <option value="electronica">Electrónica</option>
                    <option value="ropa">Ropa</option>
                    <option value="hogar">Hogar</option>
                    <option value="deportes">Deportes</option>
                    <option value="otros">Otros</option>
                </select>
            </div>
            
            <!-- Imagen del Producto -->
            <div>
                <label for="imagen" class="block text-sm font-medium text-gray-700 mb-1">Imagen del Producto</label>
                <input 
                    type="file" 
                    id="imagen" 
                    name="imagen" 
                    accept="image/*"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                <p class="text-xs text-gray-500 mt-1">Formatos aceptados: JPG, PNG, GIF. Tamaño máximo: 5MB</p>
            </div>
            
            <!-- Estado del Producto -->
            <div>
                <p class="block text-sm font-medium text-gray-700 mb-1">Estado del Producto</p>
                <div class="flex items-center space-x-4">
                    <label class="flex items-center">
                        <input type="radio" name="estado" value="disponible" class="text-blue-600 focus:ring-blue-500" checked>
                        <span class="ml-2 text-gray-700">Disponible</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="estado" value="agotado" class="text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-gray-700">Agotado</span>
                    </label>
                </div>
            </div>
            
            <!-- Checkbox de Envío Gratis -->
            <div class="flex items-center">
                <input 
                    type="checkbox" 
                    id="envio_gratis" 
                    name="envio_gratis"
                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                >
                <label for="envio_gratis" class="ml-2 block text-sm text-gray-700">¿Ofrecer envío gratis?</label>
            </div>
            
            <!-- Botones de Acción -->
            <div class="flex justify-end space-x-3 pt-4">
                <button 
                    type="reset" 
                    class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    Limpiar
                </button>
                <button 
                    type="submit" 
                    class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    Crear Producto
                </button>
            </div>
        </form>
    </div>
</body>
</html>