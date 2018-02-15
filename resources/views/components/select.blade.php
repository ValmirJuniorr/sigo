<select name="{{$id}}" class="form-control">
    <option disabled selected value="{{$default['id']}}">{{$default['value']}}</option>
    @foreach($set as $data)
        <option value="{{$data->id}}">{{$data->name}}</option>
    @endforeach
</select>