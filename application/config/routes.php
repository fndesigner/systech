<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['default_controller'] = "login";


/* Exemplo retirado do site meuadv.com
$route['(:any)/(:any)/(:num)/(:num)'] = "advogados/poblacion_especialidad"; #reservado para a pagina final de cidade e especialidade
$route['estado-(:any)/(:num)'] = "advogados/estado/$1"; // nessa pagina se escolhe a cidade
$route['cidade-(:any)/(:num)'] = "advogados/cidade/$1"; // nessa pagina se escolhe a especialidade
$route['especialidade-(:any)/(:num)'] = "advogados/especialidad/$1"; // nessa pagina se escolhe a provincia
$route['escritorio/(:any)/(:num)'] = "escritorio"; //detalhes despacho
$route['atualizar/(:any)/(:num)'] = "atualizar"; //detalhes despacho
$route['buscar/(:any)/(:any)'] = "buscar"; //detalhes despacho


*/ 
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */