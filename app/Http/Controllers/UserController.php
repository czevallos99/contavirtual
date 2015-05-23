<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\PaymentRequest;

use App\User;
use App\Department;
use App\Province;
use App\District;
use App\Level;

class UserController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin', ['except' => [ 'profile',  'register', 'editPassword', 'updatePassword'] ]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::latest()->paginate(20);
		
		$count['users'] = User::all()->count();

		$count['clients'] 			= User::byRole(1)->count();
		$count['administrators'] 	= User::byRole(2)->count();
		$count['accountants'] 		= User::byRole(3)->count();

		return view('users.index', compact('users', 'count'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		\Session::forget('location');

		$departments 	= $this->modelList('Department');
		$levels 		= $this->modelList('Level');

		return view('users.create', compact('departments', 'levels'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UserRequest $request)
	{
		
		$request['password'] =  '123456';

		$user = User::create($request->all());

		$user->roles()->attach(1);

		\Session::forget('location');

		\Flash::success('Usuario agregado satisfactoriamente.');

		return \Redirect::route('users.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		return view('users.profile', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);

		$departments 	= $this->modelList('Department');
		$levels 		= $this->modelList('Level');

		rememberFormLocation($user->department_id, $user->province_id, $user->district_id);

		return view('users.edit', compact('user', 'departments', 'levels'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, UserRequest $request)
	{
		$user = User::findOrFail($id);

		$user->update($request->all());

		\Session::forget('location');

		\Flash::success('El usuario se actualizó correctamente.');

		return \Redirect::route('users.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::findOrFail($id);

		$user_name = $user->name . ' ' . $user->lastname;

		$user->roles()->detach();
		$user->delete();

		\Flash::success('Se eliminó al usuario ' . $user_name . ' correctamente.');
		return view('message');
	}

	public function register(RegisterRequest $request)
	{
		$request['level_id'] =  '1';

		$user = User::create($request->except('password_confirmation'));

		$user->roles()->attach(1);
	
		\Flash::success('Usuario registrado satisfactoriamente.');

		return \Redirect::route('home');
	}

	public function profile()
	{
		$user = \Auth::user();

		return view('users.profile', compact('user'));
	}

	public function provinces($id)
    {
        $provinces = Province::where('department_id', $id)->lists('name', 'id');
        $provinces = array('' => 'Seleccione') + $provinces;

        return view('users.partials.provinces', compact('provinces'));
    }

    public function districts($id)
    {
        $districts = District::where('province_id', $id)->lists('name', 'id');
        $districts = array('' => 'Seleccione') + $districts;

        return view('users.partials.districts', compact('districts'));
    }

    public function active($id)
	{
		$user = User::findOrFail($id);

		$user->active = $user->active == 1 ? 0 : 1;

		$user->save();

		\Flash::success( 'Se actualizó el estado de ' . $user->name . ' ' . $user->lastname );
		return \Redirect::route('users.index');
	}

	public function editPassword()
	{
		$url = 'users.password.edit';
		return view('auth.password-edit', compact('url'));
	}

	public function updatePassword(PasswordRequest $request)
	{
	    $user = \Auth::user();

	    if(!\Hash::check($request['old_password'], $user->password))
	    {
	      \Flash::warning('La contraseña actual no es correcta.');
	      return \Redirect::back();
	    }

		$user->update($request->only('password'));

	    \Flash::success('Contraseña actualizada.');
	    return \Redirect::route('home');
	}

	public function resetPassword($id)
	{
		$user = User::findOrFail($id);

		$user->password = '111111';

		$user->update();

    	\Flash::success('Se restableció la contraseña del usuario '. $user->name . ' ' . $user->lastname . '.');
		return view('message');

	}

	public function modelList($entity)
	{
		$model 	= "App" . "\\" . $entity;
		$list 	= $model::lists('name', 'id');
		$list 	= array('' => 'Seleccione') + $list;

		return $list;
	}

	public function paymentsIndex($id)
	{
		$user = User::findOrFail($id);
		$payments = $user->payments()->paginate(20);

		return view('users.payments', compact('payments', 'user'));
	}

	public function myPayments()
	{
		$user = \Auth::user();
		$payments = $user->payments()->paginate(20);
		
		return view('users.payments', compact('payments', 'user'));
	}

	public function paymentsCreate($id)
	{
		$user = User::findOrFail($id);
		return view('payments.create', compact('user'));
	}

	public function paymentsStore($id, PaymentRequest $request)
	{
		$user = User::findOrFail($id);

		$user->payments()->create($request->all());


		\Flash::success('Pago registrado correctamente.');
		return \Redirect::route('users.payments.index', $id);
	}
}
