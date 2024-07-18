<main class="p-10 w-full mt-20 h-3/4">
    <div class="bg-blue-500 text-white text-center font-bold text-2xl p-2 shadow rounded-t-3xl">
        <h1 class="text-2xl font-bold mb-6">Enregistrer une nouvelle dette</h1>
    </div>
    <div class="w-full h-4/5 mx-auto bg-white p-8 rounded-lg shadow-md" style="height: 98%">
        <form>
            <div class="mb-6">
                <label for="client" class="block mb-2">Client :</label>
                <input type="text" id="client" class="w-full p-3 border rounded">
            </div>

            <div class="mb-6">
                <label for="tel" class="block mb-2">Tel :</label>
                <input type="tel" id="tel" class="w-full p-3 border rounded">
            </div>

            <div class="mb-4">
                <label for="ref" class="block mb-2">REF</label>
                <div class="flex">
                    <input type="text" id="ref" class="flex-grow p-3 border rounded-l">
                    <button type="button" class="bg-blue-500 text-white px-4 rounded-r">OK</button>
                </div>
            </div>

            <div class="flex mb-6 space-x-4">
                <div class="flex-1">
                    <label for="libelle" class="block mb-2">Libellé</label>
                    <input type="text" id="libelle" class="w-full p-3 border rounded">
                </div>
                <div class="flex-1">
                    <label for="prix" class="block mb-2">Prix</label>
                    <input type="number" id="prix" class="w-full p-3 border rounded">
                </div>
                <div class="flex-1">
                    <label for="quantite" class="block mb-2">Quantité</label>
                    <input type="number" id="quantite" class="w-full p-3 border rounded">
                </div>
                <div class="flex items-end">
                    <button type="button" class="bg-blue-500 text-white px-4 py-4 rounded">OK</button>
                </div>
            </div>

            <table class="w-full mb-6">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-2 text-left text-center">Article</th>
                        <th class="p-2 text-left text-center">Prix</th>
                        <th class="p-2 text-left text-center">Quantité</th>
                        <th class="p-2 text-left text-center">Montant</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

            <div class="text-right mb-2">
                <span class="font-bold">Total : </span>
                <span id="total">0.00</span>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded">ENREGISTRER</button>
        </form>
    </div>
</main>