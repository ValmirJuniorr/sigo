<div class="box-body">
    {{ Form::open(array('action' => $action,'method' => 'POST'))}}
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="box-body">
                <div class="form-group has-feedback col-sm-12 col-md-6 col-lg-8">
                    {{  Form::label('name', '* Nome') }}
                    {{  Form::text('name', $value = null,array('class' => 'form-control', 'required', 'placeholder' => 'Nome'))}}
                </div>
                <div class="form-group has-feedback col-sm-12 col-md-6 col-lg-4 input-group date" id='datetimepicker3'>
                        {{  Form::label('time', '* Tempo') }}
                        <div class="input-group" >
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type='text' name="timer" class="form-control pull-right" data-format="hh:mm:ss"/>
                        </div>
                </div>
                <div class="form-group has-feedback col-sm-12 col-md-3 col-lg-3">
                    {{  Form::label('price', '* Valor') }}
                    {{  Form::number('price', $value = null,array('class' => 'form-control pull-right' ,"step" => "0.01", 'placeholder' => 'Valor','max' => '1000000'))}}
                </div>
                <div class="form-group col-sm-12 col-md-3 col-lg-3">
                    <label>* Categoria</label>
                    <select name="staff_category_id" class="form-control">
                        <option disabled selected>Categoria</option>
                        @foreach($staff_categories as $staff_category)
                            <option value="{{$staff_category->id}}">{{$staff_category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group has-feedback role-checkbox col-sm-12 col-md-2 col-lg-2 pull-right" style="margin-top: 20px;">
                    {{ Form::submit('Cadastrar',array('class'=> 'btn btn-primary btn-block btn-flat'))}}
                </div>
                <div class="col-sm-12 col-md-2 col-lg-2 pull-right" style="margin-top: 20px;">
                    <a class="btn btn-success btn-block btn-flat" href="{{action("CustomerController@read_customer")}}">Voltar</a>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
</div>

@section('custom-js')
    <script src="{{asset('js/timer/bootstrap-datetimepicker.min.js')}}"></script>


    <script>

        $('#datetimepicker3').datetimepicker({
            format: 'hh:mm:ss',
            pickDate: false
        });

    </script>


@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/timer/bootstrap-datetimepicker.min.css')}}">
@endsection