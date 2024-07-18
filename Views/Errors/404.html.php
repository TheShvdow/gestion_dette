<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arvo:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="page404.css">
    <title>404 - Page Not Found</title>
    <style>
        body {
            font-family: 'Arvo', serif;
        }

        .four_zero_four_bg {
            background-image: url('https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif');
            background-size: cover;
            background-position: center;
            height: 70vh;
        }

        .page_404 {
            padding: 40px 0;
            background: #fff;
            font-family: 'Arvo', serif;
            position: absolute;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 100%;
            z-index: 999;
        }

        .page_404 img {
            width: 100%;
            height: auto;
        }

        .four_zero_four_bg {

            background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
            height: 750px;
            background-position: center;
        }


        .four_zero_four_bg h1 {
            font-size: 80px;
        }

        .four_zero_four_bg h3 {
            font-size: 80px;
        }

        .link_404 {
            color: #fff !important;
            padding: 10px 20px;
            background: #39ac31;
            margin: 20px 0;
            display: inline-block;
        }

        .contant_box_404 {
            margin-top: -50px;
        }
    </style>
</head>

<body class="bg-gray-100 w-full h-full flex items-center justify-center h-screen">
    <section class="page_404 mx-auto p-3 bg-white rounded-lg shadow-lg text-center">
        <h1 class="text-8xl font-bold text-purple-800">404</h1>
        <div class="four_zero_four_bg flex items-center justify-center">
        </div>
        <div class="contant_box_404 mt-4 ">
            <h3 class="text-2xl font-semibold text-gray-800">On dirait que tu es perdu</h3>
            <p class="text-gray-600 font-bold">La page recherchée n'existe pas, veillez cliquez sur le button d'en bas
                pour retourner a la page d'acceuil</p>
            <a href="/"
                class="mt-6 inline-block px-6 py-3 bg-blue-600 text-white text-lg font-medium rounded-full hover:bg-blue-700 transition">Go
                to Home</a>
        </div>
    </section>
</body>

</html>