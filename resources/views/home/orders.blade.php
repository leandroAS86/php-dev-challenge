<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Pedidos cadastrados</div>

                <div class="card-body">
                   <div class="table-hover table-sm">
                        <table class="table">
                            <thead>
                                <th>ID Pedido</th>
                                <th>ID Produto</th>
                                <th>Total</th>
                                <th>Data</th> 
                                <th>Deletar</th> 
                            </thead>
                            <tbody>
                                @foreach($orders as $ord)
                                <tr>
                                    <td>
                                        {{$ord->id}} 
                                    </td>
                                    <td>
                                        {{$ord->product_id}}
                                    </td>
                                    <td>
                                        {{$ord->value}}
                                    </td>
                                    <td>
                                        {{date( 'd/m/Y', strtotime($ord->created_at))}}
                                    </td>
                                    <td>
                                        <a href="{{route('ord.delete', $ord->id)}}" class="btn btn-danger ">Deletar</a>
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