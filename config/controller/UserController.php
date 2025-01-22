<?php 

require_once (dirname(__DIR__).'/init.php');


class UserController {
    public static function register (User $user)
    {
        $password = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        $pdo = PDOUtils::getSharedInstance();
        $pdo->execSQL('INSERT INTO users (name, firstname, password, mail, phone, location, role) VALUES (?, ?, ?, ?, ?, ?, ?)', [$user->getName(),$user->getFirstname(), $password, $user->getMail(), $user->getPhone() ,$user->getLocation(), $user->getRole()]);
    }

    public static function login($mail, $password) {
        try {
            $pdo = PDOUtils::getSharedInstance();
            $result = $pdo->requestSQL('SELECT * FROM users WHERE mail = ?', [$mail]);
            if ($_POST['mail']) {
                if (password_verify($password, $result[0]['password'])){
                    $user = new User($result[0]['name'], $result[0]['firstname'], $result[0]['password'], $result[0]['mail'], $result[0]['phone'], $result[0]['location'], $result[0]['role'], $result[0]['id']);
                  
                    $_SESSION['user'] = serialize($user);
                    $_SESSION['user_expiration'] = time() + 86400; // 1 jour de session
                    return true;
                } else {
                    $_SESSION['loginErreur'][] = "Mot de passe incorrect.";
                    return false;
                }
            } else {
                $_SESSION['loginErreur'][] = "Adresse e-mail introuvable.";
                return false;
            }
        } catch (PDOException $e) {
            die("Erreur lors de la connexion : " . $e->getMessage());
        }
    }

    // Méthode de mise à jour d'un utilisateur
    public static function updateUser(User $user) {
        try {
            $pdo = PDOUtils::getSharedInstance();
            $pdo->execSQL(
                'UPDATE users
                SET name = ?, firstname = ?, mail = ?, phone = ?, location = ?
                WHERE id = ?',
                [
                    $user->getName(),
                    $user->getFirstname(),
                    $user->getMail(),
                    $user->getPhone(),
                    $user->getLocation(),
                    $user->getId()
                ]
            );
        } catch (PDOException $e) {
            die("Erreur lors de la mise à jour : " . $e->getMessage());
        }
    }

    public static function updateUser (User $user)
    {
        $pdo = PDOUtils::getSharedInstance();
        $pdo->execSQL('UPDATE users SET name = ?, firstname = ?, mail = ?, phone = ?, location = ?, WHERE id = ?',
        [
            $user->getName(),
            $user->getFirstname(),
            $user->getMail(),
            $user->getPhone(),
            $user->getLocation(),
            $user->getId()
        ]);
    }


    
    public static function mailExists($mail)
    {
        $pdo = PDOUtils::getSharedInstance();
        $result = $pdo->requestSQL('SELECT * FROM users WHERE mail = ?', [$mail]);
        return count($result) > 0;
    }

    // Validation d'un email
    public static function validateMail($mail) {
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['inscriptionErreur'][] = "Format de l'email invalide.";
        }

        if (self::mailExists($mail)) {
            $_SESSION['inscriptionErreur'][] = "L'adresse email est déjà utilisée.";
        }
    }

    // Validation du nom
    public static function validateName($name) {
        if (strlen($name) < 3) {
            $_SESSION['inscriptionErreur'][] = "Le nom doit contenir au moins 3 caractères.";
        }
    }

    // Validation du prénom
    public static function validateFirstname($firstname) {
        if (strlen($firstname) < 3) {
            $_SESSION['inscriptionErreur'][] = "Le prénom doit contenir au moins 3 caractères.";
        }
    }

    // Validation du mot de passe
    public static function validatePassword($password) {
        if (strlen($password) < 8 || 
            !preg_match('/[A-Z]/', $password) || 
            !preg_match('/[a-z]/', $password) || 
            !preg_match('/[0-9]/', $password) || 
            !preg_match('/[\W]/', $password)) {
            $_SESSION['inscriptionErreur'][] = 4; // Le mot de passe doit respecter les critères
        }
    }

    // Validation du téléphone
    public static function validatePhone($phone) {
        if (!preg_match('/^\+?[0-9]{10,15}$/', $phone)) {
            $_SESSION['inscriptionErreur'][] = 9; // Veuillez entrer un numéro de téléphone valide
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
                header("Location: ../pages/admin/dashboard.php");
                exit();
            }

            if (!in_array($role, [0, 1, 2])) {
                $_SESSION['error'] = "Rôle invalide.";
                header("Location: ../pages/admin/dashboard.php");
                exit();
            }

            try {
                $pdo = PDOUtils::getSharedInstance();
                $sql = "UPDATE users SET role = ? WHERE id = ?";
                $pdo->execSQL($sql, [$role, $id_user]);
                header("Location: ../pages/admin/dashboard.php");
                $_SESSION['success'] = "Le rôle de l'utilisateur a été mis à jour avec succès.";
                header("Location: ../pages/admin/dashboard.php");
                exit();
            } catch (PDOException $e) {
                $_SESSION['error'] = "Erreur SQL : " . $e->getMessage();
                exit();
            }
        }
    }

    public static function deleteUser($id_user)
    {
        if ($id_user === null) {
            $_SESSION['error'] = "ID utilisateur invalide.";
            header("Location: ../pages/admin/dashboard.php");
            exit();
        }

        try {
            $pdo = PDOUtils::getSharedInstance();
            $sql = "DELETE FROM users WHERE id = ?";
            $pdo->execSQL($sql, [$id_user]);

            $_SESSION['success'] = "L'utilisateur a été supprimé avec succès.";
            header("Location: ../pages/admin/dashboard.php");
            exit();
        } catch (PDOException $e) {
            $_SESSION['error'] = "Erreur lors de la suppression : " . $e->getMessage();
            header("Location: ../pages/admin/dashboard.php");
            exit();
        }
    }
}