<main class="p-10 w-full mt-20">
    <div class="bg-blue-500 text-white text-center font-bold text-2xl p-6 shadow rounded-t-3xl">
        <h1 class="text-3xl font-bold uppercase">liste des dettes</h1>
    </div>
    <div class="bg-blue-500 text-white p-4 border border-black-t shadow">
        <div class="w-full lg:w-3/4 xl:w-full">
            <div class="bg-blue-100 shadow-md rounded-lg p-6">
                <div class="w-full flex justify-around">
                    <h2 class="text-2xl font-bold text-black mb-4 uppercase">
                        client:<?php echo $approvisionnement['prenom']; ?> <?php echo $approvisionnement['nom']; ?></h2>
                    <h2 class="text-2xl font-bold text-black mb-4 uppercase">
                        téléphone:<?php echo $approvisionnement['telephone']; ?></h2>
                </div>
                <form action="/list" method="post" class="mb-4">
                    <div class="flex space-x-4">
                        <div>
                            <label for="date" class="block text-sm font-medium text-black w-60">Statut :</label>
                            <select name="MontantDettes" id="MontantDettes"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-black">
                                <option value="Soldées"> ---------- FILTRER PAR DETTES ---------- </option>
                                <option value="Soldées">MONTANTS SOLDÉES</option>
                                <option value="NonSoldées">MONTANTS NON SOLDÉES</option>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Filtrer</button>
                        </div>
                    </div>
                </form>
                <div class="overflow-x-auto ">
                    <table class="table-auto w-full text-left border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-blue-300 text-black">
                                <th class="p-2 border border-gray-300 text-center">Date</th>
                                <th class="p-2 border border-gray-300 text-center">Montant</th>
                                <th class="p-2 border border-gray-300 text-center">Restant</th>
                                <th class="p-2 border border-gray-300 text-center">Paiement</th>
                                <th class="p-2 border border-gray-300 text-center">List</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($approvisionnements as $approvisionnement): ?>
                                <tr>
                                    <td class="p-2 border border-gray-300 text-black text-center">
                                        <?php echo $approvisionnement['nom']; ?>
                                        <?php echo $approvisionnement['prenom']; ?>
                                    </td>
                                    <td class="p-2 border border-gray-300 text-black text-center">
                                        <?php echo $approvisionnement['telephone']; ?>
                                    </td>
                                    <td class="p-2 border border-gray-300 text-black text-center">
                                        <?php echo $approvisionnement['date']; ?>
                                    </td>
                                    <td class="p-2 border border-gray-300 text-black text-center">
                                        <a href="?action=details&id=<?= htmlspecialchars($approvisionnement['id']) ?>"
                                            class="text-blue-500">Details Paiement</a>
                                    </td>
                                    <td class="p-2 border border-gray-300 text-black text-center">
                                        <a href="?action=details&id=<?= htmlspecialchars($approvisionnement['id']) ?>"
                                            class="text-blue-500">Détails List</a>
                                    </td>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 flex justify-between">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo ($page - 1); ?>" class="text-blue-500 hover:text-blue-700">Page
                            précédente</a>
                    <?php endif; ?>

                    <?php if ($page < $totalPages): ?>
                        <a href="?page=<?php echo ($page + 1); ?>" class="text-blue-500 hover:text-blue-700">Page
                            suivante</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>