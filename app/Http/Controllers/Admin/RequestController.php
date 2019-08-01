<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.requests.index')->with('users',\App\Request::getAllPendingRequest());
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
        return view('admin.requests.edit')->with(['user_request'=>\App\Request::getRequestById($id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if(($request->action) == 'Accept'){
            DB::table('role_user')
                ->insert(['user_id'=>$request->user_id, 'role_id'=>2]);
            DB::table('requests')
                ->where('id',$id)
                ->update(['status_id'=>2]);
        }else {
           DB::table('request')
               ->where('id',$id)
               ->update(['status_id'=>3, 'note'=>$request->note]);
        }
        return redirect() -> route('admin.requests.index');
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
