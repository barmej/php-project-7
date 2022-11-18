<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    //
    public function edit($what){
        $user = auth()->user();
        $address = auth()->user()->address;
        if($what == 'info')
            return view('users.myaccount', compact('user','what'));
        if($what == 'user')
            return view('users.myaccount', compact('user','what'));
        if($what == 'address')
            return view('users.myaccount', compact('user','what', 'address'));
        if ($what == 'password')
            return view('users.myaccount', compact('user','what'));

    }

    public function update(){
        $user = auth()->user();
        $validateDate = request()->validate([
            'phone'=>'min:8|unique:users,id,'.auth()->user()->id,
            'email'=>'min:8|unique:users,id,'.auth()->user()->id,
            'password'=>'required',  
            'confirm'=>'same:password'
        ]);

        if(request()->email == $user->email && request()->phone == $user->phone){
            if(!auth()->attempt(['email'=>request()->email, 'password'=>request()->password]))
                return back()->withErrors([__('messages.wrongpassmsg')]);
            else 
                return back();
        }
        
        $user->email = request()->email;
        $user->phone = request()->phone; 
        $user->save();

        if(auth()->attempt(['email'=>request()->email, 'password'=>request()->password])){
            return back()->with('messages',[__('messages.updatedone')]);  
        }
        else {
            return back()->withErrors([__('messages.wrongpassmsg')]);
        }        
    }



    public function create(){
        return view('users.register');
    }

    public function store(){

        $validateDate = request()->validate([
            'name'=>'required|min:3',
            'phone'=>'required|min:8|unique:users',
            'email'=>'required|unique:users',
            'password'=>'required|min:5',
            'confirm' =>'required|same:password'
        ]);
        $newUser= new User();
        $newUser->name=request()->name; 
        $newUser->email=request()->email; 
        $newUser->password=bcrypt(request()->password); 
        $newUser->phone=request()->phone; 
        $newUser->email_verified_at= now(); 
        $newUser->save();

        if(auth()->attempt(['email'=>request()->email, 'password'=>request()->password])){
            return redirect('/');
        }
    }

    public function login(){
        if(auth()->check()){
           return redirect('/');
        }
        return view('users.login');
    }

    public function trylogin(){
        $validateDate = request()->validate([
            'email'=>'required',
            'password'=>'required|min:5'
        ]);

        if(auth()->attempt(['email'=>request()->email, 'password'=>request()->password])){
            return redirect()->intended('/');
        }
        else {
            return back()->withErrors(__('messages.loginmsg'));
        }
    }

    public function logout(){
        auth()->logout();
        session()->flush(); 
        return redirect('/');
    }

    public function myaddress(){
    $address = auth()->user()->address;
    return view('users.myaddress', compact('address'));
    }

    public function editAddress(){
        $validateDate = request()->validate([
            'area'=>'required',
            'block'=>'required',
            'street'=>'required',
            'house'=>'required',
            'password'=>'required',  
            'confirm'=>'same:password'
        ]);

        if(auth()->attempt(['email'=>auth()->user()->email, 'password'=>request()->password])){
            $newAddress=[
                'area'=>request()->area,
                'block'=>request()->block,
                'street'=>request()->street,
                'house'=>request()->house,
                'additional'=>request()->additional
            ];    

            auth()->user()->address=$newAddress;
            auth()->user()->save();
            return back()->with('messages',[__('messages.addressupdate')]);  
        }
        else {
            return back()->withErrors([__('messages.wrongpassmsg')]);
        }   
    }

    public function resetpassword(){
        $validateDate = request()->validate([
            'password'=>'min:5|required',
            'confirm'=>'same:password|required',
            'newpassword'=>'min:5|required',
            'confirmnew'=>'same:newpassword',
        ]);

        if(auth()->attempt(['email'=>auth()->user()->email, 'password'=>request()->password])){
            auth()->user()->password = bcrypt(request()->newpassword);  
            auth()->user()->save();
            return back()->with('messages',[__('messages.passwordupdate')]);  
        }
        else {
            return back()->withErrors([__('messages.wrongpassmsg')]);
        }   
    }

    public function myStores(){
        return view ('users.mystores');
    }
}
