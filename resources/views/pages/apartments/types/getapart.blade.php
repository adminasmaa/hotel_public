<select class="form-select digits " id="select_id" name="apart_id">
    <option value=''>اختر الشقه</option>
    @foreach($aparts as $apart)
    $apartVal
    <option value='{{$apart->id}}' {{$apartVal==$apart->id?'selected':''}}>{{$apart->name}}</option>
    @endforeach
</select>