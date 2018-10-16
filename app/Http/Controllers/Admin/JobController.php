<?php

namespace App\Http\Controllers\Admin;

use App\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.job',['rows' => Job::paginate(1000)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.job_edit', ['job' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // передаем ошибку
        $request->flash();
        
        $this->validate($request, [
            'title' => 'required',
            'value' => 'required',
          ],['Заполните полe формы']);
        
        $job = new Job;
        $job->title = $request->title;
        $job->value = $request->value;
        $job->contacts = $request->contacts;
        $job->sort = $request->sort;
        $job->save();
        \Session::flash('success_message','Информация сохранена');
        
        //
        if(isset($request->save_and_edit)) {
            return redirect()->route('admin.job.edit',$job);
        } else {
            return redirect()->route('admin.job.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view('admin.job_edit', ['job' => $job]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $job->update($request->input());
        \Session::flash('success_message','Информация сохранена');
        
        //
        if(isset($request->save_and_edit)) {
            return redirect()->route('admin.job.edit',$job);
        } else {
            return redirect()->route('admin.job.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('admin.job.index');
    }
}
