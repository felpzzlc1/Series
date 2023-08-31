<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['title' => 'Séries','mensagemSucesso' => $mensagemSucesso]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Séries','mensagem-sucesso' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mensagemSucesso)]); ?>
    <?php if(auth()->guard()->check()): ?>
    <a href="<?php echo e(route('series.create')); ?>" class="btn btn-dark mb-2">Adicionar</a>
    <?php endif; ?>

    <ul class="list-group">
        <?php $__currentLoopData = $series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img class="me-3" src="<?php echo e(asset('storage/' . $serie->cover)); ?>" width="100" class="img-thumbnail" alt="">
                <?php if(auth()->guard()->check()): ?> <a href="<?php echo e(route('seasons.index', $serie->id)); ?>"> <?php endif; ?>
                    <?php echo e($serie->nome); ?>

                <?php if(auth()->guard()->check()): ?> </a> <?php endif; ?>
            </div>

            <?php if(auth()->guard()->check()): ?>
            <span class="d-flex">
                <a href="<?php echo e(route('series.edit', $serie->id)); ?>" class="btn btn-primary btn-sm">
                    E
                </a>

                <form action="<?php echo e(route('series.destroy', $serie->id)); ?>" method="post" class="ms-2">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger btn-sm">
                        X
                    </button>
                </form>
            </span>
            <?php endif; ?>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH C:\Users\felpa\controle-series\resources\views/series/index.blade.php ENDPATH**/ ?>