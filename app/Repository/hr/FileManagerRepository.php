<?php


namespace App\Repository\hr;

use App\Helpers\Moving;
use App\Interface\hr\FileManagerRepositoryInterface;
use App\Models\hr\Employee;
use App\Models\hr\FileManger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class FileManagerRepository implements FileManagerRepositoryInterface
{
    public function index($id){
        Moving::getMoving('عرض ملف الموظف');
        $filemanagers=FileManger::where('employee_id',$id)
        ->when(request()->has('type')&&request()->get('type')!='all',function($q){
            $q->where('type',request()->get('type'));
        })->when(request()->has('onlytrash'),function($q){
            $q->onlyTrashed();
        })
        ->get();
        $types=DB::table('hr_file_type')->get();
        return view('pages.hr.fileManager.index',compact('filemanagers','types'));
    }


    public function store($request){
        $data=$request->validated();
        $data['path']=Moving::upload($request,'Employee','path');
        $fileManager=FileManger::create($data);
        
        if (Schema::hasColumn('hr_employees',$fileManager->type)) {
            
                $fileManager->employee->update([
                        $fileManager->type=>$fileManager->path
                    ]);
            
       }else{
            
                $license=$fileManager->employee->license;
                foreach($license as $key=>$item){
                    if($item->type==$fileManager->type){
                        $license[$key]->image=$fileManager->path;
                    }
                }
                $fileManager->employee->update([
                    'license'=>json_encode($license)
                ]);
         
        }
        toastr()->success('تم الاضافة بنجاح');
        Moving::getMoving('اضافةالى ملف الموظف');
        return back();

    }
 
    public function destroy($id){
      
        $fileManager=FileManger::withTrashed()->findOrFail($id);
        $employee=Employee::where('id',$fileManager->employee_id);
        if (Schema::hasColumn('hr_employees',$fileManager->type)) {
                $employee=$employee->where($fileManager->type,$fileManager->path);
                if($employee->count()>0)
                {
                    $employee->update([
                            $fileManager->type=>null
                        ]);
                }
       }else{
                $employee=$employee->whereJsonContains('license', ["type"=> $fileManager->type,"image" =>  $fileManager->path]); 
                if($employee->count()>0)
                {
                    $license=$employee->first()->license;
                    foreach($license as $key=>$item){
                        if($item->type==$fileManager->type){
                            $license[$key]->image=null;
                        }
                    }
                    $employee->update([
                        'license'=>json_encode($license)
                    ]);
                }
       }
       if ($fileManager->trashed()) {
           Moving::deleteImage($fileManager->path);
          $fileManager->forceDelete();    
        } else {
          $fileManager->delete();
        }
               
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف من ملف الموظف');
        return back();
    }

}
