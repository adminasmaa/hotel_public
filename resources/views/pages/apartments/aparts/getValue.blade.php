<div class="media-body">
    <div class="mb-3 row">
        <label class="col-sm-12 col-form-label">المحتويات</label>
        @foreach($values as $value)
            <div class="col-sm-3">
                <input type="checkbox" name='value_id[]' value="{{$value->id}}" class="" placeholder="" @if(in_array($value->id,$selected)) checked @endif>{{$value->name['ar']}}
            </div>
        @endforeach
    </div>
</div>