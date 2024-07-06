<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use App\scripts\artykuly\Aktualnosci;
use App\Models\User;
use App\resources\CennikResource as cennik_resources;
use App\Models\cennik;
use App\scripts\cennik\Cennik as cena;
use App\scripts\RolePermission\RolePermission as RP;
use App\Models\Opinie;
use App\scripts\zlecenia\Zlecenia;

class ApiController extends Controller
{
	private $aktualnosci,$cennik,$art,$opinion;
	public function aktualnosci()
	{
		//dd($this->art = artykuly_resources::collection(artykuly::paginate(3)));
		$this->aktualnosci = new Aktualnosci;
        $this->aktualnosci = $this->aktualnosci->GetAllArtykulyPagination(3);
        return $this->aktualnosci;
	}
    public function artykul(Request $request,$id)
    {
        $this->aktualnosci = new Aktualnosci();
        return $this->aktualnosci = $this->aktualnosci->getId($id);
    }
        public function carouselindex()
    {
        $this->aktualnosci = new Aktualnosci();
        $this->aktualnosci = $this->aktualnosci->GetAllArtykuly();
        return $this->aktualnosci;
    }
    public function cena()
    {
        $this->cennik = new cena();
        return $this->cennik = $this->cennik->all_cennik();
    }
	public function search_cena(Request $request)
	{
		$this->cennik = new cena();
        return $this->cennik = $this->cennik->search_cena([$request->all()]);
	}
    public function logowanie(Request $request)
    {
        if(auth()->attempt($request->all())) {
             return response()->json(['user'=>auth()->user(),
             'access_token'=>auth()->user()->createToken('authToken')->accessToken],
             Response::HTTP_OK);
        }else{
             return response()->json(['message'=>'Nie ma takiego uzytkownika'],Response::HTTP_UNAUTHORIZED);
        }
    }
    public function rejestracja(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);


        return response()->json(['user'=>$user],Response::HTTP_CREATED);
    }
    public function test()
    {
        $rp = new RP('');
        $rp = $rp->user('all_table');
        return response()->json($rp);
    }
    public function opinion()
    {
        $this->opinion = Opinie::with('User')->get();
        return response()->json($this->opinion);
    }
    public function wszystkiezlecenia()
    {
        $zlecenia = new Zlecenia('Get');
        $zlecenia  = $zlecenia->WszystkieZlecenia();
        return response()->json($zlecenia);
    }

}
