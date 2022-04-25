<section>


    <div class=" container mt-5 ">
        <div class="row">

            <div class="col-md-3">
                <h1>Ingrese la informacion de las categorias</h1>
                <form action="" method="POST">
                    <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombres" required>


                    <input type="submit" class="btn btn-primary" value="Ingresar">
                </form>
            </div>

            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th hidden>Id</th>
                            <th>Nombres</th>

                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <th hidden>></th>
                            <th></th>

                            <th><a href="" class="btn btn-info">Editar</a></th>
                            <th><a href="" class="btn btn-danger">Eliminar</a></th>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>