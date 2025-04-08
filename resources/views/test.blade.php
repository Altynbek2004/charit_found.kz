<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Приют Амиго</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#d1e5ee] text-black font-sans">

<!-- Top bar -->
<div class="flex justify-between items-center px-4 py-2 text-sm bg-[#d1e5ee]">
    <div>+7 775 593 88 08 &nbsp; email</div>
    <div class="flex space-x-2">
        <img src="icon-1.png" alt="icon1" class="w-5 h-5" />
        <img src="icon-2.png" alt="icon2" class="w-5 h-5" />
        <img src="icon-3.png" alt="icon3" class="w-5 h-5" />
    </div>
</div>

<!-- Navbar -->
<div class="flex justify-between items-center px-6 py-4 bg-white">
    <div class="flex items-center gap-2">
        <img src="logo.png" alt="ADOPTLY Logo" class="w-8 h-8" />
        <span class="font-bold">ADOPTLY</span>
    </div>
    <div class="space-x-6 font-semibold">
        <a href="#">Главная</a>
        <a href="#">О нас</a>
        <a href="#">Питомцы</a>
        <a href="#">Чат-помощник</a>
    </div>
    <div class="space-x-4 text-sm">
        <span>RU</span>
        <a href="#" class="font-medium">Войти</a>
    </div>
</div>

<!-- Banner -->
<div class="flex justify-center my-6">
    <img src="pets-banner.jpg" alt="Pets" class="w-[600px] h-auto border-4 border-blue-400" />
</div>

<!-- Title -->
<h1 class="text-2xl font-bold text-center mb-6">Приют “Амиго”</h1>

<!-- Content block -->
<div class="flex flex-col md:flex-row justify-center items-center px-4 md:px-20 gap-10 mb-10">
    <!-- Left: Image -->
    <img src="amigo-logo.jpg" alt="Амого логотип" class="w-64 h-64 object-contain" />

    <!-- Right: Description -->
    <div>
        <p class="text-lg font-semibold leading-relaxed">описание<br />описание<br />описание<br />описание<br />описание</p>
    </div>
</div>

<!-- Arrow & Donate -->
<div class="flex justify-center items-center gap-10 mb-10">
    <button class="text-3xl">&#8594;</button>
    <button class="bg-[#c6e6fb] px-6 py-2 rounded font-bold text-sm hover:bg-blue-300 transition">
        Сделать пожертвование
    </button>
</div>

<!-- Dots -->
<div class="flex justify-center space-x-2 mb-6">
    <div class="w-2 h-2 bg-gray-500 rounded-full"></div>
    <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
</div>

</body>
</html>
