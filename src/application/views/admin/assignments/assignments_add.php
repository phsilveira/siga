
<div class='container'>
    <h2 style="margin-top:0px"><?php echo $button ?> Chamado</h2>
    <form action="<?php echo $action; ?>" method="post">

        
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
            <label for="int">Origem <?php echo form_error('origin_location_id') ?></label>
            <input type="text" class="form-control" name="origin_location_id" id="origin_location_id" placeholder="Id local de origem" value="<?php echo $origin_location_id; ?>" />
        </div>
        

        <!-- <input type="text" class="form-control" name="reason_id" id="reason_id" placeholder="Reason Id" value="<?php echo $reason_id; ?>" /> -->

        <div class="form-group">
            <label for="int">Motivo <?php echo form_error('reason_id') ?></label>
            <select name="reason_id" class="form-control">
            <option value="0" selected="selected">----</option>
            <option value="1">Remoção</option>
            <option value="2">Substituição</option>
            <option value="3">Reparo</option>
            <option value="4">Mudança</option>
            <option value="5">Inclusão</option>
            </select>
        </div>

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
            <label for="datetime">Agendar para <?php echo form_error('scheduled_at') ?></label>
            <input type="text" class="form-control" name="scheduled_at" id="scheduled_at" placeholder="Agendar para" value="<?php echo $scheduled_at; ?>" />
        </div>

        <div class="form-group">
            <label for="varchar">Comentários<?php echo form_error('comments') ?></label>
            <input type="text" class="form-control" name="comments" id="comments" placeholder="Comentários" value="<?php echo $comments; ?>" />
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('assignments') ?>" class="btn btn-default">Cancelar</a>
    </form> 
</div>