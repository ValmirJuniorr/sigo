<select class="form-control select_2" name="{{$id}}[]" multiple="multiple" data-placeholder="{{$name}}" style="width: 100%;" tabindex="-1" aria-hidden="true" >
    @foreach($set as $data)
        <option value="{{$data->id}}">{{$data->name}}</option>
    @endforeach
</select>