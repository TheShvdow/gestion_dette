<?php

namespace Src\App\Controller;


use Src\App\App;
use PDOException;
use Src\Core\Sessions\Session;
use Src\Core\Validators\Validator;
use Src\Core\Controllers\Controller;

class ClientController extends Controller
{
    protected $userModel;
    protected  $DetteModel;
    protected $PaiementsModel;

    public function __construct()
    {
        $this->userModel = App::getInstance()->getModel("ClientModel");
        $this->DetteModel = App::getInstance()->getModel("DetteModel");
        $this->PaiementsModel = App::getInstance()->getModel("PaiementsModel");
    }


    public function showSuivieEtEnregistrer()
    {
        $this->renderView('Dettes/suivieEtEnregistrer', [
            'errors' => Session::get('errors'),
            'validatedData' => Session::get('validatedData'),
            'user' => Session::get('user'),
            'dettes' => Session::get('dettes'),
            'error' => Session::get('error')
        ]);
        Session::set('errors', null);
        Session::set('validatedData', null);
        Session::set('user', null);
        Session::set('dettes', null);
        Session::set('error', null);
    }
    


    // public function enregistrer()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $errors = [];
    //         $validatedData = $_POST;

    //         // Validate inputs
    //         if (!Validator::validateName($_POST['nom'])) {
    //             $errors['nom'] = 'Nom invalide';
    //             $validatedData['nom'] = '';
    //         }

    //         if (!Validator::validateName($_POST['prenom'])) {
    //             $errors['prenom'] = 'Prénom invalide';
    //             $validatedData['prenom'] = '';
    //         }

    //         if (!Validator::validateEmail($_POST['email'])) {
    //             $errors['email'] = 'Email invalide';
    //             $validatedData['email'] = '';
    //         }

    //         if (!Validator::validateTelephone($_POST['telephone'])) {
    //             $errors['telephone'] = 'Numéro de téléphone invalide';
    //             $validatedData['telephone'] = '';
    //         }

    //         if (!Validator::validateAddress($_POST['adresse'])) {
    //             $errors['adresse'] = 'Adresse invalide';
    //             $validatedData['adresse'] = '';
    //         }

    //         $fileValidation = Validator::validateFile($_FILES['photo']);
    //         if ($fileValidation !== true) {
    //             $errors['photo'] = $fileValidation;
    //         }

    //         if (empty($errors)) {
    //             try {
    //                 $_POST['photo'] = $_FILES['photo']['name'];
    //                 $user = json_decode(json_encode($_POST));
    //                 unset($user->action);
    //                 $user->photo = $this->handleFileUpload();
    //                 $user->password = $this->hashPassword('password123');
    //                 $this->userModel->save($user);
    //                 $this->redirect('/suivieEtEnregistrer');
    //             } catch (PDOException $e) {
    //                 if ($e->getCode() == 23000) {
    //                     if (strpos($e->getMessage(), 'email') !== false) {
    //                         $errors['email'] = 'Cet email est déjà utilisé.';
    //                     }
    //                     if (strpos($e->getMessage(), 'telephone') !== false) {
    //                         $errors['telephone'] = 'Ce numéro de téléphone est déjà utilisé.';
    //                     }
    //                     if (strpos($e->getMessage(), 'photo') !== false) {
    //                         $errors['photo'] = 'Cette photo est déjà utilisée.';
    //                     }
    //                 }
    //                 Session::set('errors', $errors);
    //                 Session::set('validatedData', $validatedData);
    //                 $this->redirect('/suivieEtEnregistrer');
    //             }
    //         } else {
    //             Session::set('errors', $errors);
    //             Session::set('validatedData', $validatedData);
    //             $this->redirect('/suivieEtEnregistrer');
    //         }
    //     } else {
    //         $this->redirect('/suivieEtEnregistrer');
    //     }
    // }

    public function enregistrer()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = [];
            $validatedData = $_POST;

            // Validate inputs
            if (!Validator::validateName($_POST['nom'])) {
                $errors['nom'] = 'Nom invalide';
                $validatedData['nom'] = '';
            }

