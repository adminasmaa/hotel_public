@extends('layouts.admin')
@section('title', 'محتويات الشقه')
@section('css') 

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">

   <style>
    .relative{
       position: relative;
    }
    .shape{ position: absolute; top: 10; width: 150px;height: 100%;display: flex;justify-content: center;align-items: center;color: rgba(0,0,0,0);}
    .shape:hover{
       background: rgba(0,0,0,.2);
       color: #7366ff;
    }
    #dpz-multiple-files{
        margin-right: auto;
        margin-left: auto;
        padding: 50px;
        border: 2px dashed var(--theme-deafult);
        border-radius: 15px;
        -o-border-image: none;
        border-image: none;
        background: rgba(115,102,255,0.1);
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        min-height: 150px;
        position: relative;
            }
        </style> 
   
@endsection
@section('content')
    <div class="container-fluid" style="background: #f4f4f4;">
        <div class="row">
            <form class="mega-vertical" action="{{route('contents.update',$content->id)}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="col-sm-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5>  تعديل المحتوى</h5>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الأسم بالعربى</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='name[ar]'
                                                       value="{{old('name[ar]',$content->name['ar'])}}" class="form-control"
                                                       placeholder="">
                                                @error('name.ar')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الأسم بالنجليزيه</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='name[en]'
                                                       value="{{old('name[en]',$content->name['en'])}}" class="form-control"
                                                       placeholder="">
                                                @error('name.en')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">السعر</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='price'
                                                       value="{{old('price',$content->price)}}" class="form-control"
                                                       placeholder="">
                                                @error('price')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">المكان</label>
                                            <div class="col-sm-9">
                                            <select class="form-select digits" id="exampleFormControlSelect9" name="home_content_id" value="{{old('home_content_id')}}">
                                                        <option value=''>اختر المكان</option>
                                                   @foreach($homeContents as $homeContent)
                                                        <option value='{{$homeContent->id}}' {{$content->home_content_id==$homeContent->id?'selected':''}}>{{$homeContent->name}}</option>
                                                    @endforeach
                                            </select>
                                                @error('home_content_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="apartment_id" value="{{$content->apartment_id}}"/>
                               
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">النوع</label>
                                            <div class="col-sm-9">
                
                                            <select class="form-select digits" id="exampleFormControlSelect9" name="type" value="{{old('type')}}">
                                                        <option value=''>اختر النوع</option>
                                                        <option value='main' {{$content->type=='main'?'selected':''}} >اساسى</option>
                                                        <option value='normal'{{$content->type=='normal'?'selected':''}} >عادى</option>
                                                        <option value='maintenance' {{$content->type=='maintenance'?'selected':''}}>صيانه</option>
                                                  
                                            </select>
                                                @error('type')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <div class="form-group col-sm-12">
                                                    <div id="dpz-multiple-files" class="dropzone dropzone-area">
                                                        <div class="dz-message"> <i class="icon-cloud-up" style="    border-radius: 5px;
                                                            font-size: 50px;
                                                            color: var(--theme-deafult);"></i>                                             
                                                              <span style="color:red;">اضغط لتحميل </span>
                                            </div>
                                                    </div>
                                                    

                                                    <br><br>
                                                    يمكنك اضافه اكتر من الصورة بضغط على هذا المربع
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach($content->image??[] as $img)
                                        <div class="col-sm-3">
                                            <a target="_blank" href="{{asset('storage/'.$img)}}">
                                                <img src="{{asset('storage/'.$img)}}"
                                                    alt="avatar" class="rounded-circle img-fluid" style="width: 200px;" alt='no image' title="الصورة"></a>
                                        </div>
                                    @endforeach
                                </div>

                                
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-footer text-center">
                            <button class="btn btn-primary m-r-15" type="submit">تعديل</button>
                            <button class="btn btn-light" type="submit">إلغاء</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
@section('scripts')   
     
           
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
 <script>

            var uploadedDocumentMap = {}
            Dropzone.options.dpzMultipleFiles = {
                paramName: "dzfile", 
                maxFilesize: 5, // MB
                clickable: true,
                addRemoveLinks: true,
                acceptedFiles: 'image/*',
                dictFallbackMessage: " المتصفح الخاص بكم لا يدعم خاصيه تعدد الصوره والسحب والافلات ",
                dictInvalidFileType: "لايمكنك رفع هذا النوع من الملفات ",
                dictCancelUpload: "الغاء الرفع ",
                dictCancelUploadConfirmation: " هل انت متاكد من الغاء رفع الملفات ؟ ",
                dictRemoveFile: "حذف الصوره",
                dictMaxFilesExceeded: "لايمكنك رفع عدد اكثر من هضا ",
                headers: {
                    'X-CSRF-TOKEN':
                        "{{ csrf_token() }}"
                }
                ,
                url: "{{route('contents.save.image')}}", // Set the url
                success:
                    function (file, response) {
                        $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                        uploadedDocumentMap[file.name] = response.name
                    }
                ,
                removedfile: function (file) {
                    file.previewElement.remove()
                    var name = ''
                    if (typeof file.file_name !== 'undefined') {
                        name = file.file_name
                    } else {
                        name = uploadedDocumentMap[file.name]
                    }
                    $('form').find('input[name="document[]"][value="' + name + '"]').remove()
                }
                ,
                // previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
                init: function () {
                        @if(isset($event) && $event->document)
                    var files =
                    {!! json_encode($event->document) !!}
                        for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                    }
                    @endif
                }
            }
    
  
</script> 
@endsection

