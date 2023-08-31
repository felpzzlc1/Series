<?php $__env->startComponent('mail::message'); ?>

# <?php echo e($nomeSerie); ?> criada

A série <?php echo e($nomeSerie); ?> com <?php echo e($qtdTemporadas); ?> temporadas e <?php echo e($episodiosPorTemporada); ?> episódios por temporada foi criada.

Acesse aqui:

<?php $__env->startComponent('mail::button', ['url' => route('seasons.index', $idSerie)]); ?>
    Ver série
<?php echo $__env->renderComponent(); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\felpa\controle-series\resources\views/mail/series-created.blade.php ENDPATH**/ ?>