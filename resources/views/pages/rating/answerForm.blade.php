@extends('layouts.admin')
@section('title', 'التقييم')
@section('css')
<style>
    button {
    background-color: #04AA6D;
    color: #ffffff;
    border: none;
    padding: 10px 20px;

    cursor: pointer;
}

button:hover {
    opacity: 0.8;
}
.thumb {
    margin: 24px 5px 20px 0;
    width: 150px;
    float: left;
}

#blah {
    background-color: white;
    border-radius: 5px;
}

.thumb {
    margin: 24px 5px 20px 20px;
    width: 150px;
    float: unset;
}

.remove-image {
    display: none;
    top: -10px;
    right: -10px;
    border-radius: 10em;
    padding: 2px 6px 3px;
    text-decoration: none;
    font: 700 21px/20px sans-serif;
    background: red;
    border: 3px solid #fff;
    color: #FFF;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.5), inset 0 2px 4px rgba(0, 0, 0, 0.3);
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
    -webkit-transition: background 0.5s;
    transition: background 0.5s;
}

.remove-image:hover {
    background: #E54E4E;
    padding: 3px 7px 5px;
    top: -11px;
    right: -11px;
}

.remove-image:active {
    background: #E54E4E;
    top: -10px;
    right: -11px;
}

.ding {
    border: 1px solid red;
    margin: 20px auto;
    padding: 10px 10px 0 10px;
    text-align: center;
    color: red;
    width: 50%;
    font-size: 22px;
}

.preview-images-zone {
    width: 100%;
    border: 1px solid #ddd;
    min-height: 180px;
    /* display: flex; */
    padding: 5px 5px 0px 5px;
    position: relative;
    overflow: auto;
}

.preview-images-zone>.preview-image:first-child {
    height: 185px;
    width: 185px;
    position: relative;
    margin-right: 5px;
}

.preview-images-zone>.preview-image {
    height: 90px;
    width: 90px;
    position: relative;
    margin-right: 5px;
    float: left;
    margin-bottom: 5px;
}

.preview-images-zone>.preview-image>.image-zone {
    width: 100%;
    height: 100%;
}

.preview-images-zone>.preview-image>.image-zone>img {
    width: 100%;
    height: 100%;
}

.preview-images-zone>.preview-image>.tools-edit-image {
    position: absolute;
    z-index: 100;
    color: #fff;
    bottom: 0;
    width: 100%;
    text-align: center;
    margin-bottom: 10px;
    display: none;
}

.preview-images-zone>.preview-image>.image-cancel {
    font-size: 12px;
    position: absolute;
    top: 0;
    right: 0;
    font-weight: bold;

    cursor: pointer;
    display: none;
    z-index: 100;
}

.preview-image:hover>.image-zone {
    cursor: move;
    opacity: .5;
}

