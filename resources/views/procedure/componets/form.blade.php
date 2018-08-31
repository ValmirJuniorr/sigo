<div class="box-body">
    {{ Form::open(array('action' => array($action , 'id' => $procedure->id ),'method' => 'POST'))}}
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="box-body">
                <div class="form-group has-feedback col-sm-12 col-md-6 col-lg-12">
                    {{  Form::label('name', '* Nome') }}
                    {{  Form::text('name', $value = $procedure->name,array('class' => 'form-control', 'required', 'placeholder' => 'Nome'))}}
                </div>
                <div class="form-group has-feedback col-sm-12 col-md-6 col-lg-2">
                        {{  Form::label('time', '* Tempo') }}
                        {{  Form::text('timer', $value = $procedure->procedure_time,array('class' => 'form-control pull-right time','data-format' => "hh:mm:ss", 'required', 'placeholder' => 'HH:MM:SS'))}}
                </div>
                <div class="form-group has-feedback col-sm-12 col-md-3 col-lg-3">
                    {{  Form::label('price', '* Valor') }}
                    {{  Form::text('price', $value = $procedure->price ? money_format('%i',$procedure->price) : null ,array('class' => 'form-control pull-right money' ,"step" => "0.01", 'placeholder' => 'Valor','max' => '1000000'))}}
                </div>
                <div class="form-group has-feedback col-sm-12 col-md-3 col-lg-3">
                    {{  Form::label('cost_price', '* Preço de Custo') }}
                    {{  Form::text('cost_price', $value = $procedure->cost_price ? money_format('%i',$procedure->cost_price) : null ,array('class' => 'form-control pull-right money' ,"step" => "0.01", 'placeholder' => 'Valor','max' => '1000000'))}}
                </div>
                <div class="form-group col-sm-12 col-md-3 col-lg-3">
                    <label>* Categoria</label>
                    @include('components.select',['id' => 'staff_category_id','set' => $staff_categories,'tittle' => 'Categoria','default' => array('id' => $procedure->staff_category != null ? $procedure->staff_category->id : '', 'value' => $procedure->staff_category != null ? $procedure->staff_category->name : '')])
                </div>
                <div class="form-group has-feedback role-checkbox col-sm-12 col-md-2 col-lg-2 pull-right" style="margin-top: 20px;">
                    {{ Form::submit('Salvar',array('class'=> 'btn btn-primary btn-block btn-flat'))}}
                </div>
                <div class="col-sm-12 col-md-2 col-lg-2 pull-right" style="margin-top: 20px;">
                    <a class="btn btn-success btn-block btn-flat" href="{{action("ProcedureController@read_procedure")}}">Voltar</a>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
</div>

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/timer/bootstrap-datetimepicker.min.css')}}">
@endsection