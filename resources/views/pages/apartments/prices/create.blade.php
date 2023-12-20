@extends('layouts.admin')
@section('title', ' اضافة سعر ')

@section('content')
<div class="container-fluid">
    <div class="row">
        <form class="mega-vertical" action="{{route('prices.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-12 col-xxl-12 box-col-12 p-20">
                <div class="card height-equal">
                    <div class="card-header">
                        <h5>إضافة سعر جديد </h5>
                    </div>
                    <div class="card-body">

                        <div class="row">
                           <div class="d-flex mb-3">
                           <input type="radio" value="day" name="type" {{ old('type') == 'day' ? 'checked' : ''}} />
                            السعر حسب اليوم
                           </div>
                            <div class="d-flex mb-3">
                            <input type="radio" value="week" name="type" {{old('type')=="week"?"checked":""}} /> السعر
                            حسب الاسبوع
                            </div>
                           
                          
                            <div class="row day type" style="display:none">
                                <div class="col-sm-12">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">سعر اليوم العادى<span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" name="p_day"
                                                    value="{{old('p_day')}}">
                                                @error('p_day')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">سعر العطله<span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" name="p_week"
                                                    value="{{old('p_week')}}">
                                                @error('p_week')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row week type" style="display:none">
                                <div class="col-sm-12">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">بدايه الاسبوع(من الاحد الى
                                                الاربعاء)<span class=" text-danger">*</span></label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" name="prices[]"
                                                    value="{{old('prices.0')}}">
                                                @error('prices.0')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">نهايه الاسبوع(من الخميس الى
                                                السبت)<span class=" text-danger">*</span></label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" name="prices[]"
                                                    value="{{old('prices.1')}}">
                                                @error('prices.1')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"><span
                                                    class=" text-danger">*</span>الاسبوع كامل من (من الاحد الى
                                                السبت)</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" name="prices[]"
                                                    value="{{old('prices.2')}}">
                                                @error('prices.2')
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
                            <a href="{{url('clients',array('branch' => request()->get('branch')))}}">
                                <button type="button" class="btn btn-light">إلغاء</button>
                            </a>

                        </div>

                    </div>
                </div>
            </div>


        </form>
    </div>
</div>

@endsection
@section('scripts')
<script type="text/javascript">
var radioval = $("input[type=radio][name='type']:checked").val();
if (radioval == 'day' || radioval == 'week') {
    $('.' + radioval).show();
}
$('input[type=radio][name=type]').change(function() {
    $('.type').hide();
    $('.' + $(this).val()).show();
});
</script>
@endsection