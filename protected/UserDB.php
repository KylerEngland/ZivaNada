<?php 
require_once('config.inc.php');

class UserDB{

    private static $connection;
    private static $settings = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    );


    function __construct(){
        if (!isset(self::$connection)) {
            try {
                self::$connection = new PDO(
                        DBCONNSTRING,
                        DBUSER,
                        DBPASS,
                        self::$settings
                );
            } catch (PDOException $e) {
                throw new PDOException($e->getMessage(), (int) $e->getCode());
            }
        }
    }

    public static function register($name, $lastName, $email, $password){
        try{
            $sql = "SELECT id, ime, prezime FROM profiles WHERE email = :email";
            $statement = self::$connection->prepare($sql);
            $statement->bindParam(':email', $email);
            $statement->execute();
            $result = $statement->fetchColumn();

            if ($result > 0) {
                // Username already exists
                echo 'Username exists, please choose another!';
            } else {
                // Username doesn't exist, insert new account
                $pass = password_hash($password, PASSWORD_BCRYPT);
                $sql = "INSERT INTO profiles (ime, prezime, email, lozinka, privilege) VALUES (:ime, :prezime, :email, '$pass', 0)";
                $statement = self::$connection->prepare($sql);

                $statement->bindParam(':ime', $name);
                $statement->bindParam(':prezime', $lastName);
                $statement->bindParam(':email', $email);

                $statement->execute();
                echo 'You have successfully registered, you can now login!';
            }
        }
        catch(PDOException $e){
            echo 'Could not prepare statement!';
            die( $e->getMessage() );
        }
        finally {
            $pdo = null;
        }
    }

    public static function findEmail($email){
        try{
            $sql = "SELECT id, ime, prezime, email FROM profiles WHERE email = :email";
            $statement = self::$connection->prepare($sql);
            $statement->bindParam(':email', $email);
            $statement->execute();
            $result = $statement->fetch();

            if(isset($result['email'])){
                // Email found.
                return 1;
            }else{
                // Email not found.
                return 0;
            }
        }
        catch(PDOException $e){
            echo 'Could not prepare statement!';
            die( $e->getMessage() );
        }
        finally {
            $pdo = null;
        }
    }

    public static function updatePassword($email, $newPass){
        try{
            $pass = password_hash($newPass, PASSWORD_BCRYPT);
            $sql = "UPDATE profiles SET lozinka = :pass WHERE email = :email";
            $statement = self::$connection->prepare($sql);

            $statement->bindParam(':email', $email);
            $statement->bindParam(':pass', $pass);

            $statement->execute();
            echo 'You have successfully updated your password!';
        }
        catch(PDOException $e){
            echo 'Could not prepare statement!';
            die( $e->getMessage() );
        }finally{
            $pdo = null;
        }
    }

    public static function updateToken($email, $token){
        try{
            $sql = "UPDATE profiles SET forgot_pass_token = :token WHERE email = :email";
            $statement = self::$connection->prepare($sql);

            $statement->bindParam(':email', $email);
            $statement->bindParam(':token', $token);

            $statement->execute();
        }
        catch(PDOException $e){
            echo 'Could not prepare statement!';
            die( $e->getMessage() );
        }finally{
            $pdo = null;
        }
    }

    public static function verifyToken($email, $token){
        try{
            $sql = "SELECT id, email, forgot_pass_token FROM profiles WHERE email = :email";
            $statement = self::$connection->prepare($sql);
            $statement->bindParam(':email', $email);
            $statement->execute();

            $result = $statement->fetch();

            if ($result != NULL) {
                
                if($token == $result['forgot_pass_token']){
                    // Verification success! Allow user to update password!
                    return 1;
                }else{
                    // Incorrect token.
                    return 0;
                }
                
            }else{
                // echo("Incorrect username or password.");
                return 2;
            }
        }
        catch(PDOException $e){
            echo("Incorrect username or password.");
            die( $e->getMessage() );
        }
        finally {
            $pdo = null;
        }

    }

    public static function login($email, $password){
        try{
            $sql = "SELECT id, ime, prezime, email, lozinka, privilege FROM profiles WHERE email = :email";
            $statement = self::$connection->prepare($sql);
            $statement->bindParam(':email', $email);
            $statement->execute();
            $result = $statement->fetch();

            if ($result != NULL) {
                // Username already exists
                if(password_verify($password, $result['lozinka'])){
                    // Verification success! User has logged-in!
                    // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                    session_regenerate_id();
                    $_SESSION['id'] = $result['id'];
                    $_SESSION['ime'] = $result['ime'];
                    $_SESSION['prezime'] = $result['prezime'];
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['admin'] = $result['privilege'];
                    $_SESSION['loggedin'] = TRUE;
                    return 1;
                }else{
                    // echo("Incorrect username or password.");
                    return 0;
                }
                
            }else{
                // echo("Incorrect username or password.");
                return 0;
            }



        }catch(PDOException $e){
            echo("Incorrect username or password.");
            die( $e->getMessage() );
        }
        finally {
            $pdo = null;
        }
    }
}

?>