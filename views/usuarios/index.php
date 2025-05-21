<div class="row justify-content-center p-3">
    <div class="col-lg-10">
        <div class="card custom-card shadow-lg" style="border-radius: 10px; border: 1px solid;">
            <div class="card-body">
                <div class="row mb-3">
                    <h4 class="text-center mb-2">Bienvenido a la aplicacion para el registro de usuarios</h4>
                    <h5 class="text-center primary">MANIPULACION DE USUSARIOS</h5>
                </div>

                <div class="row justify-content-center">

                <form id="FormUsuarios">
                    <input type="hidden" id="us_id" name="us_id">

                    <div class="row mb-3 justify-content-center">
                        <div class="col-lg-6">
                            <label for="us_nombre" class="form-label">INGRESE SUS NOMBRES</label>
                            <input type="text" class="form-control" id="us_nombre" name="us_nombre" placeholder="ingrese aca sus nombres">
                        </div>
                        <div class="col-lg-6">
                            <label for="us_apellidos" class="form-label">INGRESE SUS APELLIDOS</label>
                            <input type="text" class="form-control" id="us_apellidos" name="us_apellidos" placeholder="ingrese aca sus apellidos">
                        </div>
                        <div class="col-lg-6">
                            <label for="us_nit" class="form-label">INGRESE SU NIT</label>
                            <input type="number" class="form-control" id="us_nit" name="us_nit" placeholder="ingrese aca su nit">
                        </div>
                        <div class="col-lg-6">
                            <label for="us_telefono" class="form-label">INGRESE SU TELEFONO</label>
                            <input type="number" class="form-control" id="us_telefono" name="us_telefono" placeholder="ingrese aca su telefono sin el +502">
                        </div>
                    </div>

                      <div class="row mb-3 justify-content-center">
                        <div class="col-lg-6">
                            <label for="us_correo" class="form-label">INGRESE SU CORREO</label>
                            <input type="email" class="form-control" id="us_correo" name="us_correo" placeholder="Ingrese su correo Eje. amd.pgd@gmail.com">
                        </div>
                        <div class="col-lg-6">
                            <label for="us_estado" class="form-label">ESCOJA EL ESTADO DEL USUARIO</label>
                            <select name="us_estado" id="us_estado" class="form-select">
                                <option value="">-- SELECCIONE EL ESTADO --</option>
                                <option value="P">PRESENTE</option>
                                <option value="F">FALTANDO</option>
                                <option value="C">COMISION</option>
                            </select>
                        </div>
                        <div class="row justify-content-center mt-5">
                            <div class="col-auto">
                                <button class="btn btn-success" type="submit" id="BtnGuardar">
                                    Guardar
                                </button>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-warning d-none" type="button" id="BtnModificar">
                                    Modificar
                                </button>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-dark" type="reset" id="BtnLimpiar">
                                    Limpiar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center p-3">
    <div class="col-lg-10">
        <div class="card custom-card shadow-lg" style="border-radius: 10px; border: 1px solid #007bff;">
            <div class="card-body p-3">
                <h3 class="text-center">USUARIOS REGISTRADOS EN LA BASE DE DATOS</h3>

                <div class="table-responsive p-2">
                    <table class="table table-striped table-hover table-bordered w-100 table-sm" id="TableUsuarios">
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="<?= asset('build/js/usuarios/index.js') ?>"></script>