<div class="modal fade" id="modalTransaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Informação da Transação</h4>
            </div>
            <div class="modal-body">
                {{Form::open(array('action' => array('TransactionController@update')))}}
                    <div class="form-group col-sm-12 col-md-2 col-lg-2">
                       <label for="recipient-name" class="col-form-label">Codigo</label>
                       <input readonly type="text" class="form-control" id="code" name="code">
                   </div>
                   <div class="form-group col-sm-12 col-md-5 col-lg-5">
                    {{  Form::label('expense_category_id', 'Profissional') }}
                    <div class="input-group date col-sm-12 col-md-12 col-lg-12">
                        <div class="input-group-addon"><i class="fa fa-align-justify"></i></div>
                        @include('components.select',['id' => 'staff_transaction','name' => 'staff_transaction','set' => $staffs,'default' => array('id' => '0' ,'value' => '')])
                    </div>
                    </div>
                    <div class="form-group col-sm-12 col-md-2 col-lg-2">
                        <label for="recipient-name" class="col-form-label">P.Custo</label>
                        <input type="text" class="form-control" id="cost_price" name="cost_price">
                    </div>
                    <div class="form-group col-sm-12 col-md-2 col-lg-2">
                        <label for="recipient-name" class="col-form-label">V.Receber</label>
                        <input type="text" class="form-control" id="value_procedure" name="value_procedure">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        {{  Form::label('expense_category_id', 'Status') }}
                        <div class="input-group date col-sm-12 col-md-12 col-lg-12">
                            <div class="input-group-addon"><i class="fa fa-align-justify"></i></div>
                            @include('components.select',['id' => 'status_transaction','name'=> 'status_transaction','set' => $transactionStatuses,'default' => array('id' => '' ,'value' => '')])
                        </div>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                      {{  Form::label('expense_category_id', 'Situação') }}
                       <div class="input-group date col-sm-11 col-md-11 col-lg-11">
                        <div class="input-group-addon"><i class="fa fa-align-justify"></i></div>
                        <select id="situation_transaction" name="situation_transaction" class="form-control">
                            <option value="1">Pago</option>
                            <option value="0">Inadiplente</option>
                        </select>
                       </div>
                     </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                           <label for="description">Descrição do Procedimento</label>
                           <textarea class="form-control" name="description" id="description_transaction" rows="3" cols="40"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button onClick="location.reload()" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </div>
         {{ Form::close() }}
        </div>
    </div>
</div>