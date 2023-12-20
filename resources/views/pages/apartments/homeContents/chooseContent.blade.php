@extends('layouts.admin')
@section('title', 'اختار المرافق')
@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">

<style>
.relative {
    position: relative;
}

.shape {
    position: absolute;
    top: 10;
    width: 150px;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    color: rgba(0, 0, 0, 0);
}

.shape:hover {
    background: rgba(0, 0, 0, .2);
    color: #7366ff;
}

#dpz-multiple-files {
    margin-right: auto;
    margin-left: auto;
    padding: 50px;
    border: 2px dashed var(--theme-deafult);
    border-radius: 15px;
    -o-border-image: none;
    border-image: none;
    background: rgba(115, 102, 255, 0.1);
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
        <form class="mega-vertical" action="{{route('homeContents.chooseContent')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-12 p-20">
                <div class="card height-equal">
                    <div class="card-header">
                        <h5> المرافق</h5>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label">اختار مرافق الفرع</label>
                                        @php
                                        $selected=auth()->user()->branch->content->pluck('id')->toArray()
                                        @endphp
                                        @foreach(App\Models\Apartment\HomeContent::all() as $item)
                                        <div class="col-sm-3">
                                            <input type="checkbox" name='content_id[]' value="{{$item->id}}" @if(in_array($item->id,$selected)) checked @endif class=""
                                                placeholder="">{{$item->name}}
                                        </div>
                                        @endforeach
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
                        <a href="{{route('contents.index')}}" class="btn btn-light">الغاء</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
@section('scripts')


@endsection