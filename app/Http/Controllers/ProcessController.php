<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Process;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processes = Process::all();

        return view('processes.index', compact('processes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('processes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'code'=>'required'
        ]);

        $process = new Process([
            'id' => $request->get('id'),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'code' => $request->get('code'),
            //'status' => $request->get('status');
            'status' => $request->get('status') ? true : false
        ]);
        $process->save();
        return redirect('/processes')->with('success', 'Process saved!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // PA: added code from https://fahmidasclassroom.com/laravel-7-crud-using-bootstrap-modal/
    public function show($id)
    {
        return view('processes.show', compact('process'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $process = Process::find($id);
        return view('processes.edit', compact('process'));        

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
        $request->validate([
            'name'=>'required',
            'code'=>'required'
        ]);

        $process = Process::find($id);
        $process->name =  $request->get('name');
        $process->description = $request->get('description');
        $process->code = $request->get('code');
        $process->status = $request->get('status');
        $process->save();

        return redirect('/processes')->with('success', 'Process updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $process = Process::find($id);
        $process->delete();

        return redirect('/processes')->with('success', 'Process deleted!');

    }
}
