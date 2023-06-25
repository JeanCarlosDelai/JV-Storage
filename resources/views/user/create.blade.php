<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
</head>

<body>

    <form action="{{ route('user.create')}}" method="post">
        <script src="https://cdn.tailwindcss.com"></script>
        @csrf
        <div class="container mx-auto h-full flex flex-1 justify-center items-center mt-20">
            <div class="w-full max-w-lg">
                <div class="leading-loose">
                    <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                        <p class="text-gray-800 font-medium text-center text-lg font-bold">Registrar-se</p>
                        <div class="">
                            <label class="block text-sm text-gray-00" for="username">Nome</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="username" name="name" type="text" required="" placeholder="Nome" aria-label="username">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="password">Email</label>
                            <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="password" name="email" type="email" required="" placeholder="Email" aria-label="email">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="password">Senha</label>
                            <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="password" required="" placeholder="senha" aria-label=" password">
                        </div>
                        <div class="mt-4 items-center justify-between">
                            <input type="submit" value="Registrar" class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">
                        </div>
                        <a class="inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-blue-800" href="{{ route('user.login')}}">
                            Já é registrado?
                        </a>
                    </form>

                </div>
            </div>
        </div>


    </form>
</body>

</html>
