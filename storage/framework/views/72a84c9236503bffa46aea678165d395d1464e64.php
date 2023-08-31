<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($title); ?> - Controle de Séries</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/estilos.css')); ?>">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo e(route('series.index')); ?>">Home</a>

        <?php if(auth()->guard()->check()): ?>
        <form action="<?php echo e(route('logout')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <button class="btn btn-link">
                Sair
            </button>
        </form>
        <?php endif; ?>

        <?php if(auth()->guard()->guest()): ?>
        <a href="<?php echo e(route('login')); ?>">Entrar</a>
        <?php endif; ?>
    </div>
</nav>
<div class="container">
    <h1><?php echo e($title); ?></h1>

    <?php if(isset($mensagemSucesso)): ?>
        <div class="alert alert-success">
            <?php echo e($mensagemSucesso); ?>

        </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php echo e($slot); ?>

</div>
</body>
</html>
<?php /**PATH C:\Users\felpa\controle-series\resources\views/components/layout.blade.php ENDPATH**/ ?>