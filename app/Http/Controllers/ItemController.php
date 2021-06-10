<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;
use illuminate\Support\Carbon;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return item::orderBy('created_at','DESC')->get();
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
        $newitem=new item;
        $newitem->name=$request->item["name"];
        $newitem->save();
        return $newitem;
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
        $existingitem=item::find($id);
        if($existingitem){
            $existingitem->completed=$request->item['completed']?true:false;
            $existingitem->completed_at=$request->item['completed']?Carbon::now():null;
            $existingitem->save();
            return $existingitem;
        }
        return 'item not found';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingitem=item::find($id);
        if($existingitem){
            $existingitem->delete();
            return 'item deleted';
        }
        return 'item not found';
    }
}
