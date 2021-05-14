<main class="main_reg">
    <div class="card titulo bienvenidos">
        <div class="container haztucuenta">
            <h3>Registra un usuario</h3>
        </div>
    </div>      
    <!-- form -->
    <div class="form amarillo card text-black mb-3 tarea  mx-auto container" >
        <form class="text-white" method="POST" action="">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>  
            </div>
            <div class="form-group ml-3">
               <input class="form-check-input " type="checkbox" name="admin"  {{ old('name') ? 'checked="checked"' : '' }}>

               <label class="form-check-label" for="remember"><small>Admin</small></label>
           </div>
           <br>
           <button type="submit" class="btn btn-w">Registrar</button>
       </form>
   </div>
</main>