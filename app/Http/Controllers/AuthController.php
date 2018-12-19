<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

use App\User;
use App\Profile;

class AuthController extends Controller
{
	// Index
    public function index()
    {
    	if (Auth::check()) {
    		if (Auth::user()->status == true) {
    			return redirect('/escritorio');
    		} else {
    			Auth::logout();
    			return redirect('/');
    		}
    	} else {
    		return view('auth.index');
    	}
    }

    // Autenticación
    public function auth(Request $request)
    {
    	if ($request->ajax()) {
    		$rules = [
				'auth_email'    => 'required|email',
				'auth_password' => 'required|min:8'
    		];

    		$messages = [
				'auth_email.required'    => 'Este campo es requerido',
				'auth_email.email'       => 'No tiene formato de e-mail',
				
				'auth_password.required' => 'Este campo es requerido',
				'auth_password.min'      => 'Mínimo 8 caracteres',
    		];

    		$validator = Validator::make($request->all(), $rules, $messages);

    		if ($validator->fails()) {
                return response()->json([
                    'fail'   => true,
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } elseif ($validator->passes()) {
            	if (Auth::attempt(['email' => $request->auth_email, 'password' => $request->auth_password, 'status' => true])) {
	                return response()->json([
	                    'login' => true
	                ]);
            	} else {
            		return response()->json([
	                    'login' => false
	                ]);
            	}
            }
    	}
    }

    // Crear usuario
    public function create(Request $request)
    {
    	if ($request->ajax()) {
    		$rules = [
				'name'      => 'required|min:3',
				'lastname'  => 'required|min:3',
				'email'     => 'required|email|unique:users',
				'password'  => 'required|min:8',
				'cpassword' => 'same:password'
    		];

    		$messages = [
				'name.required'     => 'Este campo es requerido',
				'name.min'          => 'Mínimo 3 caracteres',
				
				'lastname.required' => 'Este campo es requerido',
				'lastname.min'      => 'Mínimo 3 caracteres',
				
				'email.required'    => 'Este campo es requerido',
				'email.email'       => 'No tiene formato de e-mail',
				'email.unique'      => 'Ya esta registrado este correo',
				
				'password.required' => 'Este campo es requerido',
				'password.min'      => 'Mínimo 8 caracteres',
				
				'cpassword.same'    => 'Las contraseñas no coinciden'
    		];

    		$validator = Validator::make($request->all(), $rules, $messages);

    		if ($validator->fails()) {
                return response()->json([
                    'fail'   => true,
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } elseif ($validator->passes()) {
				$user           = new User($request->all());
				$user->name     = $request->name;
				$user->lastname = $request->lastname;
				$user->email    = $request->email;
				$user->password = bcrypt($request->password);

				if ($user->save()) {
                    $profile          = new Profile;
                    $profile->user_id = $user->id;
                    $profile->save();

	                return response()->json([
	                    'create' => true
	                ]);
				}
            }
    	}
    }

    // Cerrar sesión
    public function logout()
    {
    	if (Auth::check()) {
    		Auth::logout();
    		return redirect('/');
    	} else {
    		return redirect('/autenticacion');
    	}
    }
}
