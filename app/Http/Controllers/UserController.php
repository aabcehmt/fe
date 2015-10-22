<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	private $ruta = '';

	/**
     * constructor de la clase
     */
	public function __construct()
	{
		$href = route('admin.users.index');
		$this->ruta = $this->listOneBreadcrumb('users',$href);
	}

	/**
     * ruta por defecto
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
	     * @return Response
	     */
	    public function create()
	    {
	        $whereAmI = $this->ruta . $this->listOneBreadcrumb('crear usuario','',1);

	        $data = [
                'whereAmI' => $whereAmI
            ];

			return view( 'admin.users.create', $data );
	    }

	    /**
	     * Show the form for editing the specified resource.
	     *
	     * @param  int  $id
	     * @return Response
	     */
	    public function edit($id)
	    {
			$whereAmI = $this->ruta . $this->listOneBreadcrumb('editar usuario','',1);

			$user = User::findOrFail($id);

			$data = [
                'whereAmI' => $whereAmI,
                'user' => $user
            ];

			return view( 'admin.users.edit', $data );
	    }

	    /**
	     * Display the specified resource.
	     *
	     * @param  int  $id
	     * @return Response
	     */	
	    public function show($id)
	    {
			$whereAmI = $this->ruta . $this->listOneBreadcrumb('detalles del usuario','',1);

			$user = User::findOrFail($id);

			$data = [
                'whereAmI' => $whereAmI,
                'user' => $user
            ];

			return view( 'admin.users.show', $data );
	    }

	    /**
		 * Show all the items.
		 *
		 * @return Response
		 */
		public function listar(Request $request)
		{
			$whereAmI = $this->listOneBreadcrumb('users','',1);
			
			$users = User::nameOrEmail($request->get('name'))->Paginate(7);

			$paginate_data = $this->paginateAditionalData( $users );

            $data = [
                'whereAmI' => $whereAmI,
                'users' => $users,
                'request' => $request,
                'paginate_data' => $paginate_data
            ];

			return view( 'admin.users.index', $data ) ;
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
	    public function store(CreateUserRequest $request)
	    {
	    	# $user = new User($request->all());
	    	
	        $user = new User();
	        $user->fill($request->all());
	        $user->save();

	        # Este metodo crea el objeto directamente en la BD.
	        # $user = User::create($request->all());

	        return \Redirect::route('admin.users.index');
	    }

	    /**
	     * Update the specified resource in storage.
	     * 
	     * @param  Request  $request
	     * @param  int  $id
	     * @return Response
	     */
	    public function update(UpdateUserRequest $request,$id)
	    {
	        $user = User::findOrFail($id);

	        $user->fill($request->all());
	        $user->save();

	        return \Redirect::route('admin.users.index');
	    }

	    /**
	     * Remove the specified resource from storage.
	     *
	     * @param  int  $id
	     * @return Response
	     */
	    public function destroy($id)
	    {
	        //
	    }
    #==========================================================================================
}



