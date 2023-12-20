<?php


namespace App\Repository\main;
use App\Helpers\Moving;
use App\Models\main\Company;
use App\Interface\main\CompanyRepositoryInterface;

class CompanyRepository implements CompanyRepositoryInterface
{
    public function index(){
        Moving::getMoving('عرض كل اسماء الشركات');
        $companies=Company::all();
        return view('pages.main.companies.index',compact('companies'));
    }

    public function create(){
        return view('pages.main.companies.create');
    }

    public function store($request){
        $data=$request->all();
        $data = $request->validated();


        $data['userAdd']=auth()->user()->id;

        $data['is_active']=$request->has('is_active')?1:0;
        Company::create($data);
        Moving::getMoving('حفظ الشركة جديد');
        toastr()->success('تم حفظ بنجاح');

        if(url()->previous()=='products.create' ||  url()->previous()=='products.edit'){
            return back();

        }else{
             return redirect()->route('companies.index');

        }
    }

    public function edit($company){
        return view('pages.main.companies.edit',compact('company'));
     }

    public function update($request,$company){

        $data=$request->all();
        $data = $request->validated();


        $data['userEdit']=auth()->user()->id;
        $data['is_active']=$request->has('is_active')?1:0;
        $company->update($data);
        Moving::getMoving('تعديل الشركة ');
        toastr()->success('تم تعديل بنجاح');
        return redirect()->route('companies.index');
    }

    public function destroy(Company $company){

        $company->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف الشركة ');
        return back();
    }

}
