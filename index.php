<?php


ini_set("xdebug.var_display_max_children", -1);
ini_set("xdebug.var_display_max_data", -1);
ini_set("xdebug.var_display_max_depth", -1);




/**======================================
 *             Controlles
 * ======================================**/

require_once 'controller/users.controller.php';
require_once 'controller/categories.controller.php';
require_once 'controller/products.controller.php';
require_once 'controller/clients.controller.php';
require_once 'controller/sales.controller.php';
require_once 'controller/template.controller.php';


/**======================================
 *             Models
 * ======================================**/

require_once 'model/users.model.php';
require_once 'model/categories.model.php';
require_once 'model/products.model.php';
require_once 'model/clients.model.php';
require_once 'model/sales.model.php';
require_once 'model/template.model.php';


$template = new TemplateController();

$template -> templateCtr();