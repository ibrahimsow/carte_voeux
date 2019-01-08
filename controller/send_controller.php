<?php 

require 'vendor/autoload.php';
require 'model/sender.php';
require 'model/connection_bdd.php';

$loader = new Twig_Loader_Filesystem('view');
$twig = new Twig_Environment($loader, array(
    'cache' => false,
));

switch ($action) {
    // case 'send':
    //     send_card();
    //     break;

        default:
        defaultPage();
        break;
}

// function send_card() {

//     global $twig, $baseurl;

//     $sender = $_POST['email_expediteur'];
    
//     $key = sha1($expediteur);
    


//     if (createFolder($folderExpediteur)) {
//         $urlToSend = "";
//         for ($i = 0; $i < count($_FILES['fichier']['tmp_name']); $i++) {
//             $nameFile = $_FILES['fichier']['name'][$i];
//             $key = uniqid();
//             $size = $_FILES['fichier']['size'][$i];
//             $path = "pathSystem/" . $_FILES['fichier']['name'][$i];
//             $target = $folderExpediteur . "/" . sha1(date('Y/m/d')) . "-" . $nameFile;
//             if (moveFile( $_FILES['fichier']['tmp_name'][$i], $target)) {
//                 $idNewFile = FileDao::createNewFile($nameFile, $expediteur, $size, $target, $key);
//                 $file = FileDao::findById($idNewFile);
//                 $urlToSend .= $baseurl . "download/pagedownload/" . $file[0]['uuid'] . "\n \n ";
//                 $files[$i] = $baseurl . "download/pagedownload/" . $file[0]['uuid'];
//             } else {
//                 $arrayRender = array(
//                     'baseurl' => $baseurl,
//                     "errorMessage" => "Impossible to move file : " . $nameFile
//                 );
//             }
//         }
//         $urlToSend .= "";
//         /* 
//             send mail here 
        
//         */
//         $from = $sender;
//         $to = $_POST['email_destinataire'];
//         $subject = "Files Walk";
//         $message = "Bonjour, $expediteur vous a envoyer des fichiers via notre site File Walk, \n \n
// Voici la liste des fichiers à télécharger : \n \n " . $urlToSend . "
        
// Merci de votre confiance.";
//         $headers = "From:" . $from;
           
//         mail($to,$subject,$message, $headers);

//         $template = $twig->load('send.html.twig');
//         $arrayRender = array(
//             'baseurl' => $baseurl,
//             'url' => $urlToSend,
//             'files' => $files
//         );

            
//     }  else {
//         $arrayRender = array(
//             'baseurl' => $baseurl,
//             "errorMessage" => "L'envoi a échoué"
//         );
//     }

//     if ($template == null) {
//         $template = $twig->load('error-upload.html.twig');
//     }

//     echo $template->render( 
//         $arrayRender
//     );

// }

function defaultPage() {

	global $twig, $baseurl;
    
    $template = $twig->load('send.html.twig');
    echo $template->render( array('baseurl' => $baseurl));
}




?>