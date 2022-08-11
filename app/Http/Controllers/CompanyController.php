<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function show(Company $company)
    {
        $segment = $company->segment;
        $user = $company->user;
        $address = $company->address;
        return view('admin.company.show', compact(['company','segment','user','address']));
    }
}
