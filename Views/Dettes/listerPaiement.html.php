<main class="p-10 w-full mt-20 h-3/4">
    <div class="bg-blue-500 text-white text-center font-bold text-2xl p-6 shadow rounded-t-3xl">
        <h1 class="text-2xl font-bold mb-6 text-center">Liste des paiements d'une dette</h1>
    </div>
    <div class="w-full h-auto mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between mb-6">
            <div>
                <span class="font-semibold">Client :</span>
                <span
                    class="border-b border-gray-400 ml-2 pb-1"><?= htmlspecialchars($dette->prenom . ' ' . $dette->nom); ?></span>
            </div>
            <div>
                <span class="font-semibold">Montant versé :</span>
                <span class="border-b border-gray-400 ml-2 pb-1"><?= htmlspecialchars($dette->montantVerser); ?></span>
            </div>
            <div>
                <span class="font-semibold">Montant restant :</span>
                <span class="border-b border-gray-400 ml-2 pb-1"><?= htmlspecialchars($dette->montantRestant); ?></span>
            </div>
        </div>

        <table class="w-full mb-6">
            <thead class="bg-gray-700 text-white">
                <tr>
                    <th class="p-2 text-left w-1/2 text-center">Date</th>
                    <th class="p-2 text-left w-1/2 text-center">Montant</th>
                </tr>
            </thead>
            <tbody class="bg-gray-600 text-white">
                <?php if (!empty($paiements)): ?>
                    <?php foreach ($paiements as $paiement): ?>
                        <tr>
                            <td class="p-2 border-t border-gray-500 text-center"><?= htmlspecialchars($paiement->date); ?></td>
                            <td class="p-2 border-t border-gray-500 text-center"><?= htmlspecialchars($paiement->montant); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2" class="p-2 border-t border-gray-500 text-center">Aucun paiement trouvé pour cette
                            dette.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="text-right">
            <span class="font-semibold">Montant Total :</span>
            <span class="border-b border-gray-400 ml-2 pb-1"><?= htmlspecialchars($dette->montantGlobale); ?></span>
        </div>
        <a href="/afficherDettes/" class="bg-blue-600 text-white px-6 py-4 rounded mt-">RETOUR</a>
    </div>
</main>