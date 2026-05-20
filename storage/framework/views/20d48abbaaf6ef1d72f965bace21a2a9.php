<?php $__env->startSection('content'); ?>


<div class="position-relative mb-5">
    <div style="height: 300px; overflow: hidden;">
        <img src="<?php echo e(asset('images/fodraszkellek.jpg')); ?>" class="w-100 h-100" style="object-fit: cover; filter: brightness(0.6);" alt="Szolgáltatásaink">
    </div>
    <div class="position-absolute top-50 start-50 translate-middle text-center text-white w-100">
        <h1 class="display-4 fw-bold text-uppercase">Szolgáltatásaink</h1>
        <p class="lead">Válassz prémium kezeléseink közül</p>
    </div>
</div>

<div class="container">

    
    <div class="card border-0 shadow-sm rounded-4 mb-5 bg-light">
        <div class="card-body p-4">
            
            <form action="<?php echo e(route('szolgaltatasok.index')); ?>" method="GET" class="row g-3 align-items-end" id="szuroForm">
                
                
                <div class="col-md-5">
                    <label for="kereses" class="form-label fw-bold text-muted small text-uppercase">Keresés név alapján</label>
                    <div class="input-group input-group-lg shadow-sm">
                        <span class="input-group-text bg-white border-0"><i class="text-primary">🔍</i></span>
                        <input type="text" name="kereses" id="kereses" class="form-control border-0" 
                               placeholder="Pl. Hajfestés, Gél lakk..." 
                               value="<?php echo e(request('kereses')); ?>" autocomplete="off">
                    </div>
                </div>

                
                <div class="col-md-4">
                    <label for="kategoria" class="form-label fw-bold text-muted small text-uppercase">Kategória</label>
                    <select name="kategoria" id="kategoria" class="form-select form-select-lg border-0 shadow-sm">
                        <option value="">-- Minden kategória --</option>
                        <?php $__currentLoopData = $kategoriak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($kat->id); ?>" <?php echo e(request('kategoria') == $kat->id ? 'selected' : ''); ?>>
                                <?php echo e($kat->nev); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                
                
                <div class="col-md-3 d-flex gap-2" id="szuroGombok">
                    <button type="submit" class="btn btn-dark btn-lg w-100 rounded-pill shadow-sm">Szűrés</button>
                    
                    <?php if(request()->filled('kereses') || request()->filled('kategoria')): ?>
                        <a href="<?php echo e(route('szolgaltatasok.index')); ?>" class="btn btn-outline-danger btn-lg rounded-pill px-3 reset-btn" title="Szűrők törlése">
                            ✖
                        </a>
                    <?php endif; ?>
                </div>
                
            </form>
        </div>
    </div>
    


    
    <div id="talalatokContainer" style="transition: opacity 0.3s ease;">
        <?php
            $csoportositottSzolgaltatasok = $szolgaltatasok->groupBy(function($item) {
                return $item->kategoria ? $item->kategoria->nev : 'Egyéb szolgáltatások';
            });
        ?>

        <?php $__currentLoopData = $csoportositottSzolgaltatasok; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategoriaNev => $szolgaltatasokCsoport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="mb-5">
                <div class="d-flex align-items-center mb-4">
                    <h2 class="fw-bold text-dark mb-0 me-3"><?php echo e($kategoriaNev); ?></h2>
                    <div class="flex-grow-1 border-bottom"></div>
                </div>

                <div class="row g-4">
                    <?php $__currentLoopData = $szolgaltatasokCsoport; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $szolgaltatas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm service-card hover-elevate">
                                <div class="card-body p-4 d-flex flex-column">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <h4 class="card-title fw-bold text-primary mb-0"><?php echo e($szolgaltatas->nev); ?></h4>
                                        <span class="badge bg-light text-dark border rounded-pill px-3 py-2">
                                            <?php echo e($szolgaltatas->idotartam); ?> perc
                                        </span>
                                    </div>
                                    <p class="card-text text-muted mb-4 flex-grow-1">
                                        <?php echo e($szolgaltatas->leiras ?? 'Ehhez a szolgáltatáshoz még nincs részletes leírás.'); ?>

                                    </p>
                                    <div class="mt-auto d-flex align-items-center justify-content-between border-top pt-3">
                                        <div>
                                            <small class="text-muted text-uppercase d-block">Ár</small>
                                            <span class="fw-bold fs-5"><?php echo e(number_format($szolgaltatas->ar, 0, ',', ' ')); ?> Ft</span>
                                        </div>
                                        <a href="<?php echo e(route('idopontfoglalas.index', [
                                            'category_id' => $szolgaltatas->lehetosegek_id, 
                                            'service_id' => $szolgaltatas->id
                                            ])); ?>" class="btn btn-outline-dark rounded-pill px-4">
                                            Foglalás
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($szolgaltatasok->isEmpty()): ?>
            <div class="alert alert-warning text-center p-5 rounded-4 shadow-sm mb-5">
                <h4 class="fw-bold mb-3">Sajnos nincs találat! 😔</h4>
                <p class="mb-0 fs-5">A megadott feltételekkel nem találtunk szolgáltatást.</p>
                <?php if(request()->filled('kereses') || request()->filled('kategoria')): ?>
                    <a href="<?php echo e(route('szolgaltatasok.index')); ?>" class="btn btn-outline-dark rounded-pill px-4 mt-4 reset-btn">
                        Keresés törlése és összes mutatása
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

</div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\FreshSzalon-master\resources\views/szolgaltatasok/index.blade.php ENDPATH**/ ?>