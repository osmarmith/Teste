
<div class="col-md-16">
    <form action="<?= base_url('usuario');?>"  method="post">
        <div class="form-group">
            <div class="col-md-4">
                <input type="text" name="strPesquisar" placeholder="Pesquisar..." class="form-control"/></td>
            </div>
            <div class="col-md-2">
                <label for="title">Ordernação por</label>
            </div>
            <div class="col-md-2">
                <select name="strOrdemCampo" class="form-control" style="display: inline-block">
                    <option value=""></option>
                    <option value="id">#</option>
                    <option value="strNome">Nome</option>
                    <option value="strEmail">Email</option>
                    <option value="strCpf">CPF</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="strOrdem" class="form-control" style="display: inline-block">
                    <option value=""></option>
                    <option value="asc">Crescente</option>
                    <option value="desc">Decrescente</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="submit" value="Atualizar" class="btn btn-success btn-block">
            </div>
        </div>
    </form>
</div>
</br>
<table class="table table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Email</th>
        <th>CPF</th>
        <th class="text-right">Ações</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($usuario as $user) : ?>
        <tr>
            <td><?php echo $user->id ?></td>
            <td><?php echo $user->strNome ?></td>
            <td><?php echo $user->strEmail ?></td>
            <td><?php echo $user->strCpf ?></td>
            <td class="text-right">
                <a href="<?= base_url('usuario/'.$user->id);?>" class="btn btn-xs btn-default">Visualizar</a>
                <a href="<?= base_url('usuario/'.$user->id.'/editar');?>" class="btn btn-xs btn-info">Editar</a>
                <a href="<?= base_url('usuario/'.$user->id.'/excluir');?>" class="btn btn-xs btn-danger">Excluir</a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
<?php if($paginacao) echo $paginacao; ?>
<div class="col-md-12 text-right">
    <a href="<?= base_url('usuario/salvar');?>" class="btn btn-primary">Novo usuário</a>
</div>
