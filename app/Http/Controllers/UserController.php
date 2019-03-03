<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function doSaveProcess(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showUserInformation(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showUpdateForm(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function doUpdateProcess(Request $request, User $user)
    {
        //
    }

    /**
     * Toggles the Status of the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function toggleStatus(User $user)
    {
        //
    }

    /**
     * Fetches all the records from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAllUserData(Request $request)
    {
        $data = array();
        $users = User::all();
        foreach($users as $user) {
            $entry = array();
            $entry['ID'] = $user->ID;
            $entry['Name'] = $user->Name;
            $entry['Username'] = $user->Username;
            $entry['Dormitory'] = $user->getDormitory()!=null?$user->getDormitory()->Name:"N/A";
            $entry['EmailAddress'] = $user->EmailAddress;

            array_push($data, $entry);
        }
        return response()->json(['aaData'=>$data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function showLoginForm() {
        return view('login');
    }

    public function doLoginProcess(Request $request) {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'Username'=>'required|min:3',
            'Password'=>'required|min:4'
        ],
            [
                'Username.required'=>'Username is Required',
                'Username.min'=>'Username should be at least 3 characters.',
                'Password.required'=>'Password is Required',
                'Password.min'=>'Password should be at least 7 characters.'
            ]
        );

        if($validator->passes()){
            $credentials = $request->only('Username', 'Password');

            $user = $credentials['Username'];
            $pass = $credentials['Password'];

            $account = User::where('Username','=',$user)->first();

            if($account) {
                if($account->Password == $pass) {
                    Auth::login($account);
                    if(session('link')) {
                        return redirect(session('link'));
                    }
                    return redirect()->to('/');
                }
                else {
                    $validator->errors()->add('Password', 'Password is Incorrect');
                    return redirect()->back()->withErrors($validator);
                }
            }
            else {
                $validator->errors()->add('Username', 'User does not exist');
                return redirect()->back()->withErrors($validator);
            }
        }
        else {
            return redirect()->back()->withErrors($validator);
        }
    }

    public function doLogoutProcess() {
        if(Auth::check()) {
            Auth::logout();
            session()->flush();
            return redirect()->to('/login');
        }
    }

    public function showAboutPage() {
        return view('about');
    }
}
