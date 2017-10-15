<h2>Novo usuário</h2>

<?php echo validation_errors(); ?>

<form action="<?= base_url('usuario/salvar');?>" method="post">

    <div class="form-group">
        <label for="title">Nome</label>
        <input type="text" name="strNome"  class="form-control" placeholder="Seu nome aqui..."/>
    </div>
    <div class="form-group">
        <label for="title">Email</label>
        <input type="text" name="strEmail"  class="form-control" placeholder="Seu email aqui..."/>
    </div>
    <div class="form-group">
        <label for="title">CPF</label>
        <input type="text" name="strCpf"  class="form-control" placeholder="Seu cpf aqui..."/>
    </div>


    <input type="submit" name="submit" value="Criar novo usuário" class="btn btn-primary" />
    <a href="<?= base_url('usuario');?>" class="btn btn-success">Voltar</a>
</form>