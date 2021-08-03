<?php



/*=================== FONCTION du Login ================*/

function validateForm (string $input): string {
    $safe = trim($input);
    $safe = htmlentities($safe);
    $safe = stripslashes($safe);

    return $safe;

}
/*===============================================*/
/*============== Auhtentification ===============*/

function signIn(string $login, string $password): array {

    
    $db = Database::connect();
    $sql = "SELECT * FROM admins WHERE login = :login ;";
    $req = $db -> prepare ($sql);
    $req-> bindParam(':login', $login, PDO::PARAM_STR);
    $req-> execute ();

    $results = $req -> fetchAll();

    foreach($results as $item ) {

        if(password_verify($password, $item["password"] )) {
            return $item;
        } else {
            return array();
        }

    }
    return array();
}
