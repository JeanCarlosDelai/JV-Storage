<!DOCTYPE html>
<html x-data="data()" lang="en">

<head>
    <title>STORAGE</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- Favicon -->
    <link rel="apple-touch-icon" href="favicon.ico" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <div class="flex h-screen bg-gray-100 " :class="{ 'overflow-hidden': isSideMenuOpen }">

        <!-- Desktop sidebar -->
        <aside class="z-20 flex-shrink-0 hidden w-60 pl-2 overflow-y-auto bg-gray-800 md:block">
            <div>
                <div class="text-white">
                    <div class="flex p-4  bg-gray-800">
                        <div class="mx-6 flex py-3 px-2 items-center">
                            <img src="{{ asset('logo32.png') }}" alt="Logo">
                            <p class="ml-2"> STORAGE</p>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <div class="">
                            <img class="hidden h-24 w-24 rounded-full sm:block object-cover mr-2 border-4 border-purple-700" src="https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg" alt="">
                            <p class="font-bold text-base  text-white pt-2 text-center w-24">{{ Auth::user()->name ?? 'Não Autenticado'}}</p>
                        </div>
                    </div>

                    <div>
                        <ul class="mt-6 leading-10">
                            <li class="relative px-2 py-1">
                                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 cursor-pointer {{ request()->routeIs('documents.todos') ? 'text-purple-500' : 'text-white hover:text-purple-500' }}" href="{{ route('documents.todos') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    <span class="ml-4 uppercase">Inicial</span>
                                </a>
                            </li>
                            <li class="relative px-2 py-1">
                                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 cursor-pointer {{ request()->routeIs('upload') ? 'text-purple-500' : 'text-white hover:text-purple-500' }}" href="{{ route('upload') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M20 13L20 18C20 19.1046 19.1046 20 18 20L6 20C4.89543 20 4 19.1046 4 18L4 13" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        <path d="M16 8L12 4M12 4L8 8M12 4L12 16" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    </svg>
                                    <span class="ml-4 uppercase">Adicionar Novo Documento</span>
                                </a>
                            </li>
                            <li class="relative px-2 py-1">
                                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 cursor-pointer {{ request()->routeIs('documents') ? 'text-purple-500' : 'text-white hover:text-purple-500' }}" href="{{ route('documents') }}">
                                    <svg width="25px" height="25px" viewBox="0 0 48 48" class="h-6 w-6" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <style>
                                                .a {
                                                    fill: none;
                                                    stroke-width: 3;
                                                    stroke-linecap: round;
                                                    stroke-linejoin: round;
                                                }

                                            </style>
                                        </defs>
                                        <path class="a" d="M10.3635,4.51A1.9944,1.9944,0,0,0,8.4189,6.5043V41.5056A1.9945,1.9945,0,0,0,10.3635,43.5H37.5867a1.9944,1.9944,0,0,0,1.9944-1.9944V14.4719H31.6036a1.9945,1.9945,0,0,1-1.9446-1.9944V4.5Z" />
                                        <line class="a" x1="29.5693" y1="4.51" x2="39.5312" y2="14.4719" />
                                        <line class="a" x1="15.838" y1="22.928" x2="32.1121" y2="22.928" />
                                        <line class="a" x1="15.838" y1="34.994" x2="32.1121" y2="34.994" />
                                        <line class="a" x1="15.838" y1="28.961" x2="32.1121" y2="28.961" />
                                    </svg>
                                    <span class="ml-3 uppercase">Meus Documentos</span>
                                </a>
                            </li>
                            <li class="relative px-2 py-1">
                                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 cursor-pointer {{ request()->routeIs('documents.shared') ? 'text-purple-500' : 'text-white hover:text-purple-500' }}" href="{{ route('documents.shared') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M8.68439 10.6578L15.3124 7.34378M15.3156 16.6578L8.69379 13.3469M21 6C21 7.65685 19.6569 9 18 9C16.3431 9 15 7.65685 15 6C15 4.34315 16.3431 3 18 3C19.6569 3 21 4.34315 21 6ZM9 12C9 13.6569 7.65685 15 6 15C4.34315 15 3 13.6569 3 12C3 10.3431 4.34315 9 6 9C7.65685 9 9 10.3431 9 12ZM21 18C21 19.6569 19.6569 21 18 21C16.3431 21 15 19.6569 15 18C15 16.3431 16.3431 15 18 15C19.6569 15 21 16.3431 21 18Z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    </svg>
                                    <span class="ml-4 uppercase">Compartilhados Comigo</span>
                                </a>
                            </li>
                        </ul>
                    </div>



                </div>
            </div>
        </aside>

        <!-- Mobile sidebar -->
        <!-- Backdrop -->
        <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
        <div class="flex flex-col flex-1 w-full overflow-y-auto">
            <header class="z-40 py-4  bg-gray-100 ">
                <div class="flex items-center justify-end h-8 px-6 mx-auto">

                    <!-- Mobile hamburger -->
                    <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </button>
                    <ul class="flex items-center flex-shrink-0 space-x-6">

                        <!-- Profile menu -->
                        <li class="relative">
                            <button class="p-2 bg-white text-purple-400 align-middle rounded-full hover:text-white hover:bg-purple-700 focus:outline-none " @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account" aria-haspopup="true">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                            </button>
                            <template x-if="isProfileMenuOpen">
                                <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-purple-400 border border-purple-700 rounded-md shadow-md" aria-label="submenu">
                                    <!-- Profile menu -->
                                    {{-- <li class="flex">
                                        <a class=" text-white inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>Perfil</span>
                                        </a>
                                    </li> --}}
                                    <li class="flex">
                                        <a class="text-white inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800" href="{{ route('user.logout')}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            <span>Deslogar</span>
                                        </a>
                                    </li>
                                </ul>
                            </template>
                        </li>

                    </ul>

                </div>
            </header>

            <main class="bg-gray-100">
                <div class="grid mb-4 pb-10 px-8  bg-gray-100 ">

                    <div class="grid grid-cols-12 gap-6">
                        <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
                            <div class="col-span-12 mt-8">
                                <div class="flex items-center h-10 intro-y">
                                    <h2 class="mr-5 text-lg font-medium truncate">@yield('title')</h2>
                                </div>

                            </div>
                            <div class="col-span-12 mt-5">

                                @if (session('sucesso'))
                                <div>
                                    <div class="flex rounded-md bg-green-50 p-4 text-sm text-green-500" x-cloak x-show="showAlert" x-data="{ showAlert: true }" x-init="setTimeout(()=> showAlert = false, 5000)">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mr-3 h-5 w-5 flex-shrink-0">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                        </svg>
                                        <div><b>Successo</b> {{ session('sucesso')}}</div>
                                        <button class="ml-auto" x-on:click="showAlert = false">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                                                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                @endif

                                @if (session('erro'))
                                <div>
                                    <div class="flex rounded-md bg-red-50 p-4 text-sm text-red-500" x-cloak x-show="showAlert" x-data="{ showAlert: true }" x-init="setTimeout(()=> showAlert = false, 5000)">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mr-3 h-5 w-5 flex-shrink-0">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                        </svg>
                                        <div><b>Erro</b> {{ session('erro')}}</div>
                                        <button class="ml-auto" x-on:click="showAlert = false">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                                                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                @endif


                                @yield('content')
                            </div>

                        </div>
                    </div>
                </div>
            </main>


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        function data() {

            return {

                isSideMenuOpen: false
                , toggleSideMenu() {
                    this.isSideMenuOpen = !this.isSideMenuOpen
                }
                , closeSideMenu() {
                    this.isSideMenuOpen = false
                }
                , isNotificationsMenuOpen: false
                , toggleNotificationsMenu() {
                    this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
                }
                , closeNotificationsMenu() {
                    this.isNotificationsMenuOpen = false
                }
                , isProfileMenuOpen: false
                , toggleProfileMenu() {
                    this.isProfileMenuOpen = !this.isProfileMenuOpen
                }
                , closeProfileMenu() {
                    this.isProfileMenuOpen = false
                }
                , isPagesMenuOpen: false
                , togglePagesMenu() {
                    this.isPagesMenuOpen = !this.isPagesMenuOpen
                },

            }
        }

    </script>


</body>

</html>
