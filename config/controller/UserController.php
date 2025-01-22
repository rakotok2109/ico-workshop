<?php 

require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/init.php');


class UserController {
    public static function register (User $user)
    {
        $password = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        $pdo = PDOUtils::getSharedInstance();
        $pdo->execSQL('INSERT INTO users (name, firstname, password, mail, phone, location, role) VALUES (?, ?, ?, ?, ?, ?, ?)', [$user->getName(),$user->getFirstname(), $password, $user->getMail(), $user->getPhone() ,$user->getLocation() ,$user->getRole()]);
    }

    public static function login($mail, $password) {
        try{
            $pdo = PDOUtils::getSharedInstance();
            $result = $pdo->requestSQL('SELECT * FROM users WHERE mail = ?', [$mail]);
           
                if (password_verify($password, $result[0]['password'])){
                  
                    $user = new User($result[0]['name'], $result[0]['firstname'], null, $result[0]['mail'], $result[0]['phone'], $result[0]['location'], $result[0]['role'], $result[0]['id']);

                    $_SESSION['user'] = serialize($user);
                    $_SESSION['user_expiration'] = time() + 86400; // 86400 secondes = 1 jour
                    return true;
                   
                } else {
                    $_SESSION['loginErreur'][] = 0;
                    return false;
                }
          
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
       
    }

    public static function updateUser (User $user)
    {
        $pdo = PDOUtils::getSharedInstance();
        $pdo->execSQL('UPDATE users SET (name, firstname, mail, phone, location, id) VALUES (?, ?, ?, ?, ?, ?) WHERE id = ?', [$user->getName(),$user->getFirstname(), $user->getMail(), $user->getPhone() ,$user->getLocation(), $user->getId()]);
    }


    
    public static function mailExists($mail)
    {
        $pdo = PDOUtils::getSharedInstance();
        $result = $pdo->requestSQL('SELECT * FROM users WHERE mail = ?', [$mail]);
        return count($result) > 0;
    }



    public static function validateMail ($mail)
    {
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['inscriptionErreur'][] = 3;
        }
        //Vérifier si l'email existe déjà
        if (UserController::mailExists($mail)) {
            $_SESSION['inscriptionErreur'][] = 2;
          

           
        }
    }

    public static function validateName($name)
    {
        if (strlen($name) < 3) {
            $_SESSION['inscriptionErreur'][] = 0; // Le nom doit faire plus de 2 caractères
        }
    }

    public static function validateFirstname($firstname)
    {
        if (strlen($firstname) < 3) {
            $_SESSION['inscriptionErreur'][] = 1; // Le prénom doit faire plus de 2 caractères
        }
    }

    public static function validateRole($role)
    {
        if (empty($role)) {
            $_SESSION['inscriptionErreur'][] = 4; // Le rôle doit être renseigné
        }
    }

    public static function validatePassword($password)
    {
        if (strlen($password) < 8 || 
            !preg_match('/[A-Z]/', $password) || 
            !preg_match('/[a-z]/', $password) || 
            !preg_match('/[0-9]/', $password) || 
            !preg_match('/[\W]/', $password)) {
            $_SESSION['inscriptionErreur'][] = 5; // Le mot de passe doit respecter les critères
        }
    }

    public static function validatePhone($phone)
    {
        if (!preg_match('/^\+?[0-9]{10,15}$/', $phone)) {
            $_SESSION['inscriptionErreur'][] = 10; // Veuillez entrer un numéro de téléphone valide
        }
    }

    public static function getAllUsers() {
        $pdo = PDOUtils::getSharedInstance();
        $results = $pdo->requestSQL('SELECT id, name, firstname, mail, phone, location, role FROM users');
        return $results;
    }

    public static function updateRole()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_user = isset($_POST['id_user']) ? (int) $_POST['id_user'] : null;
            $role = isset($_POST['role']) ? (int) $_POST['role'] : null;

            if ($id_user === null || $role === null) {
                $_SESSION['error'] = "Données invalides.";
                header("Location: ../pages/DashboardAdminView.php");
                exit();
            }

            if (!in_array($role, [0, 1, 2])) {
                $_SESSION['error'] = "Rôle invalide.";
                header("Location: ../pages/DashboardAdminView.php");
                exit();
            }

            try {
                $pdo = PDOUtils::getSharedInstance();
                $sql = "UPDATE users SET role = ? WHERE id = ?";
                $pdo->execSQL($sql, [$role, $id_user]);
                header("Location: ../pages/DashboardAdminView.php");
                $_SESSION['success'] = "Le rôle de l'utilisateur a été mis à jour avec succès.";
                header("Location: ../pages/DashboardAdminView.php");
                exit();
            } catch (PDOException $e) {
                $_SESSION['error'] = "Erreur SQL : " . $e->getMessage();
                exit();
            }
        }
    }

    public static function deleteUser()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_user = isset($_POST['id']) ? (int) $_POST['id'] : null;

            if ($id_user === null) {
                $_SESSION['error'] = "ID utilisateur invalide.";
                header("Location: ../pages/DashboardAdminView.php");
                exit();
            }

            try {
                $pdo = PDOUtils::getSharedInstance();
                $sql = "DELETE FROM users WHERE id = ?";
                $pdo->execSQL($sql, [$id_user]);

                $_SESSION['success'] = "L'utilisateur a été supprimé avec succès.";
                header("Location: ../pages/DashboardAdminView.php");
                exit();
            } catch (PDOException $e) {
                $_SESSION['error'] = "Erreur lors de la suppression : " . $e->getMessage();
                header("Location: ../../pages/DashboardAdminView.php");
                exit();
            }
        }
    }
}