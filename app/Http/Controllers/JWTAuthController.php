<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;


class JWTAuthController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

     /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|between:2,100',
            'last_name' => 'required|string',
            'dni' => 'required|unique:users|max:8',
            'celular' => 'required|string',
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required|confirmed|string|min:6',
        ]);

        $user = User::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
                ));
        $user->roles()->attach(Role::where('name', 'admin')->first());

        return response()->json([
            'success'=>true,
            'message' => 'Successfully registered',
            'data' => $user
        ], 201);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credenciales=$request->only('email','password');
        //$request->all()
    	$validator = Validator::make($credenciales, [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
             $user=   User::where('email', $request->email)->first();
             $datos= DB::table('users')
             ->join('role_user', 'users.id', '=', 'role_user.user_id')
             ->join('roles', 'role_user.role_id', '=', 'roles.id')
             ->where('users.id', '=',$user->id)
             ->select(
                'roles.name AS tipo_de_usuario',
                'users.name',
                'last_name',
                'dni',
                'celular',
                'email')
             ->get();
                
        return response()->json([
            'success'=>true,
            'message' => 'Successfully',
            'token'=> JWTAuth::attempt($credenciales),
            'usuario' =>$datos
        ]);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function update(Request $request){
       $updateUser = User::find($request->id); 
       $updateUser ->name = $request->input('name');
       $updateUser ->last_name = $request->input('last_name');
       $updateUser ->dni = $request->input('dni');
       $updateUser ->celular = $request->input('celular');
       $updateUser ->save();
        return response()->json([
            'success'=>true,
            'message'=>'Datos actualizados correctamente',
            'data'=> $updateUser
        ]);
    }
}
