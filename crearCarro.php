<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<?php
        include 'base/head.html';
        include  'conexionBD.php';

        /*consulta*/
        $consultaMarca =$base->query("select id, nombre from marca order by id asc");

        $consultaTipoCarro =$base->query("select id, nombre from tipo_carro order by id asc");

        /*resultado*/

        $resultadoMarca = $consultaMarca->fetchAll(PDO::FETCH_OBJ);

        $resultadoTipoCarro = $consultaTipoCarro->fetchAll(PDO::FETCH_OBJ);
?>
<body>
 <header>
     <?php include 'base/nav.html';?>
 </header>
 <section id="contact" style="background-image:url('img/panorama-3094696_1920.jpg');">
     <div class="rgba-black-strong py-5">
         <div class="container">
             <div class="wow fadeIn">
                 <h2 class="h1 text-white pt-5 pb-3 text-center">Ingresar Nuevo Vehiculo</h2>

             </div>
             <div class="card mb-5 wow fadeInUp" data-wow-delay=".4s">
                 <div class="card-body p-5">
                     <div class="row">
                         <div class="col-md-8">
                             <form action="registroCarro.php" method="POST">
                                 <div class="row">
                                     <div class="col-md-6">
                                         <div class="md-form">
                                             <input class="form-control" id="name" type="text" name="name" required="required"/>
                                             <label for="name">Nombre del carro</label>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="md-form">
                                             <input class="form-control" id="email" type="text" name="_replyto" required="required"/>
                                             <label for="email">Modelo</label>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-6 input-field">
                                         <select class="form-control" name="marca">
                                             <?php
                                                     foreach($resultadoMarca as $resultado){
                                                        echo "<option value='".$resultado->id."'>".$resultado->nombre."</option>";
                                                     }
                                             ?>
                                         </select>
                                     </div>
                                     <div class="col-md-6 input-field">
                                         <select class="form-control" name="marca" >
                                             <?php
                                                     foreach($resultadoTipoCarro as $resultado){
                                                     echo "<option value='".$resultado->id."'>".$resultado->nombre."</option>";
                                                     }
                                             ?>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="md-form">
                                             <textarea class="md-textarea" id="descripcion" name="message" required="required"></textarea>
                                             <label for="descripcion">Descripción</label>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="center-on-small-only mb-4">
                                     <button class="btn btn-indigo ml-0" type="submit"><i class="fa fa-paper-plane-o mr-2"></i> Enviar</button>
                                 </div>
                             </form>
                         </div>

                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
<?php include 'base/js.html';?>
</body>
</html>