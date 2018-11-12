<html>
    <head>
        <style>

            @page {
                size: A4;
            }

            @page :left {
                margin: 0.5cm;
            }

            @page :right {
                margin: 0.8cm;
            }

            h1, h2, h3, h4, h5 {
                page-break-after: avoid;
                margin: 5px;
            }

            body {
                counter-reset: chapternum figurenum;
                font-family: "Trebuchet MS", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Tahoma, sans-serif;
                line-height: 1.2;
                font-size: 8pt;
            }

            table {
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: none;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #eee;
            }

            .asign {
                width: 60%;
                margin-top: 100px;
            }
        </style>
    </head>

    <body>

        <img src="{{asset('img/teeth.png')}}" alt="" class="" style="margin-top: 5px;" width="auto" height="72px"/>

        <span style=" position: absolute; margin-left: 20px;">
            <h1>SIG - CLINIFÁCIL CARIRI</h1>
            <h3>Endereço : Av. Ailton Gomes, 1010, Franciscanos, Juazeiro do Norte - CE</h3>
            <h3>Telefone : (88) 3587-2001 | (88) 9.9996-0353</h3>
        </span>

        <hr>

        <table style="width: 50%; position: absolute">

            <tr>
                <th>Data</th>
                <th>{{\Carbon\Carbon::parse($transaction->transaction_date)->format('d-m-Y')}}</th>
            </tr>
            <tr>
                <th>Procedimento</th>
                <th>{{$transaction->procedure->name or "-"}}</th>
            </tr>
            <tr>
                <th>Valor</th>
                <th>{{show_money_mask($transaction->price)}}</th>
            </tr>
            <tr>
                <th>Médico</th>
                <th>{{$transaction->staff->name or "-"}}</th>
            </tr>
            <tr>
                <th>Tipo de Cadastro</th>
                <th>{{$transaction->description or "-"}}</th>
            </tr>
            <tr>
                <th>Status</th>
                <th>{{$transaction->transactionStatus->name or "-"}}</th>
            </tr>
            <tr>
                <th>Pagamento</th>
                <th>{{$transaction->paid  == true ? "OK" : "Pendente"}}</th>
            </tr>

        </table>

        <table style="width: 50%; margin-left: 50%">

            <tr>
                <th>Paciente</th>
                <th>{{$transaction->customer->name or "-"}}</th>
            </tr>
            
            <tr>
                <th>Telefone</th>
                <th>{{$transaction->customer->phone or "-"}}</th>
            </tr>
            <tr>
                <th>RG</th>
                <th>{{$transaction->customer->rg or "-"}}</th>
            </tr>
            <tr>
                <th>CPF</th>
                <th>{{$transaction->customer->cpf or "-"}}</th>
            </tr>
            <tr>
                <th>Nascimento</th>
                <th>{{date('d-m-Y', strtotime($transaction->customer->birth_date))}}</th>
            </tr>
            
            <tr>
                <th>Sexo</th>
                <th>{{$transaction->customer->gender == 1 ? 'Masculino' : 'Feminino'}}</th>
            </tr>

            <tr>
                <th>Endereço</th>
                <th>{{$transaction->customer->fullAddress() }}</th>
            </tr>

        </table>


        <hr>

        <hr class="asign">
        <h3><center>Responsável : {{$transaction->staff->name}}</center></h3>
        <h3><center>Documento: {{$transaction->staff->document}}</center></h3>

        <hr class="asign">
        <h3><center>Cliente: {{$transaction->customer->name}}</center></h3>
        <h3><center>CPF: {{show_cpf_mask($transaction->customer->cpf)}}</center></h3>

    </body>

</html>