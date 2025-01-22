<?php 

require_once (dirname(__DIR__).'/init.php');


class UserController {

    // Méthode d'enregistrement d'un utilisateur
    public static function register(User $user) {
        try {
            $password = password_hash($user->getPassword(), PASSWORD_DEFAULT); // Hashage du mot de passe
            $pdo = PDOUtils::getSharedInstance();
            $pdo->execSQL(
                'INSERT INTO users (name, firstname, password, mail, phone, location, role) 
                VALUES (?, ?, ?, ?, ?, ?, ?)', 
                [
                    $user->getName(), 
                    $user->getFirstname(), 
                    $password, 
                    $user->getMail(), 
                    $user->getPhone(),
                    $user->getLocation(), 
                    $user->getRole()
                ]
            );
        } catch (PDOException $e) {
            die("Erreur lors de l'enregistrement : " . $e->getMessage());
        }
    }

    // Méthode de connexion d'un utilisateur
    public static function login($mail, $password) {
        try {
            $pdo = PDOUtils::getSharedInstance();
            $result = $pdo->requestSQL('SELECT * FROM users WHERE mail = ?', [$mail]);
            
            // Vérifie si un utilisateur est trouvé
            if (!empty($result)) {
                if (password_verify($password, $result[0]['password'])) {
                    $user = new User(
                        $result[0]['name'], 
                        $result[0]['firstname'], 
                        null,
                        $result[0]['mail'], 
                        $result[0]['phone'], 
                        $result[0]['location'], 
                        $result[0]['role'], 
                        $result[0]['id']
                    );

                    // Stockage dans la session
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

    // Validation du rôle
    public static function validateRole($role) {
        if (empty($role)) {
            $_SESSION['inscriptionErreur'][] = "Le rôle est obligatoire.";
        }
    }

    // Validation du mot de passe
    public static function validatePassword($password) {
        if (strlen($password) < 8 || 
            !preg_match('/[A-Z]/', $password) || 
            !preg_match('/[a-z]/', $password) || 
            !preg_match('/[0-9]/', $password) || 
            !preg_match('/[\W]/', $password)) {
            $_SESSION['inscriptionErreur'][] = "Le mot de passe doit comporter au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.";
        }
    }

    // Validation du téléphone
    public static function validatePhone($phone) {
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
        // if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //     $id_user = $_POST['id_user'];
        //     $role = $_POST['role'];

        //     $user =UserController::getUserById($id_user);
        //     $user->updateRole($id_user, $role);
        //     header("Location: /dashboard");
        //     exit();
        // }
    }
}
