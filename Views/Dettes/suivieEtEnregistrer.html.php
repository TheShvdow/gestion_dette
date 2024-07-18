

<div class="p-4 w-full h-4/5">
    <div class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4 h-full shadow-lg">
        <!-- Nouveau Client -->
        <div class="w-full lg:w-1/2 bg-white p-6 rounded-lg shadow h-full border-4 gap-4">
            <form method="post" action="/enregistrer" enctype="multipart/form-data" style="height:90%">
                <fieldset class="border p-5 text-xl font-bold mb-2 gap-10 flex flex-col">
                    <legend>Nouveau Client</legend>
                    <input type="hidden" name="action" value="enregistrer">
                    <div class="mb-3">
                        <input type="text" name="nom" id="nom" class="w-full p-2 border-2 rounded" placeholder=" Nom"
                            value="<?= isset($validatedData['nom']) ? htmlspecialchars($validatedData['nom']) : '' ?>">
                        <?php if (!empty($errors['nom'])): ?>
                            <p class="text-red-500 text-xs italic"><?= $errors['nom'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="prenom" id="prenom" class="w-full p-2 border-2 rounded" placeholder="Prénom"
                            value="<?= isset($validatedData['prenom']) ? htmlspecialchars($validatedData['prenom']) : '' ?>">
                        <?php if (!empty($errors['prenom'])): ?>
                            <p class="text-red-500 text-xs italic"><?= $errors['prenom'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="email" id="email" class="w-full p-2 border-2 rounded" placeholder="Email"
                            value="<?= isset($validatedData['email']) ? htmlspecialchars($validatedData['email']) : '' ?>">
                        <?php if (!empty($errors['email'])): ?>
                            <p class="text-red-500 text-xs italic"><?= $errors['email'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        
                        <input type="text" name="telephone" id="telephone" class="w-full p-2 border-2 rounded" placeholder="Telephone"
                            value="<?= isset($validatedData['telephone']) ? htmlspecialchars($validatedData['telephone']) : '' ?>">
                        <?php if (!empty($errors['telephone'])): ?>
                            <p class="text-red-500 text-xs italic"><?= $errors['telephone'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        
                        <input type="text" name="adresse" id="adresse" class="w-full p-2 border-2 rounded" placeholder="Adresse"
                            value="<?= isset($validatedData['adresse']) ? htmlspecialchars($validatedData['adresse']) : '' ?>">
                        <?php if (!empty($errors['adresse'])): ?>
                            <p class="text-red-500 text-xs italic"><?= $errors['adresse'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <input type="file" name="photo" id="photo" class="w-full p-2 border-2 rounded " >
                        <?php if (!empty($errors['photo'])): ?>
                            <p class="text-red-500 text-xs italic"><?= $errors['photo'] ?></p>
                        <?php endif; ?>
                    </div>
                    <!-- <input type="hidden" name="role_id" value="2"> -->
                    <button type="submit"
                        class="bg-blue-600 text-white p-4 font-bold rounded-lg w-full mt-4">Ajouter
                    </button>
                </fieldset>
            </form>
        </div>
                                
        <!-- Suivre dette -->
        <div class="w-full lg:w-1/2 bg-white p-6 rounded-lg shadow border-4 shadow-lg">
            
            <form class="flex mb-6" method="POST" action="/recherche">
                <fieldset class="border p-4 text-lg w-full ">
                    <legend class="ml-80 font-bold text-2xl">Suivi Dette</legend>
                    <div class="flex">
                        <input type="hidden" name="action" value="rechercherclient">
                        <input type="text" name="telephone" placeholder="Entrez le numero Telephone du client"
                            class="w-full p-2 border rounded-l mr-6">
                        <button type="submit" class="bg-blue-600 text-white p-3 rounded-r-lg w-16">OK</button>
                    </div>
                </fieldset>
            </form>
            <?php if (isset($error)): ?>
                <p class="text-red-500"><?php echo $error; ?></p>
            <?php endif; ?>
            <div class="bg-gray-100 p-4 rounded-lg shadow-inner" style="height:80%">
                <div class="flex items-center mb-6">
                    <div class="w-full flex justify-between p-4">
                        <h3 class="text-3xl font-bold">Client</h3>
                        <div class="flex gap-4">
                            <form method="post" action="/nouvelleDette">
                                <input type="hidden" name="telephone"
                                    value="<?= htmlspecialchars($user['telephone']) ?>">
                                <button type="submit"
                                    class="text-2xl bg-blue-600 text-white p-1 rounded mt-1">Nouvelle</button>
                            </form>

                            <form method="post" action="/afficherDettes">
                                <input type="hidden" name="userId" value="<?= htmlspecialchars($user['client_id']) ?>">
                                <button type="submit"
                                    class="text-2xl bg-blue-600 text-white p-1 rounded mt-1">Dette</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php if (isset($user)):
                    // echo "<pre";
                    // var_dump($user);
                    // echo "</pre>";
                    // die();
                    ?>                    
                    <div class="h-48 w-full flex gap-14">
                        <div class="h-48 w-60 border-2">
                            <img src="/var/www/gestion_dette/public/uploads/<?php echo $user['photo']; ?>"
                                alt="Client Avatar" <?php /* var_dump($user['photo']) */ ?> class="h-full w-full p-2 mr-4">
                        </div>
                        <div class="flex flex-col justify-evenly">
                            <div class="mb-2 flex gap-4">
                                <span class="block text-gray-700 text-3xl">Prénom:</span>
                                <span class="block text-2xl font-bold"><?php echo $user['prenom'];?></span>
                            </div>
                            <div class="mb-2 flex gap-4">
                                <span class="block text-gray-700 text-3xl">Nom:</span>
                                <span class="block text-2xl font-bold"><?php echo $user['nom']; ?></span>
                            </div>
                            <div class="mb-2 flex gap-4">
                                <span class="block text-gray-700 text-3xl">Telephone:</span>
                                <span class="block text-2xl font-bold"><?php echo $user['telephone']; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 h-44 flex flex-col justify-between">
                        <?php if (!empty($user)): ?>
                            
                                <?php 
                                $total_montantGlobale = 0;
                                $total_montantVerser = 0;
                                $total_montantRestant = 0;

                                if ($user) {
                                    $total_montantGlobale = $user['montantTotal'];
                                    $total_montantVerser = $user['montantVersé'];
                                    $total_montantRestant = $user['montantRestant'];
                                }
                                ?>
                                <div class="mb-2 flex justify-between">
                                    <span class="block text-gray-700 text-3xl">Total dettes:</span>
                                    <span class="block text-2xl font-bold"><?= htmlspecialchars($total_montantGlobale) ?> CFA</span>
                                </div>
                                <div class="mb-2 flex justify-between">
                                    <span class="block text-gray-700 text-3xl">Montant versé:</span>
                                    <span class="block text-2xl font-bold"><?= htmlspecialchars($total_montantVerser) ?> CFA</span>
                                </div>
                                <div class="mb-2 flex justify-between">
                                    <span class="block text-gray-700 text-3xl">Montant restant:</span>
                                    <span class="block text-2xl font-bold"><?= htmlspecialchars($total_montantRestant) ?> CFA</span>
                                </div>
                          
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="p-4 border-black border text-center">Aucune dette trouvée pour ce
                                    client.
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>