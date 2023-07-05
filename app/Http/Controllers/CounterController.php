<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Counter;

class CounterController extends Controller
{
    function index()
    {
        $records = Counter::all();
        return view('admin.counter',['records'=>$records]);
    }

    function add()
    {
        return view('admin.add-counter');
    }

    function store(Request $request)
    {
        $counter = new Counter;

        $counter->title = $request->input('title');
        $counter->number = $request->input('number');
        $counter->icon = $request->input('icon');

        $counter->save();
        return redirect('dashboard/dynamic-edit/counter')->with('store', "Counter eklendi");
    }

    function edit($id)
    {
        $records = Counter::find($id);
        return view('admin.edit-counter',['records'=>$records]);
    }

    function update(Request $request,$id)
    {
        $counter = Counter::find($id);

        $counter->title = $request->input('title');
        $counter->number = $request->input('number');
        $counter->icon = $request->input('icon');

        $counter->save();
        return redirect('dashboard/dynamic-edit/counter')->with('update', "Counter güncellendi");
    }

    function delete($id)
    {
        $counter = Counter::find($id);
        $counter->delete();
        return redirect('dashboard/dynamic-edit/counter')->with('delete',"Counter silindi");
    }

    function view()
    {
        $records = Counter::all();
        return $records;
    }
}
