<?php
/**
 * Created by PhpStorm.
 * User: aldrin.gau
 * Date: 11/10/2015
 * Time: 2:26 PM
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Hashing\Hasher;
use Auth;
use App\User;
use App\Bot;
use Illuminate\Contracts\Auth\Guard;
class HomeController extends Controller {

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public function __construct(Guard $auth)
    {
//        $this->middleware('guest', ['except' => 'logout']);
        $this->auth = $auth;
    }

    public function show()
    {
        return view('main.home');
    }

    public function logIn(Request $request)
    {
        $userInput = $request->input();
        $credentials = ['username' => $userInput['username'], 'password' => $userInput['password']];

        if(Auth::attempt($credentials))
        {
//            return 'success';
            return redirect('user/dashboards/');
        }else{
//            return 'failed';
            return redirect('/');
        }
    }

    public function showDashboard(Request $request)
    {
//        $input = $request->input();
//        echo '<pre>';
//        print_r($input);
//        exit;
        $data = Bot::all();
        return view('dashboards.home', compact('data'));
    }

    public function logout()
    {
        $this->auth->logout();
        return redirect('/');
    }

    public function getMyShop()
    {
        return view('dashboards.myshop');
    }

    public function getPoker()
    {
        return view('shop.poker');
    }

    public function getRoulette()
    {
        return view('shop.roulette');
    }

    public function getSlotMachine()
    {
        return view('shop.slot');
    }

    public function getCrud()
    {
        return view('crud');
    }
}
