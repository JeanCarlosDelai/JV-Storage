<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JV STORAGE</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex flex-row justify-center h-screen">
        <div class="text-center">
            <div class="mx-6 flex py-3 px-2 items-center">
                <img src="{{ asset('logo32.png') }}" alt="Logo">
                <p class="ml-2"> STORAGE</p>
            </div>
        </div>
        <div class="mt-20">
            <h3 class="text-2xl font-bold text-gray-800 mt-10">Seja bem-vindo!</h3>
            <h3 class="text-2xl font-bold text-gray-800 mt-10">Deseja adicionar alguns documentos e compartilhar com os seus amigos?</h3>

            <a class="mt-4 inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-blue-800" href="{{ route('user.login')}}">
                -> Entre e desfrute do site!
            </a>
        </div>
        <div class="flex items-center">
            <img src="{{ asset('welcome.svg') }}" alt="Imagem de Página não encontrada" class="w-100 h-100 text-gray-100">
        </div>
    </div>
</body>
</html>
