<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Produto cadastrado</div>

                <div class="card-body">
                   <div class="table-hover table-sm">
                        <table class="table">
                            <thead>
                                <th>Nome</th>
                                <th>SKU</th>
                                <th>Preço</th>
                                <th>Descrição</th> 
                                <th>Atualizar</th>
                                <th>Deletar</th>
                            </thead>
                            <tbody>
                                 @foreach($products as $prod)
                                <tr>
                                    <td>
                                        {{$prod->name}} 
                                    </td>
                                    <td>
                                        {{$prod->sku}}
                                    </td>
                                    <td>
                                        {{$prod->price}}
                                    </td>
                                    <td>
                                        {{$prod->description}}
                                    </td>
                                    <td>
                                         <a href="{{route('prod.formupdate', $prod->sku)}}" class="btn btn-primary ">Atualizar</a>
                                    </td>
                                    <td>
                                        <a href="{{route('prod.delete', $prod->sku)}}" class="btn btn-danger ">Deletar</a>
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
</div>