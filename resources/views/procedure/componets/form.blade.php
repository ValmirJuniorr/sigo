<div class="box-body">
    {{ Form::open(array('action' => $action,'method' => 'POST'))}}
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="box-body">
                <div class="form-group has-feedback col-sm-12 col-md-6 col-lg-12">
                    {{  Form::label('name', '* Nome') }}
                    {{  Form::text('name', $value = $procedure->name,array('class' => 'form-control', 'required', 'placeholder' => 'Nome'))}}
                </div>
                <div class="form-group has-feedback col-sm-12 col-md-6 col-lg-2">
                        {{  Form::label('time', '* Tempo') }}
                        {{  Form::text('timer', $value = $procedure->procedure_time,array('class' => 'form-control pull-right','data-format' => "hh:mm:ss", 'required', 'placeholder' => 'hh:mm:ss'))}}
                </div>
                <div class="form-group has-feedback col-sm-12 col-md-3 col-lg-3">
                    {{  Form::label('price', '* Valor') }}
                    {{  Form::number('price', $value = $procedure->price,array('class' => 'form-control pull-right' ,"step" => "0.01", 'placeholder' => 'Valor','max' => '1000000'))}}
                </div>
                <div class="form-group col-sm-12 col-md-3 col-lg-3">
                    <label>* Categoria</label>
                    @include('components.select',['id' => 'staff_category_id','set' => $staff_categories,'tittle' => 'Categoria','default' => array('id' => $procedure->staff_category != null ? $procedure->staff_category->id : '', 'value' => $procedure->staff_category != null ? $procedure->staff_category->name : '')])
                </div>
                <div class="form-group has-feedback role-checkbox col-sm-12 col-md-2 col-lg-2 pull-right" style="margin-top: 20px;">
                    {{ Form::submit('Cadastrar',array('class'=> 'btn btn-primary btn-block btn-flat'))}}
                </div>
                <div class="col-sm-12 col-md-2 col-lg-2 pull-right" style="margin-top: 20px;">
                    <a class="btn btn-success btn-block btn-flat" href="{{action("ProcedureController@read_procedure")}}">Voltar</a>
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