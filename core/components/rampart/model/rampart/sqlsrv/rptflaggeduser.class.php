<?php
/**
 * @package rampart
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/rptflaggeduser.class.php');
class rptFlaggedUser_sqlsrv extends rptFlaggedUser {
    function rptFlaggedUser_sqlsrv(& $xpdo) {
        $this->__construct($xpdo);
    }
    function __construct(& $xpdo) {
        parent :: __construct($xpdo);
    }
}
?>