<h2>Editando usuário</h2>

<?php echo validation_errors(); ?>

<form action="<?= base_url('usuario/'.$usuario->id.'/editar');?>" method="post">

    <div class="form-group">
        <label for="title">Nome</label>
        <input type="text" name="strNome"  class="form-control" placeholder="Seu nome aqui..." value="<?php echo $usuario->strNome;?>"/>
    </div>
    <div class="form-group">
        <label for="title">Email</label>
        <input type="text" name="strEmail"  class="form-control" placeholder="Seu email aqui..." value="<?php echo $usuario->strEmail;?>"/>
    </div>
    <div class="form-group">
        <label for="title">CPF</label>
        <input type="text" name="strCpf"  class="form-control" placeholder="Seu cpf aqui..." value="<?php echo $usuario->strCpf;?>"/>
    </div>

    <input type="submit" name="submit" value="Atualizar este usuário" class="btn btn-primary" />
    <a href="<?= base_url('usuario');?>" class="btn btn-success">Voltar</a>
</form>

<hr>
