<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function ShowContactData(){
        $contacts_data = DB::table('contacts')->orderBy('id', 'desc')
        ->get();
        $totalContacts=count($contacts_data);

        return view('backend.contactdata' , compact('contacts_data','totalContacts'));

    }

}
