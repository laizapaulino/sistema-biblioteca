<?php
    include_once 'cabecalho.php';
?>


<div class="container geral " style="margin-top: 10em;">   

<form class="form-group">
  
  <div class="row">
    <div class="col-10">
      <input name="busca" type="text" class="form-control input-lg" placeholder="Busca">
    </div>
    <div class="col-2">
      <button class="btn btn-outline-info">Buscar</button>
    </div>
  </div>
   

    <div class="custom-control custom-radio">
      <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
      <label class="custom-control-label" for="customRadio1">Buscar por livro</label>
    </div>
    <div class="custom-control custom-radio">
      <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
      <label class="custom-control-label" for="customRadio2">Buscar por autor</label>
    </div>
</form>
</div>

</body>


</html>