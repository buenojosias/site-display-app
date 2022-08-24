<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;

class CompanyController extends Controller
{
    public function show(Company $company)
    {
        $segment = $company->segment()->first();
        $user = $company->user;
        $address = $company->address;
        return view('admin.company.show', compact(['company','segment','user','address']));
    }

    public function edit(Company $company, $secao = null)
    {
        return view('admin.company.edit', compact('company','secao'));
    }

    public function advertisings($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.company.advertisings', compact('company'));
    }
}
