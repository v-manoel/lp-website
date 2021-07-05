<div class="w-50 mx-3 my-4 container-fluid">
    <div class="row my-bg-light-gray rounded-top input-label">
        <h4 class="t-add mb-0 py-1 text-center">Adicionar um cartão</h4>
    </div>
    <div class="row py-4 bg-white rounded-bottom input-label shadow-lg">
        <form action="<?= DIRPAGE.'account/page/addCard'?>" class="col-6" method="post">
            <div class="row py-2">
                <div class="form-floating col-12 mb-2 f-2 ">
                    <input type="text" class="form-control p-0 px-2 m-auto field-size" required name="card-holder" id="card-holder" placeholder="name example">
                    <label class="mx-2" for="card-holder">Nome do títular</label>
                </div>
                <div class="form-floating col-9 mb-2 f-1">
                    <input type="text" class="form-control p-0 px-2 m-auto field-size" required id="card-number" name="card-number" placeholder="************" minlength="16" maxlength="16" value="">
                    <label class="mx-2" for="card-number">Número</label>
                </div>
                <div class="form-floating col-3 mb-2 f-1">
                    <input type="text" class="form-control p-0 px-2 m-auto field-size " required id="card-cvv" name="card-cvv" placeholder="***" minlength="3" maxlength="3" value="">
                    <label class="mx-2" for="card-cvv">cvv</label>
                </div>

                <div class="form-floating col-8 mb-2 f-6">
                    <input type="month" class="form-control p-0 px-2 m-auto field-size" required name="card-expiration" id="card-expiration" placeholder="07/2021">
                    <label class="mx-2" for="card-expiration">Validade</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary float-right py-1 px-4">Salvar</button>
        </form>
        <div class="col-md-6 mt-5 ">
            <div class="iterativeCard newcard" id="card-model">
                <div class="flagCard bi bi-layers-half h2 text-center text-white"> </div>

                <div class="h4 text-light text-center mt-5 number" id="model-number">
                    <span class="mx-2" id="num-4">* * * *</span>
                    <span class="mx-2" id="num-8">* * * *</span>
                    <span class="mx-2" id="num-12">* * * *</span>
                    <span class="mx-2" id="num-16">* * * *</span>
                </div>
                <div class="text-light mt-3 text-center text-monospace data">
                    <span class="float-left ml-3" id="model-name">NOME E SOBRENOME</span>
                    <span class="float-right me-3" id="model-date">MM/AA</span>
                </div>
            </div>
        </div>
    </div>

</div>