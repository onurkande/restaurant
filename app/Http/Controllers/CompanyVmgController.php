<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company_vmg;
use Illuminate\Support\Facades\File;

class CompanyVmgController extends Controller
{
    function index()
    {
        $records = Company_vmg::all();
        return view('admin.company_vmg',['records'=>$records]);
    }

    function add()
    {
        return view('admin.add-company_vmg');
    }

    function store(Request $request)
    {
        $company_vmg = new Company_vmg;
        $vmgCount = Company_vmg::count();

        if ($vmgCount >= 3) {
            return redirect('dashboard/dynamic-edit/company_vmg')->with('delete', 'En fazla 3 veri tutulabilir.');
        }else
        {
            $company_vmg->title = $request->input('title');
            $company_vmg->icon = $request->input('icon');
            $company_vmg->content = $request->input('content');
    
            $company_vmg->save();
        }

        return redirect('dashboard/dynamic-edit/company_vmg')->with('store', "Company_vmg eklendi");
    }

    function edit($id)
    {
        $records = Company_vmg::find($id);
        return view('admin.edit-company_vmg',['records'=>$records]);
    }

    function update(Request $request,$id)
    {
        $company_vmg = Company_vmg::find($id);

        $company_vmg->title = $request->input('title');
        $company_vmg->icon = $request->input('icon');
        $company_vmg->content = $request->input('content');

        $company_vmg->save();
        return redirect('dashboard/dynamic-edit/company_vmg')->with('update', "Company_vmg güncellendi");
    }

    function delete($id)
    {
        $company_vmg = Company_vmg::find($id);
        $company_vmg->delete();
        return redirect('dashboard/dynamic-edit/company_vmg')->with('delete',"Company_vmg silindi");
    }

    function deleteAll()
    {
        $company_vmg = Company_vmg::all();

        foreach ($company_vmg as $single) {
            $single->delete();
        }

        return redirect('dashboard/dynamic-edit/company_vmg')->with('delete', "Company_vmg silindi");
    }

    function view()
    {
        $company_vmg = Company_vmg::all();
        return $company_vmg;
    }
}
