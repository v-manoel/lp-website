<div class="container text-center login shadow-lg">
    <i class="bi bi-person-bounding-box text-warning" style="font-size: 90px;"></i>

    <form action="<?= DIRPAGE . 'department/Logar'; ?>" class="mt-3" method="POST">
        <div class="mb-4 row">
            <div class="col-md-2"></div>
            <div class="col-md-8 input-group">
                <span class="bi bi-person-fill me-2 input-group-text"></span>
                <input type="email" class="form-control" name="email" id="manager_user" placeholder="user@lapechincha">
            </div>
            <div class="col-md-2"></div>
        </div>

        <div class="row mb-1">
            <div class="col-md-2"></div>
            <div class="col-md-8 input-group">
                <span class="bi bi-key-fill me-2 input-group-text"></span>
                <input type="password" class="form-control"  name="pswd" id="manager_pwd" placeholder="Senha">
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row mb-5">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="text-warning text-end  h6">Esqueci a senha</div>
            </div>
            <div class="col-md-2"></div>
        </div>


        <button type="submit" class="btn btn-warning w-25 p-1">Entrar</button>
    </form>
    <p class="mt-4 mb-3 text-muted">&copy; 2021</p>

</div>