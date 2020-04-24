@extends('property.master')

@section('content')
    <div class="container my-3">
        <h1>Editar produto</h1>

        <?php
        $property = $property[0];
        ?>

        <form action="<?= url('/imoveis/update', ['id' => $property->id]); ?>" method="post">
            <?= csrf_field(); ?>
            <?= method_field('PUT'); ?>

            <div class="form-group">
                <label for="title">Titulo do imovel</label>
                <input type="text" name="title" id="title" class="form-control" value="<?= $property->title; ?>">
            </div>
            <div class="form-group">
                <label for="description">Descrição do imovel</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="5"><?= $property->description; ?></textarea>
            </div>
            <div class="form-group">
                <label for="rental_price">Valor de locação</label>
                <input type="text" name="rental_price" id="rental_price" class="form-control" value="<?= $property->rental_price; ?>">
           </div>
           <div class="form-group">
                <label for="sale_price">Valor de venda</label>
                <input type="text" name="sale_price" id="sale_price" class="form-control" value="<?= $property->sale_price; ?>">
           </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection
