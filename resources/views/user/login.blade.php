<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
</head>

<body>

    <form action="{{ route('user.login')}}" method="post">
        <script src="https://cdn.tailwindcss.com"></script>
        @csrf
        <div class="container mx-auto h-full flex flex-1 justify-center items-center mt-20">
            <div class="w-full max-w-lg">
                <div class="leading-loose">
                    <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                        <p class="font-bold text-lg text-center text-500 hover:text-purple-700">Login</p>

                        @if (session('erro'))
                        <div>
                            <div class="flex rounded-md bg-red-50 p-4 text-sm text-red-500" x-cloak x-show="showAlert" x-data="{ showAlert: true }" x-init="setTimeout(()=> showAlert = false, 5000)">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mr-3 h-5 w-5 flex-shrink-0">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                </svg>
                                <div><b>Erro: </b> {{ session('erro')}}</div>
                                <button class="ml-auto" x-on:click="showAlert = false">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                                        <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @endif

                        <div class="">
                            <label class="mt-2 inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-purple-700" for="username">Nome</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-purple-200 rounded" id="username" name="name" type="text" required="" placeholder="Nome" aria-label="username">
                        </div>
                        <div class="mt-2">
                            <label class="mt-2 inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-purple-700" for="password">Senha</label>
                            <input class="w-full px-5  py-1 text-gray-700 bg-purple-200 rounded" id="password" name="password" type="password" required="" placeholder="senha" aria-label=" password">
                        </div>
                        <div class="mt-4 items-center justify-between">
                            <input type="submit" value="Login" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                        </div>
                        <a class="mt-4 inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-purple-700" href="{{ route('user.create')}}">
                            Não é registrado?
                        </a>
                    </form>

                </div>
            </div>
        </div>


    </form>
</body>

</html>
