<div class="w-50 mx-2 my-4 container-fluid">
  <div class=" my-bg-light-gray rounded-top input-label">
    <h4 class="t-add mb-0 py-1 text-center">Adicionar um endereço</h4>
  </div>
    <form action="<?= DIRPAGE.'account/page/submitAddress'?>" class="p-2 bg-white rounded-bottom input-label shadow-lg" method="post">
    <?php if($this->content['addr']->getId()){ ?>
      <input type='hidden' disabled name="id" value="<?= $this->content['addr']->getId(); ?>">
    <?php } ?> 
    <div class="row px-3 py-2">
      <div class="form-floating col-6 mb-3 f-1">
        <input type="text" class="form-control p-0 px-2 m-auto field-size " id="name" name="name" placeholder="Ex.: Casa" value="<?= $this->content['addr']->getName(); ?>">
        <label class="mx-2" for="name">Apelido do endereço</label>
      </div>
      <div class="form-floating col-10 mb-3 f-6">
        <input type="text" class="form-control p-0 px-2 m-auto field-size " id="street" name="street" placeholder="Ex.: travessa sempre verde" value="<?= $this->content['addr']->getStreet(); ?>">
        <label class="mx-2" for="street">Rua</label>
      </div>
      <div class="form-floating col-2 mb-3 f-2 ">
        <input type="text" class="form-control p-0 px-2 m-auto field-size " required name="number" id="number" placeholder="Ex.: 15" value="<?= $this->content['addr']->getNumber(); ?>">
        <label class="mx-2" for="number">Nº</label>
      </div>

      <div class=" mb-3 f-3 col-3">
        <select class="form-select py-2" id="state" name="state" required>
          <?php if ($this->content['addr']->getState()) { ?>
            <option value="<?= $this->content['addr']->getState()->getUf() ?>" selected><?= $this->content['addr']->getState()->getUf() ?></option>
          <?php } else { ?>
            <option value="" selected disabled hidden>UF</option>
          <?php }
          foreach ($this->content['states'] as $state) { ?>
            <option value="<?= $state->getId() ?>"><?= $state->getUf() ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="form-floating col-9 mb-3 f-4">
        <input type="text" class="form-control p-0 px-2 m-auto field-size cep" required name="cep" id="cep" placeholder="Ex.: 000000-000" value="<?= $this->content['addr']->getCep(); ?>">
        <label class="mx-2" for="cep">CEP</label>
      </div>

      <div class=" mb-3 f-3 col-9">
        <select class="form-select py-2" id="city" name="city" required>
          <?php if ($this->content['addr']->getCity()) { ?>
            <option value="<?= $this->content['addr']->getCity()->getId() ?>" selected><?= $this->content['addr']->getCity()->getName() ?></option>
          <?php } else { ?>
            <option value="" selected disabled hidden>Selecione um estado primeiro</option>
          <?php } ?>
        </select>
      </div>

      <div class="form-floating col-5 mb-3 f-5">
        <input type="text" class="form-control p-0 px-2 m-auto field-size " id="district" name="district" placeholder="Ex.: Periperi" value="<?= $this->content['addr']->getDistrict(); ?>">
        <label class="mx-2" for="district">Bairro</label>
      </div>
      <div class="form-floating col-7 mb-3 f-5">
        <input type="text" class="form-control p-0 px-2 m-auto field-size " id="destinatary" name="destinatary" placeholder="Ex.: João Almeida" value="<?= $this->content['addr']->getDestinatary(); ?>">
        <label class="mx-2" for="destinatary">Destinatário</label>
      </div>

      <div class="col-12 mb-3 f-6">
        <textarea class="form-control py-2 px-2 m-auto" id="description" name="description" rows="4" placeholder="Descreva as caracteristicas desse endereço"><?= $this->content['addr']->getDescription(); ?></textarea>
      </div>

      <div class="text-right col-12 mt-4 mb-3">
        <button type="reset" class="btn btn-outline-danger mx-4">Cancelar</button>
        <button type="submit" class="btn btn-primary float-none">Confirmar</button>
      </div>
    </div>
  </form>
</div>