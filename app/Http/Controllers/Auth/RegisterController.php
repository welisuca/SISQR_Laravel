<?php

namespace App\Http\Controllers\Auth;

use App\Models\Ciudade;
use App\Models\TiposDocumento;
use App\Models\TiposUsuario;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'Ndocum' => ['required', 'string', 'max:20', 'unique:users'], // Validación para el número de documento
            'Nombres' => ['required', 'string', 'max:255'], // Validación para los nombres
            'Apellidos' => ['required', 'string', 'max:255'], // Validación para los apellidos
            'Fecha_exp' => ['required', 'date'], // Validación para la fecha de expedición
            'Fecha_nac' => ['required', 'date'], // Validación para la fecha de nacimiento
            'Sexo' => ['required', 'in:M,F'], // Validación para el sexo (Masculino o Femenino)
            'Celular' => ['required', 'string', 'max:20'], // Validación para el celular
            'Ciudad' => ['required', 'exists:ciudades,Cod_Ciud'], // Validación para la ciudad (relacionada con la tabla 'ciudades')
            'Codtip_doc' => ['required', 'exists:tipos_documentos,Codtip_doc'], // Validación para el tipo de documento (relacionado con la tabla 'tipos_documentos')
            'Codtip_usu' => ['required', 'exists:tipos_usuarios,Codtip_usu'], // Validación para el tipo de usuario (relacionado con la tabla 'tipos_usuarios')
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], // Validación para el email
            'password' => ['required', 'string', 'min:8', 'confirmed'], // Validación para la contraseña
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

     public function showRegistrationForm()
    {
        $ciudades = Ciudade::select('Cod_Ciud', 'Nom_Ciud')->get();
        $tipos_documentos = TiposDocumento::select('Codtip_doc', 'Tip_doc')->get();
        $tipos_usuarios = TiposUsuario::select('Codtip_usu', 'Tip_usu')->get();
    
        return view('auth.register', compact('ciudades', 'tipos_documentos', 'tipos_usuarios'));
    }

    protected function create(array $data)
    {
        return User::create([
            'Ndocum' => $data['Ndocum'],
            'Nombres' => $data['Nombres'],
            'Apellidos' => $data['Apellidos'],
            'Fecha_exp' => $data['Fecha_exp'],
            'Fecha_nac' => $data['Fecha_nac'],
            'Sexo' => $data['Sexo'],
            'Celular' => $data['Celular'],
            'Ciudad' => $data['Ciudad'],
            'Codtip_doc' => $data['Codtip_doc'],
            'Codtip_usu' => $data['Codtip_usu'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
