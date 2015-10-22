<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
	* esta Funcion es provisoria, creo que el controlador no deberia encargarse de esto,
	* existe la clase HTML para eso, aunque no se todavia como mandarle atributos a cada <li>.
	* 		
	*		$donde_estoy = Html::linkRoute('cities.localidades.index','localidades')
	*		Html::ol( $donde_estoy, [ "class" => "breadcrumb" ])
    */
    protected function listOneBreadcrumb( $value,$href='#',$active=0 )
    {
        $breadcrumb = '';
        
        if (!empty($value)) {

            $class_active = '';
            if ( $active ) { $class_active = 'class="active"'; }

            $breadcrumb = '<li '.$class_active.'><small><a href="' .$href. '">' .$value. '</a></small></li>';
        }

        $breadcrumb = $breadcrumb;

        return $breadcrumb;
    }

    /**
    * tampoco se si va aca, pero lo usan varios de los controladoras para la data table.
    */
    protected function paginateAditionalData($paginate_object) 
    {
        $items_hasta = $paginate_object->perPage() * $paginate_object->currentPage();
        $items_desde = $items_hasta - $paginate_object->perPage() + 1;
        if ( $items_hasta > $paginate_object->total() ) { $items_hasta = $paginate_object->total(); }

        $paginate_data['items_hasta'] = $items_hasta;
        $paginate_data['items_desde'] = $items_desde;

        return $paginate_data;
    }
}
