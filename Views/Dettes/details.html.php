
                           

<main class="p-10 w-full mt-20 h-3/4">
    <div class="bg-black text-white text-center font-bold text-2xl p-4 border-black border shadow rounded-t-3xl">
        <h2 class="text-2xl font-bold mb-4">Liste des dettes</h2>
    </div>
    <div class="bg-white p-6 rounded-b-lg shadow-md w-full">
        <form action="/afficherDettes" method="post" class="mb-4">
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
        <table class="w-full">
            <thead>
                <tr class="bg-gray-200">
                   
                    <th class="p-4 border-black border text-left text-center">Montant Global</th>
                    <th class="p-4 border-black border text-left text-center">Montant Versé</th>
                    <th class="p-4 border-black border text-left text-center">Montant Restant</th>
                    <th class="p-4 border-black border text-left text-center">Date</th>
                    <th class="p-4 border-black border text-left text-center">paiements</th>
                    <th class="p-4 border-black border text-left text-center">Voir paiements</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($dettes)): 
                  
                //   echo "pre";
                //   var_dump($dettes);
                //   echo "</pre>";
                  
                                 
                    ?>
                    <?php foreach ($dettes as $dette): 
                        ?>
                        <tr>
                            <td class="p-4 border-black border text-center">
                                <?= htmlspecialchars($dette['montantTotal']); ?> <!-- j'ai ajouter les point d'interrogation pour initialise si c'est NULL -->
                            </td>
                            <td class="p-4 border-black border text-center">
                                <?= htmlspecialchars($dette['montantVersé']); ?>
                            </td>
                            <td class="p-4 border-black border text-center">
                                <?= htmlspecialchars($dette['montantRestant']); ?>
                            </td>
                            <td class="p-4 border-black border text-center">
                                <?= htmlspecialchars($dette['dateEnregistrement']); ?>
                            </td>
                            <td class="p-4 border-black border text-center">
                                <a href="/nouveauPaiement/<?= htmlspecialchars($dette['id_dette']); ?>"
                                class="text-2xl bg-blue-600 text-white p-1 rounded mt-1">Payer</a>
                            </td>

                            <td class="p-4 border-black border text-center">
                                <a href="/detailPaiement/<?= htmlspecialchars($dette['id_dette']); ?>"
                                    class="text-2xl bg-blue-600 text-white p-1 rounded mt-1">Details</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="p-4 border-black border text-center">Aucune dette trouvée pour ce client.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>