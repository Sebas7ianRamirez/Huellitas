<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /*-------------------------------REGISTRARSE-------------------------------------*/
    
    public function showRegister() {
        return view('LogRegRecViews.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'security_question' => 'required',
            'security_answer' => 'required|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'security_question' => $request->security_question,
            'security_answer' => $request->security_answer,
        ]);

        return redirect('/login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }    // CONTROLADOR ENCARGADO DEL REGISTRO

    /*-------------------------INICIAR SESION-------------------------------------------*/    
    public function showLogin() {
        return view('LogRegRecViews.login');
    }
    
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Correo o contraseña incorrectos');
        }
    
        // Si el login es exitoso, puedes guardar al usuario en sesión
        session(['user' => $user]);
    
        return redirect('/dashboard'); // luego puedes crear esta ruta principal del sistema
    }

    /*-------------------------------VALIDACIÓN DE PREGUNTA-------------------------------------*/

    public function showForgot() {
        return view('LogRegRecViews.recuperar');
    }
    
    public function buscarPregunta(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return back()->with('error', 'Correo no encontrado');
        }
    
        // Guardamos la pregunta y el correo en sesión temporalmente
        return back()
            ->with('pregunta', $user->security_question)
            ->with('email', $user->email);
    }
    
    public function validarRespuesta(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'respuesta' => 'required'
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user || strtolower($user->security_answer) !== strtolower($request->respuesta)) {
            return back()->with('error', 'Respuesta incorrecta');
        }
    
        // Guardar email en sesión y redirigir a vista de nueva contraseña
        session(['email' => $user->email]);
        return redirect()->route('forgot.nueva');
    }

    /*--------------------------ACTUALIZAR CONTRASEÑA------------------------------------------*/

    public function actualizarContraseña(Request $request) {
        $request->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    
        $email = session('email');
    
        if (!$email) {
            return redirect()->route('forgot.form')->with('error', 'Sesión expirada. Intenta nuevamente.');
        }
    
        $user = User::where('email', $email)->first();
    
        if (!$user) {
            return redirect()->route('forgot.form')->with('error', 'Usuario no encontrado.');
        }
    
        $user->password = Hash::make($request->password);
        $user->save();
    
        // Limpiar la sesión de recuperación
        session()->forget('email');
    
        return redirect()->route('login.form')->with('success', 'Contraseña actualizada correctamente. Ahora puedes iniciar sesión.');
    }
    
}