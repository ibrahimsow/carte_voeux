<?php

// Insert Class with session database
require 'DbUtil.php';

/**
	Manage the content of table : Fichier
*/
class FileDao {

	/**
		Return table content : fichier
	*/
	public static function findByEmail($email) {

		$sessionMysql = DbUtil::getInstance()->getDbSession();

		$sqlRequest = "SELECT * ";
        $sqlRequest .= "FROM carte f WHERE sender = '". $email ."';";

        $request = $sessionMysql->prepare($sqlRequest);
        $request->execute();

        return $request->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
		Add file in table : fichier
	*/
	public static function createNewSender($nameFile, $expediteur, $size, $path, $key) {

		$sessionMysql = DbUtil::getInstance()->getDbSession();

		$sqlRequest = "INSERT INTO carte ";
        $sqlRequest .= "VALUES (null, ";
        $sqlRequest .= "'" . sha1($key) . "', ";
        $sqlRequest .= "'" . $sender . "', ";
        $sqlRequest .= $receiver . ", ";
        $sqlRequest .= "'" . date('Y/m/d h:m:s') . "');";

       	$request = $sessionMysql->prepare($sqlRequest);
        
        $request->execute();

        return $sessionMysql->lastInsertId();

	}


}

?>