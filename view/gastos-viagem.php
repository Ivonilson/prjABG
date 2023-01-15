<?php
if ($_SESSION['user'] == null || !isset($_SESSION['user']) || $_SESSION['user'] != 'IVONILSON') {
    //header('Location: index.php');
    echo "<script>window.location.href ='/'</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow">
    <title>Gastos contabilizados</title>
    <?php require_once 'includes/bootstrap-css.php'; ?>
</head>

<body class="bg-dark fixed-nav sticky-footer" id="page-top">
    <!-- NAVEGAÇÃO -->
    <?php require_once 'includes/navegacao.php'; ?>

    <div class="content-wrapper" id="background-tela-consulta">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    Início
                </li>
                <li class="breadcrumb-item">
                    <mark class="p-2 rounded">Gastos Viagem</mark>
                </li>
                <div class="col  mt-2">
                    <a href="/?pagina=cadastrar-gastos-viagem" class="btn btn-danger text-light  float-right font-weight-bold rounded" title="Cadastrar gasto"><i class="fa fa-plus"></i> Gasto</a>
                </div>
            </ol>

            <div class="card mb-1 background-form-cons">
                <div class="card-header">
                    <i class="fa fa-table"></i> Gastos contabilizados
                    <br>
                    <br>
                </div>
            </div>
            <div id="row-tbl-consulta">
                <div class="col pt-3">

                    <table class="table table-bordered table-sm table-hover border" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>Descrição</th>
                                <th>Valor (R$)</th>
                                <th>Forma de Pagamento</th>
                                <th>Pagador</th>
                                <th>Estabelecimento</th>
                                <th>Cidade/UF</th>
                                <th>Data da despesa</th>
                                <th>Observações</th>
                                <th>Data do cadastro</th>
                                <th>Usuário</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tfoot class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>Descrição</th>
                                <th>Valor (R$)</th>
                                <th>Forma de Pagamento</th>
                                <th>Pagador</th>
                                <th>Estabelecimento</th>
                                <th>Cidade/UF</th>
                                <th>Data da despesa</th>
                                <th>Observações</th>
                                <th>Data do cadastro</th>
                                <th>Usuário</th>
                                <th>Editar</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php

                            if ($gastos != NULL) {

                                foreach ($gastos as  $value) {
                            ?>
                                    <tr>
                                        <td><?= $value['id'] ?></td>
                                        <td><?= $value['descricao'] ?></td>
                                        <td><?= str_replace('.', ',', $value['valor']) ?></td>
                                        <td><?= $value['forma_pagamento'] ?></td>
                                        <td><?= $value['pagador'] ?></td>
                                        <td><?= $value['estabelecimento'] ?></td>
                                        <td><?= $value['cidade_uf'] ?></td>
                                        <td><?= date_format(date_create($value['data_despesa']), "d/m/Y") ?></td>
                                        <td><?= $value['observacoes'] ?></td>
                                        <td><?= date_format(date_create($value['data_cadastro']), "d/m/Y") ?></td>
                                        <td><?= $value['usuario'] ?></td>

                                        <td align="center"><a href="/?pagina=editar-gastos-viagem&id=<?= $value['id'] ?>&form=gastos-viagem" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                    </tr>

                            <?php
                                    $conexao = null;
                                }
                            } else {
                                //echo "<span class='text-danger'>NENHUM DADO RETORNADO.</span><br><br>";
                            }
                            ?>
                        </tbody>
                    </table>

                    <hr>

                    <div class="row">

                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="card mb-3">
                                <div class="card-header">
                                   GASTOS TOTAIS
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Total pago (R$): <?= number_format( $valorTotal, 2, ',', '.') ?></li>
                                    <li class="list-group-item">100% do total de gastos</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="card mb-3">
                                <div class="card-header">
                                    REGINA
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Total pago (R$): <?= number_format($total_regina, 2, ',' , '.') ?></li>
                                    <li class="list-group-item">Pagou <?= number_format($percentualRegina, 2, ',' , '.') ?>% do total</li>
                                    <li class="list-group-item">Regina precisa reembolsar o Ivonilson em R$ <?=  number_format($reembolsoIvonilson , 2, ',', '') ?></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="card mb-3">
                                <div class="card-header">
                                    IVONILSON
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Total pago (R$): <?= number_format($total_ivonilson, 2, ',' , '.') ?></li>
                                    <li class="list-group-item">Pagou <?=  number_format($percentualIvonilson , 2, ',', '') ?>% do total</li>
                                    <li class="list-group-item">Ivonilson precisa reembolsar a Regina em R$ <?=  number_format($reembolsoRegina , 2, ',', '') ?></li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <?php require_once 'includes/rodape.php'; ?>
    </div>
    <?php require_once 'includes/bootstrap-js.php'; ?>

</body>

</html>