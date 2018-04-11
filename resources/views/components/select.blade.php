<select name="{{$id}}" id="{{$id}}" class="form-control">
    <option>{{$default['value']}}</option>
    @foreach($set as $data)
        <option @if($default['id'] == $data->id) {{'selected'}} @endif value="{{$data->id}}">{{$data->name}}</option>
    @endforeach
</select>