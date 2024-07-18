<?php if (isset($dette)): ?>

<?php else: ?>
    <p>Aucune dette trouvée.</p>
<?php endif; ?>

<main class="p-10 w-full" style="height: 70%;">
    <div class="bg-black text-white text-center font-bold text-2xl p-6 shadow rounded-t-3xl">
        <h1 class="text-2xl font-bold mb-3">Paiement d'une dette</h1>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md w-full h-full">
        <div>
            <div class="space-y-4">
                <div class="flex justify-between mb-3">
                    <div>
                        <label for="client" class="block mb-1">Client :</label>
                        <input type="text" id="client" name="client" class="border rounded p-2"
                            value="<?= htmlspecialchars($dette['prenom'] . ' ' . $dette['nom']); ?>" readonly>
                    </div>
                    <div>
                        <label for="tel" class="block mb-1">Téléphone :</label>
                        <input type="tel" id="tel" name="tel" class="border rounded p-2"
                            value="<?= htmlspecialchars($dette['telephone']); ?>" readonly>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="montant-total" class="block mb-1">Montant total :</label>
                    <input type="text" id="montant-total" name="montant-total" class="border rounded p-2 w-full"
                        value="<?= htmlspecialchars($dette['montantTotal']); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="montant-verse" class="block mb-1">Montant versé :</label>
                    <input type="text" id="montant-verse" name="montant-verse" class="border rounded p-2 w-full"
                        value="<?= htmlspecialchars($dette['montantVersé']); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="montant-restant" class="block mb-1">Montant restant :</label>
                    <input type="text" id="montant-restant" name="montant-restant" class="border rounded p-2 w-full"
                        value="<?= htmlspecialchars($dette['montantRestant']); ?>" readonly>
                </div>
                <div class="bg-white p-6 rounded-b-lg shadow-md w-full">
                    <form action="/ajouterPaiement" method="post" class="space-y-4">
                        <input type="hidden" name="detteID" value="<?= htmlspecialchars($dette['Id_dette']); ?>">
                        <div class="mb-3">
                            <label for="montant" class="block mb-1">Montant à verser :</label>
                            <input type="text" id="montant" name="montantVerse" class="border rounded p-2 w-full">
                        </div>
                        <div class="m-4 flex justify-between items-center">
                            <a type="button" href="/afficherDettes"
                                class="bg-blue-600 text-white px-6 py-4 rounded">RETOUR</a>
                            <button type="submit" class="bg-blue-600 text-white px-6 py-4 rounded mt-">PAYER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
