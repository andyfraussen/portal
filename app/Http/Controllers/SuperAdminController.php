<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        $organisations = Organisation::all();

        return view('super-admin.index', compact('organisations'));
    }

    public function organisationDetails(Organisation $organisationId){
        $organisation = Organisation::find($organisationId)->first();

        return view('super-admin.organisation', compact('organisation'));
    }

    public function organisationUpdate(Request $request, Organisation $organisationId){
        $organisation = Organisation::find($organisationId)->first();
        $organisation->update($request->all());

        return redirect()->route('super-admin.index');
    }
}
