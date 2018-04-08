<div class="modal fade" id="modalTransaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Informação da Transação</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3">
                        <label for="recipient-name" class="col-form-label">Data</label>
                        <input type="text" readonly class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group col-sm-12 col-md-9 col-lg-9">
                        {{  Form::label('expense_category_id', 'Procedimento') }}
                        <div class="input-group date col-sm-11 col-md-11 col-lg-11">
                            <div class="input-group-addon"><i class="fa fa-align-justify"></i></div>
                            <select name="procedure_id" id="procedure_id" class="form-control">
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3">
                        <label for="recipient-name" class="col-form-label">Valor a Receber</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group col-sm-12 col-md-9 col-lg-9">
                        {{  Form::label('expense_category_id', 'Profissional') }}
                        <div class="input-group date col-sm-11 col-md-11 col-lg-11">
                            <div class="input-group-addon"><i class="fa fa-align-justify"></i></div>
                            @include('components.select',['id' => 'staff_id','set' => $staffs,'default' => array('id' => '0' ,'value' => 'Profissional')])
                        </div>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        {{  Form::label('expense_category_id', 'Situação') }}
                        <div class="input-group date col-sm-11 col-md-11 col-lg-11">
                            <div class="input-group-addon"><i class="fa fa-align-justify"></i></div>
                            <select name="expense_category_id" class="form-control">
                                <option></option>
                                <option value="1">Pago</option>
                                <option value="0">Inadiplente</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        {{  Form::label('expense_category_id', 'Status') }}
                        <div class="input-group date col-sm-11 col-md-11 col-lg-11">
                            <div class="input-group-addon"><i class="fa fa-align-justify"></i></div>
                            @include('components.select',['id' => 'status_id','set' => $transactionStatuses,'default' => array('id' => '0' ,'value' => 'Status')])
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-danger">Remover</button>
                <button type="button" class="btn btn-primary">Salvar Alterações</button>
            </div>
        </div>
    </div>
</div>