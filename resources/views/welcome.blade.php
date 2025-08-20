<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ventas</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="flex items-center justify-center">
    <div class="w-[400px] space-y-10 bg-black">
        <div class="bg-blue-400 text-amber-50 flex items-center justify-center p-5">
            <h1>PELICULAS DIGITALES</h1>
        </div>
        <div class="flex flex-col gap-2.5 text-amber-50 p-10">
            <h1>FORMULARIO DE REGISTRO</h1>
            <div>
                <label for=""> Nombre </label>
                <div>
                    <input placeholder="Ingrese su nombre" class="border to-black" type="text">
                </div>
            </div>
            <div>
                <label for="">Apellido</label>
                <div>
                    <input placeholder="Ingrese su apellido" class="border to-black p-1" type="text">
                </div>
            </div>

            <div>
                <label for=""> CI</label>
                <div>
                    <input placeholder="Ingrese su ci" class="border to-black" type="number">
                </div>
            </div>

            <div>
                <label for="">Numero de Celular</label>
                <input placeholder="Ingrese su número de celular" class="border to-black" type="number">
            </div>

            <div>
                <label for="">Correo</label>
                <div>
                    <input placeholder="Ingrese su correo electrónico" class="border to-black" type="email">
                </div>
            </div>

            <div>
                <label for="">Fecha de nacimiento</label>
                <div>
                    <input class="border to-black" type="date">
                </div>
            </div>

            <button class="bg-blue-400">Enviar</button>
        </div>

        <div class="bg-blue-400 text-amber-50 flex items-center justify-center p-5">
            <h1> PELICULAS DISPONIBLES</h1>
        </div>
        <div class="bg-black p-10 flex flex-col gap-50">
            <img class="h-90 object-cover" src="https://pics.filmaffinity.com/Vigilante_Serie_de_TV-448702964-large.jpg" alt="">
            <img class="h-90 object-cover"
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/52/Spider-Man.jpg/330px-Spider-Man.jpg"
                alt="2da imagen">
            <img class="h-90 object-cover" src="https://images.justwatch.com/poster/327088665/s718/shrek.jpg"
                alt="Shrek">
        </div>
    </div>
    </div>
</body>

</html>
