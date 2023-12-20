@extends('layouts.admin')
@section('title', 'التفتيش')

@section('content')
    <div class="container-fluid" style="background: #f4f4f4;">
        <div class="col-sm-12 col-xl-12 xl-100">
            <div class="card">
                <div class="card-header">
                    <h5>إضافة تفتيش</h5><span></span>
                </div>
                <div class="card-body">
                    <form class="form-wizard" id="regForm" action="{{route('answers.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name='document' value=''>
                        <input type="hidden" name='type_id' value='{{$id}}'>
                        @foreach($checkalls as $checkall)
                            <input type="hidden" name='ids[]' value='{{$checkall->id}}'>
                            <div class="tab" id="{{$checkall->id}}">
                                <div class="mb-3">
                                    <div class="col-sm-12">
                                        <h5 class="mb-0">{{$checkall->question}} <span
                                                class=" text-danger">*</span></label></h5>
                                    </div>
                                    <div class="col">
                                        <input type="hidden" class="checkeeee" value='0' check=''/>

                                        <div class="m-t-15 m-checkbox-inline">

                                            <div class="form-check form-check-inline checkbox checkbox-dark mb-0">
                                                <input class="form-check-input" id="inline-{{$checkall->id}}"
                                                       name='answer[]' value='1' type="checkbox">
                                                <label class="form-check-label" for="inline-{{$checkall->id}}"><span
                                                        class="digits"> نعم</span></label>
                                            </div>
                                            <div class="form-check form-check-inline checkbox checkbox-dark mb-0">
                                                <input class="form-check-input" id="inline-2-{{$checkall->id}}"
                                                       type="checkbox" name='answer[]' value='0'>
                                                <label class="form-check-label" for="inline-2-{{$checkall->id}}"><span
                                                        class="digits"> لا</span></label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="lname">
                                        الملاحظة
                                    </label></label>
                                    <textarea class="form-control" id="lname{{$checkall->id}}" type="text" name='note[]'
                                              placeholder="ادخل الملاحظة"></textarea>

                                </div>
                                <div class="mb-3">

                                    <label for="contact">رفع الصورة <span
                                            class=" text-danger">*</span></label></label>
                                    <input class="form-control" accept="image/*" id="contact{{$checkall->id}}"
                                           type="file" capture data-numid="{{$loop->index}}" onchange="readURL(this)"
                                           placeholder="رفع الصورة">
                                    <img width="150px" id="image" class="mt-3">
                                </div>
                            </div>
                        @endforeach
                        <div>
                            <div class="text-end btn-mb">
                                <button class="btn btn-secondary" id="prevBtn" type="button"
                                        onclick="nextPrev(-1)">السابق
                                </button>

                                <button class="btn btn-primary" id="nextBtn" type="button" onclick="nextPrev(1)">
                                    التالي
                                </button>
                            </div>
                        </div>

                        <div class="text-center">
                            @foreach($checkalls as $checkall)
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
        $list = [];

        function readURL(input) {
            $num = $(input).data('numid');
            var formData = new FormData();
            var photo = $(input).prop('files')[0];

            formData.append('photo', photo);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                url: "{{ route('answers.answer.saveimage') }}",
                type: 'POST',
                contentType: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: (response) => {
                    $list[$num] = response.imagName;

                    $(input).siblings('#image').attr('src', `{{ asset('storage/') }}${'/' + response.imagName}`).show();
                    $("input[name='document']").val($list);
                },
                error: (response) => {
                    console.log(response);
                }
            });
        }


        $('.form-check-input').on('change', function () {
            $input = $(this).closest('.tab').find('.checkeeee');
            $input.val() == 0 ? $input.val(1) : $input.val(0);
        })
    </script>
@endsection
