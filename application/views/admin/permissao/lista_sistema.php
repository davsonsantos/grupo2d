<?php
$this->load->view('admin/layout/header');
?>
<script src="<?= GD_JS ?>jquery-1.10.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= GD_CSS ?>dataTables.bootstrap.css">
<script>
function excluir_sistema(id) {
    var url="<?=GD_RAIZ?>permissao/excluir_sistema?acao=excluir&id="+id;
    window.location.href=url;
}  
</script>
<section id="content" class="container">

    <header class="p-header">
        <h2 class="p-title"><?= $titulo ?></h2>
        <div class="config dropdown">
            <a class="btn btn-info btn-sm" href="<?=GD_RAIZ?>permissao/cadastro_sistema?acao=<?=base64_encode("novo")?>" data-toggle=""><span class="icon-plus"></span>&nbsp;Novo Sistema</a>            
        </div>
    </header>
    <?php echo get_msg("msg")?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="example">
            <thead>
                <tr style="" class="cor">
                    <th>ID</th>
                    <th>Sistema</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $l) { ?>
                    <tr class="gradeX">
                        <td class="center"><?= $l->sis_id ?></td>
                        <td><span class="<?= $l->sis_icon ?>"></span> <?= $l->sis_nome ?></td>
                        <td><?= $l->sis_descricao ?></td>
                        <td><?= $l->sis_ativo ?></td>
                        <td class="center">       
                            <a href="<?=GD_RAIZ?>permissao/cadastro_sistema?acao=<?=base64_encode("editar")?>&id=<?= $l->sis_id ?>" class="ttips" title="" data-placement="top" data-toggle="tooltip" data-original-title="Editar Registro"><span class="icon-pencil-2" aria-hidden="true"></span></a>
                            &nbsp;
                            <a class="ttips" href="#<?= $l->sis_id ?>" data-toggle="modal" data-original-title="Excluir Registro"><span class="icon-remove-2 " aria-hidden="true"></span></a>
   
                            <div aria-hidden="true" role="dialog" tabindex="-1" id="<?= $l->sis_id ?>" class="modal fade" style="display: none;">
                                <div class="modal-dialog modal-narrow">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                            <h4 class="modal-title">Excluir Registro</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Tem certeza que deseja excluir o sistema?</p>
                                            <h5><?= $l->sis_nome ?> - <?= $l->sis_descricao ?></h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-sm btn-danger" type="button" onClick="excluir_sistema(<?= $l->sis_id ?>)">Excluir</button>
                                            <button data-dismiss="modal" class="btn btn-sm btn-warning" type="button">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <th>
                <td class="gradeX text-right" colspan="4">
                        Legenda: <span class="icon-pencil-2" ></span> &nbsp;Editar Registro&nbsp;
                                 <span class="icon-remove-2" ></span> &nbsp;Excluir Registro&nbsp;
                    </td>
                </th>
            </tfoot>
        </table>
    </div>

</section>	

<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            "oLanguage": {
                "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "sInfoFiltered": "(filtrado de um total de _MAX_ registros)",
                "sInfoEmpty": "Registro não encontrado",
                "sZeroRecords": "Não há registro"
            },
            "sPaginationType": "full_numbers",
            //     "sScrollX": "100%",
        });
        //Modify Data Table
        $('.dataTables_wrapper .sOption').wrapAll('<div class="sOption_wrapper"></div><br>');
        $('.dataTables_wrapper .pagin').wrapAll('<div class="sOption_wrapper"></div>');
    });
</script>
<?php
$this->load->view('admin/layout/footer');
