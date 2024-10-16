<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
  </head>
  <body> 
  	<div class="container ">
	  
  		<div class="row mt-5">
  			<div class="col-1"></div> 
  			
  			<div class="col-10 ">
  				
  				<div class="row rounded shadow"> 
  					
  					<div class="col-md-6 col-xs-12 p-0 d-none d-sm-none d-xs-none d-md-none d-lg-block">
  						<img src="https://www.blucactus.com.mx/wp-content/uploads/2022/05/Blucactus-Cuales-son-las-estrategias-de-mercado-de-McDonalds.png" class="img-fluid rounded">
  					</div>
  					
  					<div class="col p-5">
  						
  						<h2>
  							Bienvenido de nuevo
  						</h2>
  						
  						<form class="mt-5" method="POST" action="app/AuthController.php">
							  
							  <div class="mb-3">
							    <label for="exampleInputEmail1" class="form-label">
							    	Correo electrónico
							    </label>
							    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="correo electrónico" aria-describedby="emailHelp" required name="correo">
							    
							    <div id="emailHelp" class="form-text">
							    	Ingrese su correo electrónico registrado
							    </div>
							  </div>
							  
							  <div class="mb-3">
							    <label for="exampleInputPassword1" class="form-label">
							    	Contraseña
							    </label>
							    <input type="password" placeholder="* * * * * " class="form-control" id="exampleInputPassword1" required name="contrasenna">
							  </div>
							  
							  <div class="mb-3 form-check">
							    <input type="checkbox" class="form-check-input" id="exampleCheck1">
							    <label class="form-check-label" for="exampleCheck1">
							    	Mantener la sesión abierta
							    </label>
							  </div>
							  	
						  	<div class="d-grid gap-2"> 
							  	<button type="submit" class="btn btn-primary">
							  		Acceder
							  	</button>
							 </div>
							 <input type="hidden" name="action" value="access">
						</form>
  					</div>
  				</div>
  			</div>
  		</div>
	
	</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>