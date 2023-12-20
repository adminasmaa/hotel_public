@extends('layouts.admin')
@section('title', 'محتويات')

    @section('css') 
       <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/owlcarousel.css')}}">
  
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
        </style> 
        
    @endsection
@section('content')

<div class="container-fluid">
          <div class="col-sm-12 col-xl-12 xl-100">
            <div class="card">
              <div class="card-header">
                <h5> شقة </h5>
              </div>
              <div class="card-body">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                             @foreach($homeContents as $key=>$homeContent)
                                            <li class="nav-item"><a class="nav-link {{$key==0 ? 'active':''}}" id="pills-home-tab{{$homeContent->id}}" data-bs-toggle="pill"
                                                href="#pills-home{{$homeContent->id}}" role="tab" aria-controls="pills-home" aria-selected="true">{{$homeContent->name}}
                                                <div class="media"></div>
                                                </a></li>
                                            @endforeach
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  @foreach($homeContents as $key=>$homeContent)
                                           
                  <div class="tab-pane fade {{$key==0 ? 'show active':''}}" id="pills-home{{$homeContent->id}}" role="tabpanel"
                          aria-labelledby="pills-home-tab{{$homeContent->id}}">
                        <p class="mb-0 m-t-30">
                         <div class="card">
                                 <div class="card-header">
                                            <h5>صور</h5>
                                  </div>
                                  <div class="card-body">
                                        <div class="owl-carousel owl-theme" id="owl-carousel-rooms{{$homeContent->id}}">
                                             @foreach($images->where('home_content_id',$homeContent->id) as $item)
                                                <div class="item"><img style="width:150px"  src="{{asset('storage/'.$item->image)}}" alt=""></div>
                                             @endforeach
                                        </div>
                                  </div>
                        </div>  
                       </p>
                  </div>
                  @endforeach
                  
                </div>
              </div>
            </div>
          </div>
        </div>
    <div class="container-fluid" style="background: #f4f4f4;">
        <div class="row">
            <form class="mega-vertical" action="{{route('contents.image',$apartment->id)}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="col-sm-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5> المحتوى</h5>
                        </div>
                        <div class="card-body">

                            <div class="row">

                                 <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">المحتوى</label>
                                            <div class="col-sm-9">
                                            <select class="form-select digits" id="selectHomeContents" name="home_content_id" value="{{old('content_id')}}">
                                                        <option value=''>اختر النوع</option>
                                                        @foreach($homeContents as $content)
                                                          <option value='{{$content->id}}' {{request()->has('contents') && request()->get('contents')==$content->id?'selected':''}}>{{$content->name}}</option>
                                                        @endforeach           
                                            </select>
                                                @error('home_content_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الصور </label>
                
                                            <div class="form-group col-sm-9">
                                                    <div id="dpz-multiple-files" class="dropzone dropzone-area">
                                                        <div class="dz-message">اضافه الصور</div>
                                                    </div>
                                                    يمكنك رفع اكتر من صورة بضغط عليه

                                                    <br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الصور الحاليه </label>
                                            @foreach($images as $item)
                                                    <a href="{{route('contents.deleteImage',$item->id)}}" class="col-sm-3 relative">
                                                        <div class="shape"><i data-feather="trash-2"></i></div>
                                                            <img src="{{asset('storage/'.$item->image)}}"
                                                            alt="avatar" class="img-fluid" style="width: 150px;" alt='no image' title="الصورة الاثبات">
                                                        
                                                    </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div> -->

                             

                                
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-footer text-center">
                            <button class="btn btn-primary m-r-15" type="submit">حفظ</button>
                            <button class="btn btn-light" type="submit">إلغاء</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
@section('scripts')   
     <script src="{{asset('assets/js/owlcarousel/owl.carousel.js')}}"></script>
        <script>
             var arr=[]
            @foreach($homeContents as $homeContent)
              arr.push('#owl-carousel-rooms'+{{$homeContent->id}});
            @endforeach
            console.log(arr);
            var owl_arr = arr;
        //   

        </script>
        <script src="{{asset('assets/js/owlcarousel/owl-custom.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<script>

            var uploadedDocumentMap = {}
            Dropzone.options.dpzMultipleFiles = {
                paramName: "dzfile", // The name that will be used to transfer the file
                //autoProcessQueue: false,
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
    
    // $('document').ready(function(){
    //     $('#selectHomeContents').on('change',function(){
    //         const urlParams = new URLSearchParams(window.location.search);
                 
    //             urlParams.set('contents', $(this).val());

    //             window.location.search = urlParams;
    //     })
    // })
</script> 
@endsection
