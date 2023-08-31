<form action="<?php echo e($action); ?>" method="post">
    <?php echo csrf_field(); ?>

    <?php if($update): ?>
    <?php echo method_field('PUT'); ?>
    <?php endif; ?>
    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text"
               id="nome"
               name="nome"
               class="form-control"
               <?php if(isset($nome)): ?>value="<?php echo e($nome); ?>"<?php endif; ?>>
    </div>

    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>
<?php /**PATH C:\Users\felpa\controle-series\resources\views/components/series/form.blade.php ENDPATH**/ ?>