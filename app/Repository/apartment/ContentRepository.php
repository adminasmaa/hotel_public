<?php


namespace App\Repository\apartment;

use App\Helpers\Moving;
use App\Models\Apartment\Content;
use App\Interface\apartment\ContentRepositoryInterface;
use App\Models\Apartment\Apartment;
use App\Models\Apartment\HomeContent;

class ContentRepository implements ContentRepositoryInterface
{

    protected $data;

    public function __construct()
    {
        $this->data['homeContents']=HomeContent::all();
    }

    public function index($request){
        $contents=$request->has('apart')?Apartment::findOrFail($request->apart)->apartValue:Content::all();
        if($request->has('type')){$contents=$contents->where('type',$request->get('type'));}
        $homeContents=$request->has('apart')?optional(Apartment::findOrFail($request->apart)->types)->homeContents:HomeContent::all();
       //$request->has('apart')?optional(Apartment::findOrFail($request->apart)->type)->pluck('homeContents'):HomeContent::all()
        Moving::getMoving('عرض كل اسماء المحتويات');
        return view('pages.apartments.contents.index',compact('contents','homeContents'));

    }

    public function create($request){
        return view('pages.apartments.contents.create',$this->data);
    }

    public function store($request){
        $data=$request->validated();
        $data['userAdd']=auth()->user()->id;
        if ($request->has('document') && count($request->document) > 0) {
            foreach ($request->document as $img) {
                $data['image'][]=$img;
            }
        } else {
            toastr()->error('يجب رفع صورة ع الاقل');
            return back();
        }
        Content::create($data);
        Moving::getMoving('حفظ محتوى جديد');
        toastr()->success('تم حفظ بنجاح');
        return redirect()->route('contents.index', ['apart' => $request->apartment_id]);
    }

    public function edit($content){
        $this->data['content']=$content;
        return view('pages.apartments.contents.edit',$this->data);
     }

    public function update($request,$content){

        $data=$request->validated();
        $data['userEdit']=auth()->user()->id;
        if ($request->has('document') && count($request->document) > 0) {
            foreach($content->image as $img){
                Moving::deleteImage($img);

            }
            foreach ($request->document as $img) {
                $data['image'][]=$img;
            }
        }
        $content->update($data);
        Moving::getMoving('تعديل محتوى ');
        toastr()->success('تم تعديل بنجاح');
        return redirect()->route('contents.index');
    }

    public function destroy(Content $content){
       
        foreach($content->image??[] as $img){
            Moving::deleteImage($img);
        }
       $content->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف محتوى ');

        return back();
    }
    
    public function remove($apart,Content $content){
       Apartment::findOrFail($apart)->apartValue()->detach([$content->id]);
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف محتوى ');
        return back();
    }

}
