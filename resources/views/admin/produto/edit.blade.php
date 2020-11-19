@extends('layouts.admin')

@section('title', 'Editar Produto')


@section('content')
<ol class="breadcrumb bc-3">
   <li> <a href="#"><i class="fa-home"></i>Home</a> </li>
   <li> <a href="{{ url('/produto') }}">Produtos</a> </li>
   <li> <a href="#">Editar</a> </li>
</ol>

<div class="row">
   <div class="col-md-12">
      <ul class="nav nav-tabs bordered">
         <!-- available classes "bordered", "right-aligned" --> 
        <li class="active"> <a href="#home" data-toggle="tab"> <span class="visible-xs"><i class="entypo-home"></i></span> 
            <span class="hidden-xs">Produto</span> 
            </a> 
        </li>
         <li> 
             <a href="#profile" data-toggle="tab"> 
             <span class="visible-xs"><i class="entypo-user"></i></span> 
             <span class="hidden-xs">Fornecedores</span> 
            </a> 
        </li>
      </ul>
      <div class="tab-content">

        <div class="alert alert-danger" id='erro' style="display:none"></div>

        <div class="alert alert-success" id="success" style="display:none"><strong>Registro efetuado com sucesso!</strong></div>

         <div class="tab-pane active" id="home">
                <br>
                <form role="form" name="form_project" method="post" class="validate" novalidate="novalidate">
                
                    <input type="hidden" name="id" value="{{ $produto->id }}">

                    <div class="form-group"> 
                        <label class="control-label">Nome do produto</label> 
                        <input type="text" class="form-control" name="nome" data-validate="required"  placeholder="Nome do produto" value="{{ $produto->nome ?? '' }}"> 
                    </div>

                    <div class="form-group"> 
                        <label class="control-label">Descrição</label> 
                        <textarea name="descricao" class="form-control" cols="30" rows="10">{!! $produto->descricao ?? '' !!}</textarea>
                    </div>
                    
                    <div class="form-group"> 
                        <button type="button" id="enviaForm" class="btn btn-success">Cadastrar</button> 
                    </div>

                </form>
         </div>

         <div class="tab-pane" id="profile">


            <form role="form" name="form_fornecedor" method="post" class="validate" novalidate="novalidate">
            <br>
                <div class="col-md-12">

                    <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                    
                    <div class="col-md-3">
                        <select name="fornecedor_id" id="fornecedor_id" class="select2" data-allow-clear="true" data-placeholder="Selecione um fornecedor">
                        <option></option>
                            @foreach($fornecedores as $fornecedor)
                                <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome_fantasia }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <input type="text" class="form-control" name="preco" id="preco" data-validate="required"  placeholder="Preço">
                    </div>

                    <div class="col-md-5">
                        <button type="button" id="enviaFornecedor" class="btn btn-success">Adicionar</button> 
                    </div>
                </div>

            </form>
            
            <br><br>

            <hr>
            <div class="col-md-12s">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Fornecedor</th>
                            <th>Preço</th>
                        </tr>
                    </thead>
                    <tbody id="listDados">
                        @foreach($listFornecedores as $list)
                            <tr>
                                <td>{{ $list->fornecedor->nome_fantasia }}</td>
                                <td>{{ $list->preco }}</td>
                                <td> 
                                    <a href="javascript:;" class="btn btn-danger btn-sm btn-icon icon-left" onclick="deleteRegistro({{ $list->id }});"> <i class="entypo-cancel"></i>
                                        Delete
                                    </a> 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

         </div>
       
      </div>
   </div>
</div>

@endsection

@section('scripts')
<script>

function listPorject(listaFornecedor)
{
    $('#listDados').empty();
    $('#fornecedor_id').val('');
    $('#preco').val('');   
   
    var html = "";
    $.each(listaFornecedor, function(i, item)
    {
        html += '<tr>'
                    +'<td>'+item.fornecedor.nome_fantasia+'</td>'
                    +'<td>'+item.preco+'</td>'
                    +'<td> '
                        +'<a href="javascript:;" class="btn btn-danger btn-sm btn-icon icon-left" onclick="deleteRegistro('+item.id+');">' 
                            +'<i class="entypo-cancel"></i>'
                            +'Deletar'
                        +'</a> '
                    +'</td>'
                +'</tr>';
    });
    $('#listDados').append(html);
}

    function deleteRegistro(id)
    {

        if(confirm('Deseja realmente eliminar esse registro!'))
        {
            $.ajax(
            {
                url: "{{ url('/') }}/fornecedor/produto/destroy/"+id,
                type: 'DELETE',
                success: function (response){
                    listPorject(response.listFornecedores);
                }
            });	
        }

    }

	$('#enviaForm').on('click', function() {

		var formdata = new FormData($("form[name='form_project']")[0]);

			$.ajax({
				type: 'POST',
				url: "{{ url('/produto/create') }}",
				data: formdata ,
				processData: false,
				contentType: false,
				success: function (response) {
					$('#success').css('display', 'block');
                    
					setTimeout( function() {
						$('#success').css('display', 'none');                        
					}, 4000 );
				},
				error : function(response){
					$('#erro').css('display', 'block');
					var html = "";
					$('#erro').empty();
					$.each(response.responseJSON.errors, function(i, item)
					{
						html +='<li> '+item+'</li>';
					});
					$('#erro').append(html);

					setTimeout( function() {
						$('#erro').css('display', 'none');
					}, 4000 );
				}
				
			});		
    });
    
    $('#enviaFornecedor').on('click', function() {

        var formdata = new FormData($("form[name='form_fornecedor']")[0]);

        $.ajax({
            type: 'POST',
            url: "{{ url('/produto/fornecedor/create') }}",
            data: formdata ,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#success').css('display', 'block');
                setTimeout( function() {
                    $('#success').css('display', 'none');
                    listPorject(response.listFornecedores);
                    // window.location.href = "{{ url('/produto') }}";
                }, 4000 );
            },
            error : function(response){
                $('#erro').css('display', 'block');
                var html = "";
                $('#erro').empty();
                $.each(response.responseJSON.errors, function(i, item)
                {
                    html +='<li> '+item+'</li>';
                });
                $('#erro').append(html);

                setTimeout( function() {
                    $('#erro').css('display', 'none');
                }, 4000 );
            }
            
        });		
    });

</script>
@endsection