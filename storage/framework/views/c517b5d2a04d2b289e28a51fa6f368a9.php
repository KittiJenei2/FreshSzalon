<?php $__env->startSection('content'); ?>


<div class="bg-dark text-white py-5 mb-5 text-center">
    <h1 class="display-4 fw-bold text-uppercase">Kollégáink</h1>
    <p class="lead text-white-50">Ismerd meg szakértő csapatunkat és történetüket</p>
</div>

<div class="container pb-5">
    <div class="row g-5">
        <?php $__currentLoopData = $allDolgozo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dolgozo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-6">
                
                <div class="card border-0 shadow-lg overflow-hidden rounded-4 h-100 dolgozo-card">
                    <div class="row g-0 h-100">
                        
                        
                        <div class="col-md-5">
                            <img src="<?php echo e(asset('images/dolgozok/' . $dolgozo->kep)); ?>" 
                                 class="w-100 h-100 object-fit-cover" 
                                 alt="<?php echo e($dolgozo->nev); ?>"
                                 style="min-height: 300px;"
                                 onerror="this.src='https://ui-avatars.com/api/?name=<?php echo e(urlencode($dolgozo->nev)); ?>&size=300';">
                        </div>

                        
                        <div class="col-md-7">
                            <div class="card-body p-4 d-flex flex-column h-100 justify-content-center">
                                <h3 class="fw-bold mb-2"><?php echo e($dolgozo->nev); ?></h3>
                                
                                <p class="text-primary mb-3 fw-bold small">
                                    <i class="bi bi-envelope-fill me-2"></i><?php echo e($dolgozo->email); ?>

                                </p>

                                <hr class="opacity-25 my-2">

                                <p class="text-muted fst-italic mb-0">
                                    <?php echo e($dolgozo->bio ?? 'Sok szeretettel várom régi és új vendégeimet!'); ?>

                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\FreshSzalon-master\resources\views/dolgozok/index.blade.php ENDPATH**/ ?>