<?php

namespace App\Http\Controllers\Admin;

use App\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAppsRequest;
use App\Http\Requests\Admin\UpdateAppsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class AppsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of App.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('app_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('app_delete')) {
                return abort(401);
            }
            $apps = App::onlyTrashed()->get();
        } else {
            $apps = App::all();
        }

        return view('admin.apps.index', compact('apps'));
    }

    /**
     * Show the form for creating new App.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('app_create')) {
            return abort(401);
        }
        return view('admin.apps.create');
    }

    /**
     * Store a newly created App in storage.
     *
     * @param  \App\Http\Requests\StoreAppsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppsRequest $request)
    {
        if (! Gate::allows('app_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $app = App::create($request->all());



        return redirect()->route('admin.apps.index');
    }


    /**
     * Show the form for editing App.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('app_edit')) {
            return abort(401);
        }
        $app = App::findOrFail($id);

        return view('admin.apps.edit', compact('app'));
    }

    /**
     * Update App in storage.
     *
     * @param  \App\Http\Requests\UpdateAppsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppsRequest $request, $id)
    {
        if (! Gate::allows('app_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $app = App::findOrFail($id);
        $app->update($request->all());



        return redirect()->route('admin.apps.index');
    }


    /**
     * Display App.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('app_view')) {
            return abort(401);
        }
        $app = App::findOrFail($id);

        return view('admin.apps.show', compact('app'));
    }


    /**
     * Remove App from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('app_delete')) {
            return abort(401);
        }
        $app = App::findOrFail($id);
        $app->delete();

        return redirect()->route('admin.apps.index');
    }

    /**
     * Delete all selected App at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('app_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = App::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore App from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('app_delete')) {
            return abort(401);
        }
        $app = App::onlyTrashed()->findOrFail($id);
        $app->restore();

        return redirect()->route('admin.apps.index');
    }

    /**
     * Permanently delete App from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('app_delete')) {
            return abort(401);
        }
        $app = App::onlyTrashed()->findOrFail($id);
        $app->forceDelete();

        return redirect()->route('admin.apps.index');
    }
}
