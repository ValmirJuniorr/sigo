@if($errors->any())
    <div class="alert alert-danger alert-dismissible alert-error" >
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Erro!</h4>
        {{ $errors->first()}}
    </div>
@endif
