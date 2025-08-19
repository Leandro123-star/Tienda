<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ventas</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <h1 class="bg-red-700">PELICULAS DIGITALES</h1>
    <div class="flex flex-col gap-2.5 w-[400px]">
        <h1>FORMULARIO DE REGISTRO</h1>
        <div>
            <label for=""> Nombre </label> 
            <input  placeholder="Ingrese su nombre" class="border to-black" type="text">
        </div>
        <div>
            <label for="">Apellido</label>
            <input placeholder="Ingrese su apellido" class="border to-black p-1" type="text">
        </div>

        <div>
            <label for=""> CI</label>
            <input placeholder="Ingrese su ci" class="border to-black" type="number">
        </div>

        <div>
            <label for="">Numero de Celular</label>
            <input class="border to-black" type="number">
        </div>

        <div>
            <label for="">Correo</label>
            <input class="border to-black" type="email">
        </div>

        <div>
            <label for="">Fecha de nacimiento</label>
            <input class="border to-black" type="date">
        </div>

        <button class="bg-blue-400">Enviar</button>
    </div>
    <div class="bg-black">
        <h1 class="text-white"> PELICULAS DISPONIBLES</h1>
        <img src="https://pics.filmaffinity.com/Vigilante_Serie_de_TV-448702964-large.jpg" alt="">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/52/Spider-Man.jpg/330px-Spider-Man.jpg" alt="2da imagen">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFtu-Lvt6rCTzShQ57K_TpH64-OJIaMBaGkQ&s" alt="Pareja explosiva">
    </div>

</body>
</html>