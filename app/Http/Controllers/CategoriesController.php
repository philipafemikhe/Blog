<?php

namespace App\Http\Controllers;

use Session;
use App\Category;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.categories.index')->with('cat', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.create');
        //echo "Create New Category";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title'=>'required'
        ]);

        $newrec = new Category;
        $newrec->name = $request->title;
        $newrec->save();
        Session::flash('success', 'Your category was  succesfully created');
        return redirect()->back();
       // dd($request->all());
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
        $rec = Category::find($id);
        return view('admin.categories.editCategory')->with('category',$rec);
        //echo "Edit category";
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
        $rec = Category::find($id);
        $rec->name = $request->categoryname;
        $rec->save();
        Session::flash('success', 'Your category was  succesfully updated');

        return redirect()->route('categories');

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
        $rec = Category::find($id);
        $rec->delete();
        Session::flash('success', 'Your category was  succesfully deleted');

        return redirect()->route('categories');
    }
}
