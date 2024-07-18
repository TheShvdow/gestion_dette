<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi Dette</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-gradient {
            background: linear-gradient(135deg, #FFFFFF 25%, #F3F4F6 25%, #F3F4F6 50%, #FFFFFF 50%, #FFFFFF 75%, #F3F4F6 75%, #F3F4F6 100%);
            background-size: 56.57px 56.57px;
        }
    </style>
</head>

<body class=" bg-orange-100 flex-1 items-center justify-center h-screen relative">
    <!-- Company Logo and Name -->
    <div class="p-5 h-24 w-full border bg-white relative">
        <div class="absolute top-0 left-0 ml-6 m-4 flex items-center">
            <!-- <img src="/var/www/gestion_dette/public/uploads/My _first_design.png" alt="Logo"> -->
            <!-- Remplacez "logo.png" par le chemin de votre logo -->
            <h1 class="text-2xl font-bold">Suivi Dette</h1>
        </div>
        <!-- Sign Up Button -->
        <div class="absolute top-0 right-0 m-4 pt-4 flex-1">
            <a href="/suivieEtEnregistrer" class=" text-lg font-semibold text-black p-3 rounded-lg w-16 mr-5">Home</a>
            <a href="/" class="text-lg text-black p-3 font-semibold rounded-lg w-16 mr-5">Dette</a>
            <a href="/afficherDettes" class="text-lg font-semibold text-black p-3 rounded-lg w-16 mr-5">Details Dette</a>
        </div>
    </div>