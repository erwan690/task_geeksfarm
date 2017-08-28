<?php

namespace App\Http\Controllers;

use App;
use App\User;
use App\Role;
use Illuminate\Http\Request;


class UserController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		//
		if ($request->user()->authorizeRoles(['manager'])) {
		$users = User::with('roles')->paginate(2);
		$roles = Role::all('name');
		return view('admin.user')->with(compact('users','roles'));
	}
	else {
		return redirect()->route('home')->with('messages', 'Anda Tidak Berhak Mengakses module ini');
	}

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
		// dd($request->roles);
		if ($request->user()->authorizeRoles(['manager'])) {
		$data = $this->validate($request,['name' => 'required|string|min:4|max:255',
		'email' => 'required|string|email|max:255|unique:users',
		'password' => 'required|string|min:6|regex:/^(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/|confirmed',
		],$messages = [
		'password.regex' => 'Password must contain at least one number and both uppercase and lowercase letters!',
		]);
		$user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
    ]);
    $user->roles()->attach(Role::where('name', $request->roles)->first());

		return redirect()->route('user.index');
	}
		else {
			return redirect()->route('home')->with('gagal', 'Anda Tidak Berhak Mengakses module ini');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function show(User $user) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user) {
		//
		return $user->toJson();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $user) {
		//
		//dd($user);
		if ($request->user()->authorizeRoles(['manager'])) {
		User::destroy($user->id);
		$user->roles()->detach();
		return redirect()->route('user.index');}
		else {
			return redirect()->route('home')->with('gagal', 'Anda Tidak Berhak Mengakses module ini');
		}

	}
}
