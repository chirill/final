<?php

namespace App\Http\Controllers\Admin;

use App\Computer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreComputersRequest;
use App\Http\Requests\Admin\UpdateComputersRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class ComputersController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Computer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('computer_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('computer_delete')) {
                return abort(401);
            }
            $computers = Computer::onlyTrashed()->get();
        } else {
            $computers = Computer::all();
        }

        return view('admin.computers.index', compact('computers'));
    }

    /**
     * Show the form for creating new Computer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('computer_create')) {
            return abort(401);
        }
        
        $locations = \App\Location::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $enum_status = Computer::$enum_status;
            
        return view('admin.computers.create', compact('enum_status', 'locations'));
    }

    /**
     * Store a newly created Computer in storage.
     *
     * @param  \App\Http\Requests\StoreComputersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComputersRequest $request)
    {
        if (! Gate::allows('computer_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $computer = Computer::create($request->all());



        return redirect()->route('admin.computers.index');
    }


    /**
     * Show the form for editing Computer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('computer_edit')) {
            return abort(401);
        }
        
        $locations = \App\Location::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $enum_status = Computer::$enum_status;
            
        $computer = Computer::findOrFail($id);

        return view('admin.computers.edit', compact('computer', 'enum_status', 'locations'));
    }

    /**
     * Update Computer in storage.
     *
     * @param  \App\Http\Requests\UpdateComputersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComputersRequest $request, $id)
    {
        if (! Gate::allows('computer_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $computer = Computer::findOrFail($id);
        $computer->update($request->all());



        return redirect()->route('admin.computers.index');
    }


    /**
     * Display Computer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('computer_view')) {
            return abort(401);
        }
        $computer = Computer::findOrFail($id);

        return view('admin.computers.show', compact('computer'));
    }


    /**
     * Remove Computer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('computer_delete')) {
            return abort(401);
        }
        $computer = Computer::findOrFail($id);
        $computer->delete();

        return redirect()->route('admin.computers.index');
    }

    /**
     * Delete all selected Computer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('computer_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Computer::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Computer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('computer_delete')) {
            return abort(401);
        }
        $computer = Computer::onlyTrashed()->findOrFail($id);
        $computer->restore();

        return redirect()->route('admin.computers.index');
    }

    /**
     * Permanently delete Computer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('computer_delete')) {
            return abort(401);
        }
        $computer = Computer::onlyTrashed()->findOrFail($id);
        $computer->forceDelete();

        return redirect()->route('admin.computers.index');
    }
}
