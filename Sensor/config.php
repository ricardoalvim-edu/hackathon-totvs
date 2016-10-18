<?php

// Caminho para a raiz
if( !defined('ABS_PATH') ) {
    define( 'ABS_PATH', str_replace('\\', '/', dirname(__FILE__) . '' ));
}

define('SERVER', "192.168.0.142");

define('DBNAME', "DBHackathon");
/*
 *Nome do usurio no banco de dados
 * Padrao root
 */
define('USER', "hackathon");
/*
 * senha do usuario do banco de dados
 * padrao vazio;
 */
define('PASS', "");
/*
 * Apos mudar as configurações, salve o arquivo e tente novamente
 */

/*load the global classes*/
require_once ABS_PATH.'/global/ConnectDB.php';
require_once ABS_PATH.'/global/GlobalFunction.php';


/*load the controllers*/
require_once ABS_PATH."/controller/login/LoginController.php";
require_once ABS_PATH."/controller/talhao/TalhaoController.php";
require_once ABS_PATH."/controller/irrigacao/IrrigacaoController.php";


/*load the models*/
require_once ABS_PATH."/model/talhao/TalhaoModel.php";
require_once ABS_PATH."/model/irrigacao/IrrigacaoModel.php";

?>
