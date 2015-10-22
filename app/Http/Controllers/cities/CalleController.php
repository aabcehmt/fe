<?php namespace App\Http\Controllers\cities;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\cities\calles\CreateCalleRequest;
use App\Http\Requests\cities\calles\UpdateCalleRequest;
use App\Localidad;
use App\Calle;

class CalleController extends Controller
{
    private $ruta = '';

    /**
     * constructor de la clase
     */
    public function __construct()
    {
        $href = route('cities.calles.index');
        $this->ruta = $this->listOneBreadcrumb('calles',$href);
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
            $whereAmI = $this->ruta . $this->listOneBreadcrumb('crear calle','',1);

            $localidades = Localidad::listByFullName();

            $data = [
                'whereAmI'      => $whereAmI,
                'localidades'   => $localidades
            ];

            return view( 'admin.cities.calles.create', $data );
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $whereAmI = $this->ruta . $this->listOneBreadcrumb('editar calle','',1);

            $calle = Calle::with('localidad')
                ->with('localidad.departamento')
                ->with('localidad.departamento.provincia')
                ->with('localidad.departamento.provincia.pais')
                ->findOrFail($id);

            $localidades = Localidad::listByFullName();

            $data = [
                'whereAmI'  => $whereAmI,
                'calle'     => $calle,
                'localidades' => $localidades
            ];

            return view( 'admin.cities.calles.edit', $data );
        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $whereAmI = $this->ruta . $this->listOneBreadcrumb('detallar calle','',1);

            $calle = Calle::with('localidad')
                ->with('localidad.departamento')
                ->with('localidad.departamento.provincia')
                ->with('localidad.departamento.provincia.pais')
                ->findOrFail($id);

            $data = [
                'whereAmI'  => $whereAmI,
                'calle'     => $calle
            ];

            return view( 'admin.cities.calles.show', $data );
        }

        /**
         * Show all the items.
         *
         * @return Response
         */
        public function listar()
        {
            $whereAmI = $this->ruta;

            $calles = Calle::with('localidad')
                ->with('localidad.departamento')
                ->with('localidad.departamento.provincia')
                ->Paginate(7);

            $paginate_data = $this->paginateAditionalData( $calles );

            $data = [
                'whereAmI' => $whereAmI,
                'calles' => $calles,
                'paginate_data' => $paginate_data
            ];

            return view( 'admin.cities.calles.index', $data );
        }

    #==========================================================================================
    
    #==========================================================================================
    #=== Controller functions to interact with database =======================================
    #==========================================================================================
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(CreateCalleRequest $request)
        {
            $calle = new Calle();

            $calle->fill($request->all());
            $calle->save();

            return \Redirect::route('cities.calles.index');
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  App\Http\Requests\cities\calles\UpdateCalleRequest $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(UpdateCalleRequest $request, $id)
        {
            $calle = Calle::findOrFail($id);

            $calle->fill($request->all());
            $calle->save();

            return \Redirect::route('cities.calles.show',$id);
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $calle = Calle::findOrFail($id);

            $calle->delete();

            Session::flash('message','Se elimino la calle '.$calle->full_name);

            return \Redirect::route('cities.calles.index');
        }
    #==========================================================================================
    
    #==========================================================================================
    #=== Controller helpers functions =========================================================
    #==========================================================================================

        
    #==========================================================================================
}
