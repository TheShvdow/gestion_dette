<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .bg-gradient {
            background: linear-gradient(135deg, #FFFFFF 25%, #F3F4F6 25%, #F3F4F6 50%, #FFFFFF 50%, #FFFFFF 75%, #F3F4F6 75%, #F3F4F6 100%);
            background-size: 56.57px 56.57px;
        }
    </style>
</head>

<body class="bg-gradient flex items-center justify-center h-screen relative">
    <!-- Login Form Container -->
    <div class="relative bg-white p-8 rounded-lg shadow-lg w-full max-w-md mx-auto fade-in">
        <div class="flex items-center justify-center mb-4">
            <img class="w-20 h-20 rounded-full" src="GP_MONDE.webp" alt="Profile">
        </div>
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold">Veillez vous connecter</h1>
        </div>
        <form method="post" action="/login" class="space-y-6">
            <?php if (!empty($errorMessage)): ?>
                <span class="bg-red-200 w-full px-10 py-2 rounded-xl text-red-500"><?= $errorMessage ?></span>
            <?php endif; ?>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">E-mail professionnel</label>
                <input type="email" id="email" name="email" required
                    class="mt-1 block w-full px-10 py-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                <?php if (!empty($errorEmail)): ?>
                    <span class="bg-red-200 w-full px-10 py-2 rounded-xl mt:
                     text-red-500"><?= $errorEmail ?></span>
                <?php endif; ?>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 block w-full px-10 py-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                <div class="text-right mt-2">
                    <a href="#" class="text-sm text-blue-500 hover:underline">Mot de passe oublié ?</a>
                </div>
            </div>
            <div>
                <button type="submit"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">Se
                    connecter</button>
            </div>

        </form>
    </div>
    <footer class="absolute w-full h-20 px-10 bg-blue-600 bottom-0 text-white">
        <div class="flex flex-col md:flex-row justify-between mb-2">
            <div>
                <h2 class="text-lg font-bold">Email : contact@entreprise.com </h2>
            </div>
            <div>
                <h2 class="text-lg font-bold">Contact : 01 23 45 67 89</h2>

            </div>
        </div>
        <div class="flex flex-col md:flex-row justify-between">
            <div class="flex">
                <h2 class="text-lg font-bold">Adresse : 123 Rue Exemple, Ville, Pays</h2>

            </div>
            <div>
                <h2 class="text-lg font-bold"><a href="index.php" class="text-white underline">En savoir plus</a></h2>
            </div>
        </div>
    </footer>
</body>

</html>