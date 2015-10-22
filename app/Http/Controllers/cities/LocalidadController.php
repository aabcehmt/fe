<?php namespace App\Http\Controllers\cities;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\cities\CreateLocalidadRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Pais;
use App\Provincia;
use App\Departamento;
use App\Localidad;

class LocalidadController extends Controller
{
    private $ruta = '';

    private $donde_estoy = [];


    /**
     * constructor de la clase
     */
    public function __construct()
    {
        $href = route('cities.localidades.index');
        $this->ruta = $this->listOneBreadcrumb('localidades',$href);

        $this->donde_estoy[0] = \Html::link('home','home');
        $this->donde_estoy[1] = \Html::linkRoute('cities.localidades.index','localidades');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->listar();
    }

    #==========================================================================================
    #== Controller functions to interact with users ===========================================
    #==========================================================================================

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $whereAmI = $this->ruta . $this->listOneBreadcrumb('crear localidad','',1);

            $departamentos = Departamento::listByFullName();

            $data = [
                'whereAmI'      => $whereAmI,
                'departamentos' => $departamentos
            ];

            return view( 'admin.cities.localidades.create', $data );
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $whereAmI = $this->ruta . $this->listOneBreadcrumb('editar localidad','',1);

            $departamentos = Departamento::listByFullName();

            $localidad = Localidad::with('departamento')
                ->with('departamento.provincia')
                ->with('departamento.provincia.pais')
                ->findOrFail($id);

            $donde_estoy[0] = \HTML::entities(\Html::linkRoute('cities.localidades.index','localidades'));

            $data = [
                'whereAmI'      => $whereAmI,
                'departamentos' => $departamentos,
                'donde_estoy'   => $donde_estoy,
                'localidad'     => $localidad
            ];

            return view( 'admin.cities.localidades.edit', $data );
        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $whereAmI = $this->ruta . $this->listOneBreadcrumb('detallar localidad','',1);

            $localidad = Localidad::with('departamento')
                ->with('departamento.provincia')
                ->with('departamento.provincia.pais')
                ->findOrFail($id);

            $data = [
                'whereAmI'  => $whereAmI,
                'localidad' => $localidad
            ];

            return view( 'admin.cities.localidades.show', $data );
        }

        /**
         * Show all the items.
         *
         * @return Response
         */
        public function listar()
        {
            $whereAmI = $this->ruta;

            $localidades = Localidad::with('departamento')
                ->with('departamento.provincia')
                ->with('departamento.provincia.pais')
                ->Paginate(7);

            $paginate_data = $this->paginateAditionalData( $localidades );

            $data = [
                'whereAmI' => $whereAmI,
                'localidades' => $localidades,
                'paginate_data' => $paginate_data
            ];

            return view( 'admin.cities.localidades.index', $data );
        }
    #==========================================================================================

    #==========================================================================================
    #=== Controller functions to interact with database =======================================
    #==========================================================================================

        /**
         * Store a newly created resource in storage.
         *  
         * @param  Request  $request
         * @return Response
         */
        public function store(CreateLocalidadRequest $request)
        {
            $localidad = new Localidad();
            $localidad->fill($request->all());
            $localidad->save();

            return \Redirect::route('admin.cities.localidades.index');
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            $localidad = Localidad::findOrFail($id);

            $localidad->fill($request->all());
            $localidad->save();

            return \Redirect::route('cities.localidades.show',$id);
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $localidad = Localidad::findOrFail($id);

            // $localidad->delete();

            Session::flash('message','No se puede eliminar la localidad '.$localidad->full_name);

            return \Redirect::route('cities.localidades.index');
        }
    #==========================================================================================
    
    #==========================================================================================
    #=== Controller helpers functions =========================================================
    #==========================================================================================

        
    #==========================================================================================
}
