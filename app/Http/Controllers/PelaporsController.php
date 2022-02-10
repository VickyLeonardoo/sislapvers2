<?php

namespace App\Http\Controllers;

use App\Pelapor;
use App\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PelaporsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pelapor::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'level' => 999,
        ]);
        VerifyUser::create([
            'token' => Str::random(60),
            'user_id' => pelapor()->user()->id,
        ]);


        Mail::to($pelapor->email)->send(new VerifyEmail($pelapor));
    }

    public function VerifyEmail($token){
        $verifiedUser = VerifiyUser::where('token',$token)->first();
        if(isset($verifiedUser)){
            $pelapor = $verifiedUser->pelapor;
            if(!$pelapor->email_verified_at){
                $pelapor->email_verified_at = Carbon::now();
                $pelapor->save();
                return \redirect(route('login'))->with('success','Your Email has been Verified');
            }else{
                return redirect()->back()->with('info','Your Email Hasl Already been verified');
            }
        }
        else{
            return redirect(route('login'))->with('error','Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
