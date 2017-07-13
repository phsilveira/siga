<div class="container">
<h2 style="margin-top:0px">Assets <?php echo $button ?></h2>
<form action="<?php echo $action; ?>" method="post">
<div class="form-group">
    <label for="int">Item <?php echo form_error('item_id') ?></label>
    <select name="item_id" class="form-control">
    <option value="0" selected="selected">----</option>
    <option value="1">Cama</option>
    <option value="2">Colchão</option>
    <option value="3">Criado-mudo</option>
    <option value="4">Suporte de soro</option>
    <option value="5">Poltrona</option>
    <option value="6">Cadeira</option>
    <option value="7">Sofa</option>
    <option value="8">Mesa</option>
    <option value="9">Suporte de Humper</option>
    </select>
</div>
<div class="form-group">
    <label for="int">Centro de custo<?php echo form_error('cost_center_id') ?></label>
    <select name="cost_center_id" class="form-control" id="cost_center_id" placeholder="Cost Center Id">
    <option value="" selected="selected">Selecionar</option>
    <option value="100">Maternidade</option>
    <option value="101">Cardiovascular</option>
    <option value="102">Cirurgia Geral</option>
    <option value="103">Cirurgia Pediátrica</option>
    <option value="104">Ginecologia</option>
    <option value="105">Mastologia</option>
    <option value="106">Oftalmologia</option>
    <option value="107">Ortopedia</option>
    <option value="108">Otorrino</option>
    <option value="109">Plástica</option>
    <option value="110">Urologia</option>
    <option value="111">Teste de centro de custo</option>
    <option value="112">Entreposto</option>
    </select>
</div>
<div class="form-group">
    <label for="varchar">Tag <?php echo form_error('asset_tag') ?></label>
    <input type="text" class="form-control" name="asset_tag" id="asset_tag" placeholder="Asset Tag" value="<?php echo $asset_tag; ?>" />
</div>

<div class="form-group">
    <label for="datetime">Comprado em<?php echo form_error('acquired_at') ?></label>
    <input type="text" class="form-control" name="acquired_at" id="acquired_at" placeholder="Acquired At" value="<?php echo $acquired_at; ?>" />
</div>

<div class="form-group">
    <label for="varchar">Descrição <?php echo form_error('description') ?></label>
    <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $description; ?>" />
</div>

<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
<a href="<?php echo site_url('assets') ?>" class="btn btn-default">Cancel</a>
</form>
</div>