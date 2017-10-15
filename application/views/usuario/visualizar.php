<h2>Visualizando usuário</h2>


<div class="row">
    <div class="col-md-6">
        Nome: <?php echo $usuario->strNome; ?><br>
        Email: <?php echo $usuario->strEmail; ?><br>
        CPF: <?php echo $usuario->strCpf; ?>
    </div>
</div>

<hr>
<a href="<?= base_url('usuario');?>" class="btn btn-success">Voltar</a>