<?php

namespace App\Repository\apartment;

use App\Helpers\Moving;
use App\Interface\apartment\ApartmentRepositoryInterface;
use App\Models\Apartment\Apartment;
use App\Models\Apartment\ApartType;
use App\Models\Apartment\Content;
use App\Models\Apartment\HomeContent;
use App\Models\hr\Branch;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ApartmentRepository implements ApartmentRepositoryInterface
{

    public function index()
    {
        if(!request()->get('type')){
            $apartTypes=ApartType::get();
            return view('pages.apartments.aparts.index', compact('apartTypes'));
        }
        Moving::getMoving('عرض كل اسماء المحتويات');
        $apartments = Apartment::where('type_id',request()->get('type'))->get();
        return view('pages.apartments.aparts.index', compact('apartments'));
    }



    public function create()
    {
        $apartValues=Content::all();
        $types=ApartType::all();
        return view('pages.apartments.aparts.create', compact('types'));
    }

    public function store($request)
    {
        $data = $request->only(['name','floor','type_id','branch_id','area','price','type','desc','units']);
        if($request->type=='week'){

            foreach($request->prices as $key=>$price){
                $data['week_p'][]=(object)['type'=>$key + 1,'price'=>$price];;
                if($key==2){
                    $data['week_p']=json_encode($data['week_p']);
                }
            }
        }else{
            $data['day_p'][]=(object)['day'=>$request->p_day,'week'=>$request->p_week];
            $data['day_p']=json_encode($data['day_p']);
        }
        $data['image'] = Moving::upload($request, 'apartment', 'image');
        $data['userAdd']=auth()->user()->id;
        $apart=Apartment::create($data);
        $apart->apartValue()->attach($request->value_id);
        Moving::getMoving('حفظ شقه جديد');
        toastr()->success('تم حفظ بنجاح');
        return redirect()->route('apartments.index');
    }

    public function edit($apartment)
    {

        $apartValues=Content::all();
        $types=ApartType::all();
        $values=DB::table('apart_has_values')->where('apart_id',$apartment->id)->pluck('value_id')->toArray();
        return view('pages.apartments.aparts.edit', compact('apartment','types','values','apartValues'));
    }

    public function update($request, $apartment)
    {

        $data = $request->only(['name','floor','type_id','branch_id','area','price','type','desc','units']);
        if($request->type=='week'){
            foreach($request->prices as $key=>$price){
                $data['week_p'][]=(object)['type'=>$key + 1,'price'=>$price];
                if($key==2){
                    $data['week_p']=json_encode($data['week_p']);
                }
            }
            $data['day_p']=null;
        }else{
            $data['day_p'][]=(object)['day'=>$request->p_day,'week'=>$request->p_week];
            $data['day_p']=json_encode($data['day_p']);
            $data['week_p']=null;
        }
        $data['userEdit']=auth()->user()->id;
        $data['image'] = $request->has('image')?Moving::upload($request, 'apartment', 'image'):$apartment->image;

        $apartment->update($data);
        $apartment->apartValue()->sync($request->value_id);
        Moving::getMoving('تعديل شقه ');
        toastr()->success('تم تعديل بنجاح');
        return redirect()->route('apartments.index');
    }

    public function destroy(Apartment $apartment)
    {
        $images = DB::table('aparts_hr_contents')->where('apartment_id', $apartment->id)->pluck('image');
        foreach($images as $image){
            Moving::deleteImage($image);
        }
        $apartment->delete();
        Moving::getMoving('حذف شقه ');
        toastr()->success('تم الحذف بنجاح');
        return back();
    }
    public function contentImage($apartment)
    {
        $homeContents = HomeContent::all();
        $images = DB::table('aparts_hr_contents')->where('apartment_id', $apartment->id)->get();
        $homeContents = HomeContent::all();
        $apr_id = $apartment->id;

        return view('pages.apartments.aparts.addImage', compact('apartment', 'homeContents', 'images', 'apr_id'));
    }

    public function saveImage($request)
    {
        $file = $request->file('dzfile');
        $filename = Storage::disk('public')->put('homeContents', $file);
        return response()->json([
            'name' => $filename,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function saveContentImage($request, $apartment)
    {

        if ($request->has('document') && count($request->document) > 0) {
            foreach ($request->document as $img) {
                $apartment->homeContents()->attach($request->home_content_id, ['image' => $img]);
            }
        } else {
            toastr()->error('يجب رفع صورة ع الاقل');
            return back();
        }
        toastr()->success('تم اضافة الصور بنجاح');
        return back();
    }

    public function deleteContentImage($id)
    {

        $apartment_home_content = DB::table('aparts_hr_contents')
            ->where('id', $id);

        $filename=$apartment_home_content->first()->image;
        if(!is_null($filename)&&Storage::disk('public')->exists($filename)){
            Storage::disk('public')->delete($filename);
        }

        $apartment_home_content->delete();
        toastr()->success('تم حذف الصورة بنجاح');
        return back();
    }

    public function getValue($id){
        $selected=request()->has('id')?Apartment::findOrFail(request()->get('id'))->apartValue->pluck('id')->toArray():[];
        $type=ApartType::findOrFail($id);
        $values=$type->homeContents->pluck('content')->collapse();
        $html = view('pages.apartments.aparts..getValue', compact('values','selected'))->render();

        return response()->json([
            'data' => $html
        ]);
    }

}
