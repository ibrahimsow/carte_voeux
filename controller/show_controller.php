<?php 

require 'vendor/autoload.php';
require 'model/sender.php';
require 'model/connection_bdd.php';

$loader = new Twig_Loader_Filesystem('view');
$twig = new Twig_Environment($loader, array(
    'cache' => false,
));

switch ($action) {
    case 'show':
        pageShow();
        break;

        default:
        defaultPage();
        break;
}

function pageShow() {

    global $twig, $baseurl, $id;
    
    // $file = FileDao::findByUUID($id);

    $template = $twig->load('show.html.twig');
    
    // $url = $baseurl . "download/file/" . $file[0]['uuid'];

    echo $template->render(  array( 'baseurl' => $baseurl)
    );

}
function defaultPage() {

	global $twig, $baseurl;
    
    $template = $twig->load('show.html.twig');
    echo $template->render( array('baseurl' => $baseurl) );
}





?>