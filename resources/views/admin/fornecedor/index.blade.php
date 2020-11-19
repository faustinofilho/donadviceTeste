@extends('layouts.admin')

@section('title', 'Fornecedor Listagem')


@section('content')

<ol class="breadcrumb bc-3">
   <li> <a href="#"><i class="fa-home"></i>Home</a> </li>
   <li> <a href="#">Fornecedor</a> </li>
</ol>

<a href="{{ url('/fornecedor/create') }}" class="btn btn-primary"> 
    <i class="entypo-plus"></i>
    Cadastrar
</a> 
    <br><br /> 
    <table class="table table-bordered table-striped datatable" id="table-2">
        <thead>
            <tr>
                <th>Nome Fantasia</th>
                <th>Razão social</th>
                <th>CNPJ</th>
                <th>Telefone</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fornecedores as $fornecedor)
            <tr>
                <td>{{ $fornecedor->nome_fantasia }}</td>
                <td>{{ $fornecedor->razao_social }}</td>
                <td>{{ $fornecedor->cnpj }}</td>
                <td>{{ $fornecedor->telefone }}</td>
                <td> 
                    <a href="{{ url('/fornecedor/edit/') }}/{{ $fornecedor->id }}" class="btn btn-default btn-sm btn-icon icon-left"> <i class="entypo-pencil"></i>
                        Edit
                    </a> 
                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left" onclick="deleteRegistro({{ $fornecedor->id }});"> <i class="entypo-cancel"></i>
                        Delete
                    </a> 

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br /> 

@endsection

@section('scripts')


    <script type="text/javascript">

        function deleteRegistro(id)
        {
            if(confirm('Deseja realmente eliminar esse registro!'))
            {
                $.ajax(
                {
                    url: "{{ url('/') }}/fornecedor/destroy/"+id,
                    type: 'DELETE',
                    success: function (response){
                        window.location.href = "{{ url('/fornecedor') }}";
                    }
                });	
            }

        }


    $( document ).ready(function() {
    

        jQuery(window).load(function() {
            var $table2 = $("#table-2");
            // Initialize DataTable
            $table2.DataTable({
                "sDom": "tip",
                "bStateSave": false,
                "iDisplayLength": 8,
                "aoColumns": [{
                        "bSortable": false
                    },
                    null,
                    null,
                    null,
                    null
                ],
                "bStateSave": true
            });
            // Highlighted rows
            $table2.find("tbody input[type=checkbox]").each(function(i, el) {
                var $this = $(el),
                    $p = $this.closest('tr');
                $(el).on('change', function() {
                    var is_checked = $this.is(':checked');
                    $p[is_checked ? 'addClass' : 'removeClass']('highlight');
                });
            });
            // Replace Checboxes
            $table2.find(".pagination a").click(function(ev) {
                replaceCheckboxes();
            });
        });
    });
        // Sample Function to add new row
        var giCount = 1;

        function fnClickAddRow() {
            jQuery('#table-2').dataTable().fnAddData(['<div class="checkbox checkbox-replace"><input type="checkbox" /></div>', giCount + ".1", giCount + ".2", giCount + ".3", giCount + ".4"]);
            replaceCheckboxes(); // because there is checkbox, replace it
            giCount++;
        }
    </script> 
@endsection