<?php namespace App\Http\Controllers\people;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\people\CreatePersonaRequest;
use App\Http\Requests\people\UpdatePersonaRequest;
use App\Localidad;
use App\Calle;
use App\Domicilio;
use App\Persona;

class PersonasController extends Controller
{
    private $ruta = '';

    /**
     * constructor de la clase
     */
    public function __construct()
    {
        $href = route('people.personas.index');
        $this->ruta = $this->listOneBreadcrumb('personas',$href);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->listar($request);
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
            $whereAmI = $this->ruta . $this->listOneBreadcrumb('crear persona','',1);

            $localidades = Localidad::listByFullName();

            $data = [
                'whereAmI' => $whereAmI,
                'localidades' => $localidades
            ];

            return view( 'admin.people.personas.create', $data );
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $whereAmI = $this->ruta . $this->listOneBreadcrumb('editar persona','',1);

            $persona = Persona::with('domicilio')
                ->findOrFail($id);

            $data = [
                'whereAmI'  => $whereAmI,
                'persona' => $persona
            ];

            return view( 'admin.people.personas.edit', $data );
        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $whereAmI = $this->ruta . $this->listOneBreadcrumb('detallar persona','',1);

            $persona = Persona::with('domicilio')
                ->findOrFail($id);

            $data = [
                'whereAmI' => $whereAmI,
                'persona' => $persona
            ];

            return view( 'admin.people.personas.show', $data );
        }

        /**
         * Show all the items.
         *
         * @return Response
         */
        public function listar(Request $request)
        {
            $whereAmI = $this->ruta;

            $personas = Persona::with('domicilio')
                ->Paginate(7);

            $paginate_data = $this->paginateAditionalData( $personas );

            $data = [
                'whereAmI' => $whereAmI,
                'personas' => $personas,
                'request' => $request,
                'paginate_data' => $paginate_data
            ];
        
            return view( 'admin.people.personas.index', $data );
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
        public function store(CreatePersonaRequest $request)
        {
            $calle = new Calle();
                $calle->nombre = $request->get('nombre_calle');
                $calle->fill($request->all());
            $calle->save();

            $domicilio = new Domicilio();
                $domicilio->fill($request->all());
                $domicilio->calle_id = $calle->id;
            $domicilio->save();

            $persona = new Persona();
                $persona->fill($request->all());
                $persona->nombre = $request->get('nombre_persona');
                $persona->domicilio_id = $domicilio->id;
            $persona->save();

            return \Redirect::route('people.personas.index');
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  App\Http\Requests\cities\calles\UpdateCalleRequest $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(UpdatePersonaRequest $request, $id)
        {
            $persona = Persona::findOrFail($id);

            $persona->fill($request->all());
            $persona->save();

            return \Redirect::route('people.personas.show',$id);
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $persona = Persona::findOrFail($id);

            $persona->delete();

            Session::flash('message','Se elimino la persona '.$persona->full_name);

            return \Redirect::route('people.personas.index');
        }
    #==========================================================================================
    
    #==========================================================================================
    #=== Controller helpers functions =========================================================
    #==========================================================================================

        
    #==========================================================================================

}
