<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-BR">
<?php $this->load->view('_partials/head'); ?>
<body>
<?php $this->load->view('_partials/header'); ?>

<div class="container container-person mt-5 p-5">
<?=write_message()?>
    <?php
    $action_form_cliente = '/Clientes/save/';
    if(isset($clientes) && $clientes){
        foreach ($clientes as $cliente);
        $action_form_cliente = $action_form_cliente.$cliente->id ?>
        <h1>Editar Cliente: <?= $cliente->nome ?></h1>
    <?php } else { ?>
        <h1>Registro de Clientes</h1>
    <?php } ?>
    <form id="form_clientes" method="post" enctype="multipart/form-data" action="<?=site_url($action_form_cliente)?>">
        <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="nombre">Nombre *</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required value="<?= (isset($cliente) ? $cliente->nombre : '') ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="apellido">Apellido *</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required value="<?= (isset($cliente) ? $cliente->apellido : '') ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="dni">DNI *</label>
                    <div class="input-group">
                    <input type="number" class="form-control" id="dni" name="dni" placeholder="Documento" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" aria-describedby="inputGroupPrepend" required value="<?= (isset($cliente) ? $cliente->dni : '') ?>">
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nacimiento">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="nacimiento" name="nacimiento" placeholder="DD/MM/AA"  value="<?= (isset($cliente) ? $cliente->fecha_nac : '') ?>">
                 </div>
                
                 <div class="col-md-4 mb-3">
                <label for="provincia">provincia</label>
                <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Provincia"  value="<?= (isset($cliente) ? $cliente->provincia : '') ?>">
                </div>
                <div class="col-md-4 mb-3">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico"  value="<?= (isset($cliente) ? $cliente->email : '') ?>">
                </div>
           </div>
        <button class="btn btn-primary" type="submit">Enviar</button>
        <?= (isset($cliente) ? '<a href="#" data-id="'.base_url('cliente/delete/'.$cliente->id).'" class="btn btn-danger delete-product" data-toggle="modal" data-target="#deleteProductModal">Excluir</a>' : '') ?>
    </form>
</div>
<!--
    <table id="product_table" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>
            <th>Fecha de Nacimiento</th>
            <th>Provincia</th>
            <th>E-mail</th>
        </tr>
        </thead>
        <tbody>
        <?php/*
        if($clientes) {
            foreach ($clientes as $cliente) { ?>
                <tr>
                    <td><?= $cliente->id ?></td>
                    <td><?= $cliente->nombre ?></td>
                    <td><?= $cliente->apellido ?></td>
                    <td><?= $cliente->dni ?></td>
                    <td><?= $cliente->fecha_nac ?></td>
                    <td><?= $cliente->provincia ?></td>
                    <td><?= $cliente->email ?></td>
                    <td><a href="<?= base_url('clientes/clientes/'.$cliente->id) ?>">Edit</a></td>
                    <td><a class="delete-cliente" href="#" data-id="<?= base_url('cliente/delete/'.$cliente->id) ?>" data-toggle="modal" data-target="#deleteClienteModal">Delete</a></td>
                </tr>
            <?php }
        } else { ?>
            <td class="text-center" colspan="4">No hay Clientes</td>
        <?php }*/ ?>
        </tbody>
    </table>
</div>
        -->
<?php // $this->load->view('_partials/clientes/delete_product_confirm_modal'); ?>
*/
<?php $this->load->view('_partials/scripts'); ?>
</body>

</html>

