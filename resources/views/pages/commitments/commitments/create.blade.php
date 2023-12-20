@extends('layouts.admin')
@section('title', ' اضافه التزام ')

@section('content')
    <div class="container-fluid" style="background: #f4f4f4;">
        <div class="row">
            <form class="mega-vertical" action="{{route('commitments.store')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="col-sm-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5>  التزام جديد</h5>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">فرع <span
                                                    class=" text-danger">*</span></label>
                                            
                                            <div class="col-sm-9">
                                            <select class="form-select digits choosetype"  id="exampleFormControlSelect9" name="section_id">
                                                        <option value=''>اختر الفرع</option>
                                                        @foreach($CommitmentSections as $section)  
                                                          <option value='{{$section->id}}' {{old('section_id')==$section->id?'selected':''}}>{{$section->name}}</option>
                                                        @endforeach                            
                                                  
                                            </select>
                                                @error('section_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الهاتف </label>
                                            <div class="col-sm-9">
                                                <input type="tel" class="mobileNumber form-control" maxlength="20"
                                                       id="lb_phone" value="
                                                " name="phone" title="">
                                                @error('phone')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               

                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">المبلغ <span
                                                    class=" text-danger">*</span></label>
                                            
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="number" name='value' value="{{old('value')}}" title="">
                                                    @error('value')
                                                    <div style='color:red'>{{$message}}</div>
                                                    @enderror
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">رقم الحساب <span
                                                    class=" text-danger">*</span></label>
                                            
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="number" name='account_num' value="{{old('account_num')}}" title="">
                                                    @error('account_num')
                                                    <div style='color:red'>{{$message}}</div>
                                                    @enderror
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">الحاله <span
                                                    class=" text-danger">*</span></label>
                                            
                                                <div class="col-sm-9">
                                                    <div>
                                                        <input type="radio" name='status' {{old('status')=='work'?'checked':''}}  value="work" class="" placeholder="">يعمل
                                                        <input type="radio" name='status' {{old('status')=='notWork'?'checked':''}}  value="notWork" class="" placeholder="">متوقف 

                                                    </div>
                                                    @error('status')
                                                    <div style='color:red'>{{$message}}</div>
                                                    @enderror
                                                </div>
                                        </div>
                                    </div>
                                </div>
                               
                                
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-footer text-center">
                            <button class="btn btn-primary m-r-15" type="submit">حفظ</button>
                            <a href="{{route('commitments.index')}}"> <button type="button" class="btn btn-light">إلغاء</button></a>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
@section('scripts')
<script type="text/javascript">

var countries = {!! json_encode($countries) !!};
</script>
<script src="{{asset('assets/js/intlTelInput.js')}}"></script>


<script>
var phone_number = window.intlTelInput(document.querySelector("#lb_phone"), {
    separateDialCode: true,
    formatOnDisplay: true,
    preferredCountries: ["kw"],
    hiddenInput: "full",
    utilsScript: "{{asset('assets/js/utils.js?1562189064761')}}"
});
</script>
<script>
$(document).ready(function() {
});

</script>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/intlTelInput.css')}}">
@endsection

