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
<div class="row">
     <div class="col-sm-12 col-md-12 col-lg-12">
         <div class="box-header with-border">
             <h4 class="box-title">Grupos de Perguntas</h4>
             <div class=" pull-right">
                 <a href="{{ action('CustomerController@create_customer') }}" class="btn btn-success btn-block btn-flat">
                     Novo Grupo
                 </a>
             </div>
         </div>
         <div class="box-body">
             <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                 <div class="col-sm-12 box-body table-responsive no-border">
                     <div class="box-body">
                         <table class="table table-striped table-bordered">
                             <thead>
                             <tr>
                                 <th>Id</th>
                                 <th>Nome</th>
                                 <th>Tipo</th>
                                 <th>Perguntas</th>
                                 <th>Deletar</th>
                             </tr>
                             </thead>
                             <tbody>

                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
</div>


@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/timer/bootstrap-datetimepicker.min.css')}}">
@endsection