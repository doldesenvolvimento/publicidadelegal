<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function login()
    {
        return view('login');
    } 

    public function autenticacao(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'inativo' => 2])) {
            $request->session()->regenerate();
 
            return redirect()->route('index-publicacao');
        }
 
        return back()->with(['message' => 'Credenciais Inválidas!',]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}