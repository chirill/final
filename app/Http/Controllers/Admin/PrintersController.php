<?php

namespace App\Http\Controllers\Admin;

use App\Printer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePrintersRequest;
use App\Http\Requests\Admin\UpdatePrintersRequest;

class PrintersController extends Controller
{
    /**
     * Display a listing of Printer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('printer_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('printer_delete')) {
                return abort(401);
            }
            $printers = Printer::onlyTrashed()->get();
        } else {
            $printers = Printer::all();
        }

        return view('admin.printers.index', compact('printers'));
    }

    /**
     * Show the form for creating new Printer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('printer_create')) {
            return abort(401);
        }
        
        $locations = \App\Location::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.printers.create', compact('locations'));
    }

    /**
     * Store a newly created Printer in storage.
     *
     * @param  \App\Http\Requests\StorePrintersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrintersRequest $request)
    {
        if (! Gate::allows('printer_create')) {
            return abort(401);
        }
        $printer = Printer::create($request->all());



        return redirect()->route('admin.printers.index');
    }


    /**
     * Show the form for editing Printer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('printer_edit')) {
            return abort(401);
        }
        
        $locations = \App\Location::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $printer = Printer::findOrFail($id);

        return view('admin.printers.edit', compact('printer', 'locations'));
    }

    /**
     * Update Printer in storage.
     *
     * @param  \App\Http\Requests\UpdatePrintersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrintersRequest $request, $id)
    {
        if (! Gate::allows('printer_edit')) {
            return abort(401);
        }
        $printer = Printer::findOrFail($id);
        $printer->update($request->all());



        return redirect()->route('admin.printers.index');
    }


    /**
     * Display Printer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('printer_view')) {
            return abort(401);
        }
        $printer = Printer::findOrFail($id);

        return view('admin.printers.show', compact('printer'));
    }


    /**
     * Remove Printer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('printer_delete')) {
            return abort(401);
        }
        $printer = Printer::findOrFail($id);
        $printer->delete();

        return redirect()->route('admin.printers.index');
    }

    /**
     * Delete all selected Printer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('printer_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Printer::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Printer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('printer_delete')) {
            return abort(401);
        }
        $printer = Printer::onlyTrashed()->findOrFail($id);
        $printer->restore();

        return redirect()->route('admin.printers.index');
    }

    /**
     * Permanently delete Printer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('printer_delete')) {
            return abort(401);
        }
        $printer = Printer::onlyTrashed()->findOrFail($id);
        $printer->forceDelete();

        return redirect()->route('admin.printers.index');
    }
}
