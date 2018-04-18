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
                background-color: #dddddd;
            }

            .asign {
                width: 60%;
                margin-top: 100px;
            }
        </style>


    </head>

    <body>

        <img src="{{asset('img/teeth.png')}}" alt="" class="" style="margin-top: 15px;" width="72px" height="72px"/>

        <span style=" position: absolute; margin-left: 20px;">
            <h1>SIG - Sistema Integrado de Gestão</h1>
            <h3>Empresa : Clinica de Olhos Dr. José Lima. CNPJ | CPF: 165.186.0001-57</h3>
            <h3>Endereço : Rua. Dr João Leito de Barreto, 350, Centro, Crato - CE</h3>
            <h3>Telefone : (88) 9.9775-7248 | (88) 9.9775-7248</h3>
        </span>

        <hr>

        <table>

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
                <th>{{$transaction->price or "-"}} R$</th>
            </tr>
            <tr>
                <th>Responsável</th>
                <th>{{$transaction->staff->name or "-"}}</th>
            </tr>
            <tr>
                <th>Descrição</th>
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

        <hr>

        <hr class="asign">
        <h3><center>Responsável : {{$transaction->staff->name}}</center></h3>
        <h3><center>Documento: {{$transaction->staff->document}}</center></h3>

        <hr class="asign">
        <h3><center>Cliente: {{$transaction->customer->name}}</center></h3>
        <h3><center>CPF: {{show_cpf_mask($transaction->customer->cpf)}}</center></h3>

    </body>

</html>