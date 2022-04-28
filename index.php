<?php



/**======================================
 *             Controlles
 * ======================================**/

require_once 'controller/users.controller.php';
require_once 'controller/categories.controller.php';
require_once 'controller/products.controller.php';
require_once 'controller/template.controller.php';


/**======================================
 *             Models
 * ======================================**/

require_once 'model/users.model.php';
require_once 'model/categories.model.php';
require_once 'model/products.model.php';
require_once 'model/template.model.php';


$template = new TemplateController();

$template -> templateCtr();