.preview-image:hover>.tools-edit-image,
.preview-image:hover>.image-cancel {
    display: block;
}
</style>
@endsection
@section('content')
<div class="container-fluid" style="background: #f4f4f4;">
    <div class="col-sm-12 col-xl-12 xl-100">
        <div class="card">
            <div class="card-header">
                <h5>إضافة تقييم</h5><span></span>
            </div>
            <div class="card-body">
                <form class="form-wizard" id="myform" action="{{route('rating.store')}}" method="post">
                    @csrf

                    @foreach($rating_questions as $rating_question)
                    <input type="hidden" name='profession_id' value='{{$rating_question->profession_id}}'>
                    <input type="hidden" name='type_id' value='{{$rating_question->type_id}}'>
                    <input type="hidden" name='user_id' value='{{request()->get("user_id")}}'>
                    <input type="hidden" name='document' value=''>
                    <input type="hidden" id="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name='q_id[]' value='{{$rating_question->id}}'>
                    <input type="hidden" name='photo_id[]' value='image_{{$rating_question->id}}'>
                    <input type="hidden" name='ids[]' value='{{$rating_question->id}}'>
                    <div class="tab" id="{{$rating_question->id}}">
                        <div class="mb-3">
                            <div class="col-sm-12">
                                <h5 class="mb-0">{{$rating_question->text}}</h5>
                            </div>
                            <div class="col">
                                <input type="hidden" class="checkeeee" value='0' check='' />
                                <div class="m-t-15 m-checkbox-inline">
                                    <div class="form-check form-check-inline checkbox checkbox-dark mb-0">
                                        <input class="form-check-input" id="inline-{{$rating_question->id}}"
                                            name='answer[]' value='1' type="checkbox">
                                        <label class="form-check-label" for="inline-{{$rating_question->id}}"><span
                                                class="digits"> نعم</span></label>
                                    </div>
                                    <div class="form-check form-check-inline checkbox checkbox-dark mb-0">
                                        <input class="form-check-input" id="inline-2-{{$rating_question->id}}"
                                            type="checkbox" name='answer[]' value='0'>
                                        <label class="form-check-label" for="inline-2-{{$rating_question->id}}"><span
                                                class="digits"> لا</span></label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="lname">الملاحظة</label>
                            <textarea class="form-control" id="lname{{$rating_question->id}}" type="text" name='note[]'
                                placeholder="ادخل الملاحظة"></textarea>

                        </div>
                        <div class="mb-3">
                            <div class='form-group' style='  border:1px solid #ccc;padding: 30px;    margin: 12px;'>
                                <label class='label-property' style='   font-size: 14px;'>ارفاق الصورة
                                </label>

                                <div class='row' id='ablah'>
                                    <div class='col-md-12'>

                                        <div class='custom-file-container' data-upload-id='mySecondImage'>

                                            <label style='display:none;'>Upload File <a href='javascript:void(0)'
                                                    class='custom-file-container__image-clear'
                                                    title='Clear Image'>&times;</a></label>

                                            <label class='custom-file-container__custom-file'>

                                                <input
                                                    class='form-control-file custom-file-container__custom-file__custom-file-input'
                                                    type='file' id='image_file_{{$rating_question->id}}'
                                                    name="image_{{$rating_question->id}}" accept="image/*" capture />



                                                <span class='custom-file-container__custom-file__custom-file-control'
                                                    style='display:none'></span>

                                            </label>

                                            <div class='custom-file-container__image-preview' style='display:none;'>
                                            </div>

                                            <div id='message_{{$rating_question->id}}' class="test"> </div>
                                            <script type="text/javascript"
                                                src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">
                                            </script>

                                            <script>
                                            // $(document).ready(function () {       
                                            $('#image_file_{{$rating_question->id}}').on('change', function(e) {
                                                document.getElementById("nextBtn").style.display = "inline";

                                                var formData = new FormData();
                                               //  console.log(e.target.files[0].name);
                                                formData.append('photo', e.target.files[0]);
                                                formData.append('name', e.target.files[0].name);
                                                formData.append('q_id', {{$rating_question->id}});
                                                formData.append('_token', '{{ csrf_token() }}');

                                                $.ajax({

                                                    url: "{{ route('rating.doupload') }}",

                                                    type: 'POST',
                                                    dataType: 'json',
                                                    contentType: 'multipart/form-data',
                                                    cache: false,
                                                    contentType: false,
                                                    processData: false,
                                                    data: formData,

                                                    success: function(response) {
                                                        console.log(response['data'].length);
                                                      
                                                        var len = 0; var img=0 ,id = 0;
                                                        if (response['data'] != null) {
                                                            len = response['data'].length -1;
                                                        }
                                                        if (len > 0) {
                                                           for (var i = 0; i < len; i++) {
                                                                 img = response['data'][0]; 
                                                                 id =  response['data'][1];    
                                                                var output =
                                                                    '<div class="preview-images-zone"><div class="preview-image preview-show-1"><button class="image-cancel" onClick="reply_click('+id+')" data-no="1">x</button><div class="image-zone"><img id="pro-img-1" src="'+img+'"></div><div class="tools-edit-image" style="display:none"><a href="javascript:void(0)" data-no="1" class="btn btn-light btn-edit-image">edit</a></div></div></div>';

                                                                    $("#message_{{$rating_question->id}}")
                                                                    .html('');
                                                                $("#message_{{$rating_question->id}}")
                                                                    .append(output);
                                                          }
                                                        }

                                                        if (response != null) {
                                                            document.getElementById("nextBtn").style
                                                                .display = "inline";

                                                        }
                                                    },

                                                    error: function(response) {

                                                        $('#message_{{$rating_question->id}}').html(
                                                            response);
                                                    }
                                                });
                                            });
                                            //  });
                                            </script>
                                            <!-- Marwa end--->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="lname">التقييم</label>
                            <div class="rating-container">
                                <select class="u-rating-square" name="rating[]" value='' selected="" autocomplete="off"
                                    required="true">

                                    <option value="">اختر</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div>
                        <div class="text-end btn-mb">
                            <button class="btn btn-secondary" id="prevBtn" type="button"
                                onclick="nextPrev(-1)">السابق</button>

                            <button class="btn btn-primary" id="nextBtn" type="button" name="nextBtn"
                                onclick="nextPrev(1)">التالي</button>
                        </div>
                    </div>
                    <div class="text-center">
                        @foreach($rating_questions as $rating_question)
                        <span class="step"></span>
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script type="text/javascript">
function reply_click(clicked_id) {

        var url = "{{ route('rating.remove_img', ":id") }}";
           url = url.replace(':id', clicked_id);
    
        $.ajax({
            url:url,
            method: 'POST',
            dataType: 'json',
            data: {
                '_token' : '{{ csrf_token() }}'
            },

        success: function(response) {
            var   len =0 , img = response['data'][0];
              $('.test').empty();  
            // $('.custom-file-container__custom-file__custom-file-input').empty();            
      
          //  $("#message_{{$rating_question->id}}").append(output);
        },
        error: function(response) {
            $('#message_{{$rating_question->id}}').html(response);
        }
    });
}
</script>

<script src="{{asset('assets/js/form-wizard/form-wizard-one.js')}}"></script>

@endsection