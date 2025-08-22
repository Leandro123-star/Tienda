<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Personas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(120deg, #f0f9ff 0%, #cbebff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
        .input-field:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Card Container -->
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl card">
            <div class="p-8">
                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-plus text-blue-500 text-2xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800">Registro de Persona</h2>
                    <p class="text-gray-600 mt-2">Complete el formulario para registrar una nueva persona</p>
                </div>

                <!-- Form -->
                <form id="registroForm" class="space-y-6">
                    <!-- Nombre -->
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input type="text" id="nombre" class="input-field pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Ingrese su nombre" required>
                        </div>
                        <p class="mt-1 text-xs text-red-500 hidden" id="nombreError">Por favor ingrese un nombre válido</p>
                    </div>

                    <!-- Apellido -->
                    <div>
                        <label for="apellido" class="block text-sm font-medium text-gray-700 mb-1">Apellido</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user-tag text-gray-400"></i>
                            </div>
                            <input type="text" id="apellido" class="input-field pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Ingrese su apellido" required>
                        </div>
                        <p class="mt-1 text-xs text-red-500 hidden" id="apellidoError">Por favor ingrese un apellido válido</p>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" id="email" class="input-field pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Ingrese su email" required>
                        </div>
                        <p class="mt-1 text-xs text-red-500 hidden" id="emailError">Por favor ingrese un email válido</p>
                    </div>

                    <!-- Botones -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <button type="reset" class="flex-1 px-4 py-3 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200 transition-colors flex items-center justify-center">
                            <i class="fas fa-redo-alt mr-2"></i> Limpiar
                        </button>
                        <button type="submit" class="flex-1 px-4 py-3 bg-blue-500 text-white rounded-lg font-medium hover:bg-blue-600 transition-colors flex items-center justify-center">
                            <i class="fas fa-save mr-2"></i> Registrar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Toast de éxito -->
        <div id="toast" class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transform transition-transform duration-300 translate-y-20">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                <span id="toastMessage">Persona registrada con éxito</span>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('registroForm');
            const toast = document.getElementById('toast');
            
            // Validación en tiempo real
            const nombreInput = document.getElementById('nombre');
            const apellidoInput = document.getElementById('apellido');
            const emailInput = document.getElementById('email');
            
            nombreInput.addEventListener('input', function() {
                validateNombre();
            });
            
            apellidoInput.addEventListener('input', function() {
                validateApellido();
            });
            
            emailInput.addEventListener('input', function() {
                validateEmail();
            });
            
            // Envío del formulario
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const isNombreValid = validateNombre();
                const isApellidoValid = validateApellido();
                const isEmailValid = validateEmail();
                
                if (isNombreValid && isApellidoValid && isEmailValid) {
                    // Simular envío exitoso
                    showToast('Persona registrada con éxito');
                    form.reset();
                } else {
                    showToast('Por favor complete correctamente todos los campos', 'error');
                }
            });
            
            // Funciones de validación
            function validateNombre() {
                const nombreError = document.getElementById('nombreError');
                if (nombreInput.value.trim().length < 2) {
                    nombreError.classList.remove('hidden');
                    nombreInput.classList.add('border-red-500');
                    return false;
                } else {
                    nombreError.classList.add('hidden');
                    nombreInput.classList.remove('border-red-500');
                    return true;
                }
            }
            
            function validateApellido() {
                const apellidoError = document.getElementById('apellidoError');
                if (apellidoInput.value.trim().length < 2) {
                    apellidoError.classList.remove('hidden');
                    apellidoInput.classList.add('border-red-500');
                    return false;
                } else {
                    apellidoError.classList.add('hidden');
                    apellidoInput.classList.remove('border-red-500');
                    return true;
                }
            }
            
            function validateEmail() {
                const emailError = document.getElementById('emailError');
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(emailInput.value)) {
                    emailError.classList.remove('hidden');
                    emailInput.classList.add('border-red-500');
                    return false;
                } else {
                    emailError.classList.add('hidden');
                    emailInput.classList.remove('border-red-500');
                    return true;
                }
            }
            
            function showToast(message, type = 'success') {
                const toastMessage = document.getElementById('toastMessage');
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
        });
    </script>
</body>
</html>