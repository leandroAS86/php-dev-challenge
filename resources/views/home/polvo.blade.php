  <div class="container">
    
      <div class="col-sm-12">        
        <form method = "get" action="{{route('polvo.show')}}"> 
          {{ csrf_field() }}

            <div class="form-group ">
              <label for="sku">Informe SKU:</label>
              <input type="text" class="form-control" name= "sku" id="sku" " required>
            </div>
          
          <div class="row"> 

            <div class="form-group">
              <div class=" col-sm-12">
                  <input type="submit" name="action" class="form-control btn btn-primary" value="Pesquisar Produto" />
              </div> 
            </div>

            <div class="form-group">
              <div class=" col-sm-12">
                  <input type="submit" name="action" class="form-control btn btn-primary" value="Pesquisar Pedido" />
              </div> 
            </div>

          </div><!-- /.row -->
        </form>        
      </div>
  </div><!-- /.container -->