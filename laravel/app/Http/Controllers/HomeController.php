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
use Hash;
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
//        $arr = [
//            0 => ['id' => 1, 'sht' => 'L', 'tm' => 'tttt'],
//            1 => ['id' => 7, 'tm' => 'xyz'],
//            2 => ['id' => 12, 'hand' => 'R'],
//            3 => ['id' => 20]
//        ];
//
//        print_r($arr);
//        exit;
        $data = Bot::all();
        return view('dashboards.home', compact('data'));
    }

    public function logout()
    {
        $this->auth->logout();
        return redirect('/login');
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

    public function responsive()
    {
        return view('responsive');
    }
}