            if (!Validator::validateName($_POST['prenom'])) {
                $errors['prenom'] = 'Prénom invalide';
                $validatedData['prenom'] = '';
            }

            if (!Validator::validateEmail($_POST['email'])) {
                $errors['email'] = 'Email invalide';
                $validatedData['email'] = '';
            }

            if (!Validator::validateTelephone($_POST['telephone'])) {
                $errors['telephone'] = 'Numéro de téléphone invalide';
                $validatedData['telephone'] = '';
            }

            if (!Validator::validateAddress($_POST['adresse'])) {
                $errors['adresse'] = 'Adresse invalide';
                $validatedData['adresse'] = '';
            }

            $fileValidation = Validator::validateFile($_FILES['photo']);
            if ($fileValidation !== true) {
                $errors['photo'] = $fileValidation;
            }

            if (empty($errors)) {
                try {
                    $_POST['photo'] = $_FILES['photo']['name'];
                    $user = json_decode(json_encode($_POST));
                    unset($user->action);
                    $user->photo = $this->handleFileUpload();
                    $user->password = $this->hashPassword('password123');
                    $this->userModel->save($user, 'Clients');
                    $this->redirect('/suivieEtEnregistrer');
                } catch (PDOException $e) {
                    if ($e->getCode() == 23000) {
                        if (strpos($e->getMessage(), 'email') !== false) {
                            $errors['email'] = 'Cet email est déjà utilisé.';
                        }
                        if (strpos($e->getMessage(), 'telephone') !== false) {
                            $errors['telephone'] = 'Ce numéro de téléphone est déjà utilisé.';
                        }
                        if (strpos($e->getMessage(), 'photo') !== false) {
                            $errors['photo'] = 'Cette photo est déjà utilisée.';
                        }
                    }
                    Session::set('errors', $errors);
                    Session::set('validatedData', $validatedData);
                    $this->redirect('/suivieEtEnregistrer');
                    echo '<div class="h-32 w-32 bg-green-100">  <h2 class="text-lg text-green-700 font-semibold"> Enregistrement du client effectuée avec succes </h2> </div>';
                }
            } else {
                Session::set('errors', $errors);
                Session::set('validatedData', $validatedData);
                $this->redirect('/suivieEtEnregistrer');
            }
        } else {
            $this->redirect('/suivieEtEnregistrer');
        }
    }

    public function rechercherclient()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $telephone = $_POST['telephone'];

            $user = $this->userModel->getUserByTelephoneAndRole($telephone);

            if ($user) {
                $dettes = $this->DetteModel->getAllDettesByUserId($user['client_id']);
                 
                Session::set('user', $user);
                Session::set('dettes', $dettes);
                // echo "<pre>";
                // var_dump($users);
                // echo "</pre>";
                // die();
            } else {
                Session::set('error', 'Utilisateur non trouvé');
            }

            $this->redirect('/suivieEtEnregistrer');
        } else {
            $this->redirect('/suivieEtEnregistrer');
        }
    }
    public function afficherDettes()
    {
        if (isset($_POST['userId'])) {
            $userId = $_POST['userId'];
            $user = $this->userModel->findById($userId);

            if ($user) {
                $currentPage = isset($_POST['page']) ? (int) $_POST['page'] : 1;
                $limit = 10;
                $offset = ($currentPage - 1) * $limit;

                $dettes = $this->DetteModel->getDettesByUserId($userId, $offset, $limit);
                $totalDettes = $this->DetteModel->countDettesByUserId($userId);
                $totalPages = ceil($totalDettes / $limit);

                // Vérifie que les dettes existent
                if ($dettes === false) {
                    // Gérer l'erreur si nécessaire
                    $dettes = [];
                }

                foreach ($dettes as $dette) {
                    $dette['date'] = $this->formatDate($dette['dateEnregistrement']);
                }
                
                // Passe toutes les variables à la vue
                $this->renderView('Dettes/details', [
                    'user' => $user,
                    'dettes' => $dettes,
                    'currentPage' => $currentPage,
                    'totalPages' => $totalPages,                    
                ]);
                // var_dump($dettes);
                // die();
                
            } else {
                $this->renderView('Dettes/suivieEtEnregistrer', ['error' => 'Utilisateur non trouvé']);
            }
        } else {
            $this->redirect('/suivieEtEnregistrer');
        }
    }

    public function listDettes()
    {
        $status = $_POST['MontantRestant'] ?? 'NonSoldées';

        if ($status == 'Soldées') {
            $dettes = $this->DetteModel->findSoldées();
        } else {
            $dettes = $this->DetteModel->findNonSoldées();
        }

        $this->renderView('Dettes/details', ['dettes' => $dettes]);
    }

    public function afficherPaiement($detteId)
    {
        $dette = $this->DetteModel->findById($detteId);

        if ($dette) {
            $paiements = $this->PaiementsModel->getPaiementsByDetteId($detteId);
            $this->renderView('Dettes/listerPaiement', ['dette' => $dette, 'paiements' => $paiements]);
        } else {
            $this->renderView('Dettes/details', ['error' => 'Dette non trouvée']);
        }
    }

    public function nouveauPaiement($detteId)
    {
        $dette = $this->DetteModel->findById($detteId);

        if ($dette) {
            $this->renderView('Dettes/paiementDette', ['dette' => $dette]);
        } else {
            $this->renderView('Dettes/details', ['message' => 'Dette non trouvée']);
        }
    }

    // public function ajouterPaiement()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $dette_id = isset($_POST['detteID']) ? $_POST['detteID'] : null;
    //         $montant = isset($_POST['montantVerse']) && $this->isValidDecimal($_POST['montantVerse']) ? $_POST['montantVerse'] : null;

    //         if ($dette_id && $montant !== null) {
    //             $paiement = [
    //                 'detteID' => $dette_id,
    //                 'montantVerse' => $montant,
    //                 // 'date' => date('Y-m-d'),
    //             ];
    //             $paiement = (object) $paiement;

    //             $this->PaiementsModel->save($paiement);

    //             $dette = $this->DetteModel->findById($dette_id);
                
    //             if ($dette) {
    //                 $montantRestant = $dette['montantRestant'] - $montant;
    //                 $this->DetteModel->update(['montantRestant' => $montantRestant], $dette_id);
    //             }
    //             $this->renderView('Dettes/details');
    //         } else {
    //             $this->renderView('Dettes/paiementDette');
    //         }
    //     } else {
    //         $this->redirect('/nouveauPaiement/{id}');
    //     }

        
    // }

    public function ajouterPaiement()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dette_id = isset($_POST['detteID']) ? $_POST['detteID'] : null;
            $montant = isset($_POST['montantVerse']) && $this->isValidDecimal($_POST['montantVerse']) ? $_POST['montantVerse'] : null;
            SESSION::set('detteID', $dette_id);
            SESSION::set('montantVerse', $montant);
            if ($dette_id && $montant !== null) {
                $paiement = [
                    'detteID' => SESSION::get('detteID'),
                    'montantVerse' => SESSION::get('montantVerse'),
                    // 'date' => date('Y-m-d'),
                ];

               

                $paiement = (object) $paiement;
    
                $this->PaiementsModel->save($paiement, 'Paiements');
    
                $dette = $this->DetteModel->findById($dette_id);
                
                if ($dette) {
                    $montantRestant = $dette['montantRestant'] - $montant;
                    $this->DetteModel->update(['montantRestant' => $montantRestant], $dette_id);
                }
                $this->renderView('Dettes/details');
            } else {
                $this->renderView('Dettes/paiementDette');
            }
        } else {
            $this->redirect('/nouveauPaiement/{id}');
        }
    }
    

    private function isValidDecimal($value)
    {
        return is_numeric($value) && $value >= 0;
    }

    private function formatDate($date)
    {
        return date('d-m-Y', strtotime($date));
    }
}
