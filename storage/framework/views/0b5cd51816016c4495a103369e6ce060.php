<?php $__env->startSection('content'); ?>
<div class="container py-4">
    
    <div class="d-flex justify-content-between align-items-center mb-5 pb-3 border-bottom">
        <div>
            <h2 class="fw-bold m-0">Szia, <?php echo e($dolgozo->nev); ?>!</h2>
            <p class="text-muted m-0">Itt láthatod a beosztásodat és foglalásaidat.</p>
        </div>
        <form method="POST" action="<?php echo e(route('worker.logout')); ?>">
            <?php echo csrf_field(); ?>
            <button class="btn btn-outline-danger px-4 rounded-pill fw-bold">Kijelentkezés</button>
        </form>
    </div>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger shadow-sm border-0 rounded-4 mb-4">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show mb-4 border-0 shadow-sm">
            <strong>Siker!</strong> <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="row g-4">
        
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 h-100 rounded-4 overflow-hidden">
                <div class="card-header bg-white p-4 border-bottom-0">
                    <h5 class="fw-bold m-0">📅 Érkező Vendégek</h5>
                </div>
                <div class="card-body p-0">
                    <?php if($foglalasok->isEmpty()): ?>
                        <div class="text-center py-5 text-muted">
                            <i class="fs-1 opacity-25 mb-2">📭</i>
                            <p>Nincs új foglalásod a közeljövőben.</p>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light text-muted small text-uppercase">
                                    <tr>
                                        <th class="ps-4">Időpont</th>
                                        <th>Vendég</th>
                                        <th>Szolgáltatás</th>
                                        <th>Státusz</th>
                                        <th class="text-end pe-4">Művelet</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $foglalasok; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foglalas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="ps-4">
                                                <div class="fw-bold"><?php echo e($foglalas->datum); ?></div>
                                                <small class="text-muted"><?php echo e(substr($foglalas->ido_kezdes, 0, 5)); ?></small>
                                            </td>
                                            <td>
                                                <div class="fw-bold"><?php echo e($foglalas->felhasznalo->nev); ?></div>
                                                <a href="tel:<?php echo e($foglalas->felhasznalo->telefonszam); ?>" class="text-decoration-none small text-primary">
                                                    <?php echo e($foglalas->felhasznalo->telefonszam); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <span class="badge bg-light text-dark border"><?php echo e($foglalas->szolgaltatas->nev); ?></span>
                                            </td>
                                            <td>
                                                <?php if($foglalas->statuszok_id == 1): ?>
                                                    <span class="badge bg-warning text-dark">Függőben</span>
                                                <?php elseif($foglalas->statuszok_id == 2): ?>
                                                    <span class="badge bg-success">Elfogadva</span>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary"><?php echo e($foglalas->statusz->nev ?? 'Egyéb'); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-end pe-4">
                                                <?php if($foglalas->statuszok_id == 1): ?>
                                                    <div class="d-flex justify-content-end gap-2">
                                                        
                                                        <form action="<?php echo e(route('worker.status.accept', $foglalas->id)); ?>" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit" class="btn btn-success btn-sm rounded-pill px-3 fw-bold">
                                                                Elfogadás
                                                            </button>
                                                        </form>

                                                        
                                                        <button type="button" class="btn btn-outline-danger btn-sm rounded-pill px-3 fw-bold" data-bs-toggle="modal" data-bs-target="#rejectModal<?php echo e($foglalas->id); ?>">
                                                            Elutasítás
                                                        </button>
                                                    </div>

                                                    
                                                    <div class="modal fade text-start" id="rejectModal<?php echo e($foglalas->id); ?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content border-0 shadow-lg rounded-4">
                                                                <div class="modal-header border-bottom-0 pb-0">
                                                                    <h5 class="modal-title fw-bold text-danger">Foglalás elutasítása</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Bezárás"></button>
                                                                </div>
                                                                
                                                                <div class="modal-body py-4">
                                                                    <p class="mb-1 text-center">Biztosan elutasítod a következő foglalást?</p>
                                                                    <div class="fw-bold fs-5 text-dark text-center my-3 bg-light rounded py-3 border">
                                                                        <?php echo e($foglalas->felhasznalo->nev); ?><br>
                                                                        <span class="text-primary fs-6"><?php echo e($foglalas->szolgaltatas->nev); ?></span><br>
                                                                        <span class="text-muted fs-6"><?php echo e($foglalas->datum); ?> | <?php echo e(substr($foglalas->ido_kezdes, 0, 5)); ?></span>
                                                                    </div>
                                                                    <p class="small text-muted mb-0 text-center">A vendég e-mailben automatikus értesítést kap a lemondásról.</p>
                                                                </div>
                                                                
                                                                <div class="modal-footer border-top-0 pt-0 justify-content-center gap-2">
                                                                    <button type="button" class="btn btn-light rounded-pill px-4 fw-bold shadow-sm" data-bs-dismiss="modal">Mégsem</button>
                                                                    <form action="<?php echo e(route('worker.status.reject', $foglalas->id)); ?>" method="POST" class="m-0">
                                                                        <?php echo csrf_field(); ?>
                                                                        <button type="submit" class="btn btn-danger rounded-pill px-4 fw-bold shadow-sm">
                                                                            Igen, elutasítom
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <span class="text-muted small">
                                                        <?php if($foglalas->statuszok_id == 3): ?>
                                                            ❌ Elutasítva
                                                        <?php else: ?>
                                                            🔒 Lezárva
                                                        <?php endif; ?>
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 h-100 rounded-4 bg-primary bg-opacity-10">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3 text-primary">🏖 Szabadság igénylése</h5>
                    <p class="small text-muted mb-4">Add meg, mikor nem tudsz vendégeket fogadni. Ez letiltja a foglalást azokra a napokra.</p>
                    
                    <form action="<?php echo e(route('worker.vacation.store')); ?>" method="POST" class="bg-white p-3 rounded-3 shadow-sm">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="datum_kezdes" class="form-label small fw-bold text-muted">Kezdő dátum</label>
                            <input type="date" id="datum_kezdes" name="datum_kezdes" class="form-control border-0 bg-light <?php $__errorArgs = ['datum_kezdes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required min="<?php echo e(date('Y-m-d')); ?>" value="<?php echo e(old('datum_kezdes')); ?>">
                            <?php $__errorArgs = ['datum_kezdes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-4">
                            <label for="datum_vege" class="form-label small fw-bold text-muted">Utolsó nap</label>
                            <input type="date" id="datum_vege" name="datum_vege" class="form-control border-0 bg-light <?php $__errorArgs = ['datum_vege'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required min="<?php echo e(date('Y-m-d')); ?>" value="<?php echo e(old('datum_vege')); ?>">
                            <?php $__errorArgs = ['datum_vege'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary rounded-pill fw-bold">
                                Szabadság rögzítése
                            </button>
                        </div>
                    </form>
                    <hr class="my-4">
                    <h6 class="fw-bold mb-3 text-dark">Rögzített jövőbeli szabadságaid</h6>
                    
                    <?php
                        $jovobeliSzabadsagok = App\Models\Szabadsagok::where('dolgozo_id', $dolgozo->id)
                            ->where('datum_vege', '>=', now()->toDateString())
                            ->orderBy('datum_kezdes')
                            ->get();
                    ?>

                    <?php if($jovobeliSzabadsagok->isEmpty()): ?>
                        <p class="small text-muted">Nincs rögzített jövőbeli szabadságod.</p>
                    <?php else: ?>
                        <div class="list-group list-group-flush rounded-3 shadow-sm">
                            <?php $__currentLoopData = $jovobeliSzabadsagok; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="list-group-item d-flex justify-content-between align-items-center bg-white border-0 py-3">
                                    <div>
                                        <div class="small fw-bold text-danger"><?php echo e($sz->datum_kezdes); ?> <span class="text-muted fw-normal mx-1">/</span> <?php echo e($sz->datum_vege); ?></div>
                                    </div>
                                    
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-sm btn-outline-primary border-0" data-bs-toggle="modal" data-bs-target="#editModal<?php echo e($sz->id); ?>">
                                            <i>✏️</i> Szerkesztés
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger border-0" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo e($sz->id); ?>">
                                            <i>🗑</i> Törlés
                                        </button>
                                    </div>
                                </div>

                                
                                <div class="modal fade" id="editModal<?php echo e($sz->id); ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo e($sz->id); ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content border-0 shadow-lg rounded-4">
                                            <form action="<?php echo e(route('worker.vacation.update', $sz->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <div class="modal-header border-bottom-0">
                                                    <h5 class="modal-title fw-bold" id="editModalLabel<?php echo e($sz->id); ?>">Szabadság módosítása</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body py-3">
                                                    <div class="mb-3">
                                                        <label class="form-label small fw-bold text-muted">Kezdő dátum</label>
                                                        <input type="date" name="datum_kezdes" class="form-control bg-light border-0 edit-kezdes" 
                                                            value="<?php echo e($sz->datum_kezdes); ?>" required min="<?php echo e(date('Y-m-d')); ?>" data-id="<?php echo e($sz->id); ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label small fw-bold text-muted">Utolsó nap</label>
                                                        <input type="date" name="datum_vege" class="form-control bg-light border-0 edit-vege" 
                                                            value="<?php echo e($sz->datum_vege); ?>" required min="<?php echo e($sz->datum_kezdes); ?>">
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-top-0 pt-0">
                                                    <button type="button" class="btn btn-light rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Mégsem</button>
                                                    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm">Mentés</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="modal fade" id="deleteModal<?php echo e($sz->id); ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content border-0 shadow-lg rounded-4">
                                            <div class="modal-header border-bottom-0 pb-0">
                                                <h5 class="modal-title fw-bold text-danger">Szabadság törlése</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body py-4">
                                                <p class="mb-1 text-center">Biztosan törölni szeretnéd a következő szabadságodat?</p>
                                                <p class="fw-bold fs-5 text-dark text-center my-3 bg-light rounded py-3 border">
                                                    <?php echo e($sz->datum_kezdes); ?> <br><span class="text-muted fs-6">⬇</span><br> <?php echo e($sz->datum_vege); ?>

                                                </p>
                                            </div>
                                            <div class="modal-footer border-top-0 pt-0 justify-content-center gap-2">
                                                <button type="button" class="btn btn-light rounded-pill px-4 fw-bold shadow-sm" data-bs-dismiss="modal">Mégsem</button>
                                                <form action="<?php echo e(route('worker.vacation.destroy', $sz->id)); ?>" method="POST" class="m-0">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger rounded-pill px-4 fw-bold shadow-sm">Igen, törlöm</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-bold text-primary"><i class="fas fa-clock me-2"></i>Heti Beosztásom</h5>
                    <small class="text-muted">Itt állíthatod be, mely napokon mettől meddig dolgozol.</small>
                </div>
                <div class="card-body">
                    <form id="scheduleForm" action="<?php echo e(route('worker.schedule.update')); ?>" method="POST" onsubmit="return validateScheduleTimes(event)">
                        <?php echo csrf_field(); ?>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 150px;">Nap</th>
                                        <th style="width: 100px;">Dolgozom</th>
                                        <th>Kezdés</th>
                                        <th>Vége</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // Generáljuk a választható időpontokat 08:00 és 20:00 között, szigorúan fél órás lépésekben
                                        $timeOptions = [];
                                        for($h = 8; $h <= 20; $h++) {
                                            $timeOptions[] = sprintf("%02d:00", $h);
                                            if ($h < 20) {
                                                $timeOptions[] = sprintf("%02d:30", $h);
                                            }
                                        }
                                    ?>

                                    <?php $__currentLoopData = $napok; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $b = $beosztasok->get($nap->id); ?>
                                        <tr>
                                            <td class="fw-bold"><?php echo e($nap->nev); ?></td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="schedule[<?php echo e($nap->id); ?>][active]" value="1" <?php echo e($b ? 'checked' : ''); ?> onchange="toggleInputs(<?php echo e($nap->id); ?>, this.checked)">
                                                </div>
                                            </td>
                                            <td>
                                                
                                                <select name="schedule[<?php echo e($nap->id); ?>][start]" id="start_<?php echo e($nap->id); ?>" class="form-select form-select-sm rounded-pill" style="cursor: pointer;" <?php echo e(!$b ? 'disabled' : ''); ?> onchange="updateEndOptions(<?php echo e($nap->id); ?>)">
                                                    <?php $__currentLoopData = $timeOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($time != '20:00'): ?>
                                                            <option value="<?php echo e($time); ?>" <?php echo e(($b && substr($b->ido_kezdes, 0, 5) == $time) || (!$b && $time == '09:00') ? 'selected' : ''); ?>>
                                                                <?php echo e($time); ?>

                                                            </option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </td>
                                            <td>
                                                
                                                <select name="schedule[<?php echo e($nap->id); ?>][end]" id="end_<?php echo e($nap->id); ?>" class="form-select form-select-sm rounded-pill" style="cursor: pointer;" <?php echo e(!$b ? 'disabled' : ''); ?>>
                                                    <?php $__currentLoopData = $timeOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($time != '08:00'): ?>
                                                            <option value="<?php echo e($time); ?>" <?php echo e(($b && substr($b->ido_vege, 0, 5) == $time) || (!$b && $time == '17:00') ? 'selected' : ''); ?>>
                                                                <?php echo e($time); ?>

                                                            </option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">Beosztás mentése</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm border-0 rounded-4 p-4 mb-5 bg-white">
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
                    <h4 class="fw-bold m-0">🗓 Beosztás Naptár</h4>
                    <div>
                        <span class="badge bg-warning text-dark me-2">Függőben</span>
                        <span class="badge bg-success me-2">Elfogadva</span>
                        <span class="badge bg-primary me-2">Elvégezve</span>
                        <span class="badge bg-danger">Szabadság</span>
                    </div>
                </div>
                <div id="calendar" style="min-height: 600px;"></div>
            </div>
        </div>
    </div>

</div>


<?php if(session('vacation_conflicts')): ?>
    <div class="modal fade" id="conflictModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header bg-danger text-white border-bottom-0 p-4">
                    <h5 class="modal-title fw-bold">⚠️ Figyelem! Ütköző foglalások</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4 text-center">
                    <p class="fs-5">A kért szabadság idejére <strong>(<?php echo e(session('pending_vacation')['datum_kezdes']); ?> - <?php echo e(session('pending_vacation')['datum_vege']); ?>)</strong> már van beosztott vendéged!</p>
                    
                    <div class="alert alert-warning border-0 rounded-3 my-4">
                        <strong>Fontos:</strong> Ha folytatod, a rendszer automatikusan <strong>elutasítja</strong> az alábbi foglalásokat és e-mailben értesíti a vendégeket a szabadságodról.
                    </div>

                    <div class="list-group list-group-flush border rounded-4 overflow-hidden">
                        <?php $__currentLoopData = session('vacation_conflicts'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conflict): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="list-group-item d-flex justify-content-between align-items-center bg-light py-3 px-4">
                                <div class="text-start">
                                    <div class="fw-bold text-dark"><?php echo e($conflict->felhasznalo->nev); ?></div>
                                    <div class="small text-muted"><?php echo e($conflict->szolgaltatas->nev); ?></div>
                                </div>
                                <div class="text-end">
                                    <div class="fw-bold text-primary"><?php echo e($conflict->datum); ?></div>
                                    <div class="small text-muted"><?php echo e(substr($conflict->ido_kezdes, 0, 5)); ?></div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="modal-footer border-top-0 p-4 pt-0 justify-content-center gap-3">
                    <button type="button" class="btn btn-light rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Mégsem (Vissza)</button>
                    
                    <form action="<?php echo e(session('pending_vacation_id') ? route('worker.vacation.update', session('pending_vacation_id')) : route('worker.vacation.store')); ?>" method="POST" class="m-0">
                        <?php echo csrf_field(); ?>
                        <?php if(session('pending_vacation_id')): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>
                        <input type="hidden" name="datum_kezdes" value="<?php echo e(session('pending_vacation')['datum_kezdes']); ?>">
                        <input type="hidden" name="datum_vege" value="<?php echo e(session('pending_vacation')['datum_vege']); ?>">
                        <input type="hidden" name="force_save" value="1">
                        <button type="submit" class="btn btn-danger rounded-pill px-5 fw-bold shadow-sm">
                            Igen, törlés és mentés
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <button id="autoOpenConflictModalBtn" class="d-none" data-bs-toggle="modal" data-bs-target="#conflictModal"></button>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var btn = document.getElementById('autoOpenConflictModalBtn');
                if (btn) btn.click();
            }, 300);
        });
    </script>
<?php endif; ?>


<?php if(session('schedule_conflicts')): ?>
    <div class="modal fade" id="scheduleConflictModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header bg-warning text-dark border-bottom-0 p-4">
                    <h5 class="modal-title fw-bold">⚠️ Időpontok kerültek munkaidőn kívülre!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <p class="fs-6 text-center">A beosztásod módosítása miatt a következő <strong><?php echo e(session('schedule_conflicts')->count()); ?></strong> foglalás kívül esik az új munkaidődön:</p>
                    
                    <div class="list-group list-group-flush border rounded-4 overflow-hidden my-3">
                        <?php $__currentLoopData = session('schedule_conflicts'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conflict): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="list-group-item d-flex justify-content-between align-items-center bg-light py-2 px-3">
                                <div class="text-start">
                                    <div class="fw-bold small"><?php echo e($conflict->felhasznalo->nev); ?></div>
                                    <div class="text-muted" style="font-size: 0.8rem;"><?php echo e($conflict->szolgaltatas->nev); ?></div>
                                </div>
                                <div class="text-end">
                                    <div class="fw-bold text-primary small"><?php echo e($conflict->datum); ?></div>
                                    <div class="text-muted" style="font-size: 0.8rem;"><?php echo e(substr($conflict->ido_kezdes, 0, 5)); ?> - <?php echo e(substr($conflict->ido_vege, 0, 5)); ?></div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="alert alert-danger border-0 rounded-3 mb-0 small">
                        <strong>Figyelem:</strong> Ha a mentést választod, ezek a foglalások <strong>elutasításra kerülnek</strong>, és a vendégek értesítést kapnak!
                    </div>
                </div>
                <div class="modal-footer border-top-0 p-4 pt-0 justify-content-center gap-3">
                    <button type="button" class="btn btn-light rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Mégsem</button>
                    
                    <form action="<?php echo e(route('worker.schedule.update')); ?>" method="POST" class="m-0">
                        <?php echo csrf_field(); ?>
                        <?php $ps = session('pending_schedule'); ?>
                        <?php $__currentLoopData = $ps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($data['active'])): ?> <input type="hidden" name="schedule[<?php echo e($id); ?>][active]" value="1"> <?php endif; ?>
                            <input type="hidden" name="schedule[<?php echo e($id); ?>][start]" value="<?php echo e($data['start']); ?>">
                            <input type="hidden" name="schedule[<?php echo e($id); ?>][end]" value="<?php echo e($data['end']); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <input type="hidden" name="force_save" value="1">
                        <button type="submit" class="btn btn-warning rounded-pill px-5 fw-bold shadow-sm">
                            Igen, törlés és mentés
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <button id="autoOpenScheduleModalBtn" class="d-none" data-bs-toggle="modal" data-bs-target="#scheduleConflictModal"></button>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var btn = document.getElementById('autoOpenScheduleModalBtn');
                if (btn) btn.click();
            }, 300);
        });
    </script>
<?php endif; ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script>
    // Beosztás inputok engedélyezése/tiltása
    function toggleInputs(id, checked) {
        document.getElementById('start_' + id).disabled = !checked;
        document.getElementById('end_' + id).disabled = !checked;
    }
</script>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendarEvents = <?php echo json_encode($calendarEvents ?? [], 15, 512) ?>;

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            locale: 'hu',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            buttonText: {
                today: 'Ma',
                month: 'Hónap',
                week: 'Hét',
                day: 'Nap'
            },
            firstDay: 1,
            slotMinTime: '08:00:00',
            slotMaxTime: '20:00:00',
            allDaySlot: true,
            allDayText: 'Egész nap',
            events: calendarEvents,
            eventTimeFormat: {
                hour: '2-digit',
                minute: '2-digit',
                meridiem: false
            }
        });
        
        calendar.render();
    });
</script>

<script>
    // Szabadság dátum korlátozások (Kezdés/Vége logika)
    document.addEventListener('DOMContentLoaded', function() {
        const kezdesInput = document.getElementById('datum_kezdes');
        const vegeInput = document.getElementById('datum_vege');

        if (kezdesInput && vegeInput) {
            kezdesInput.addEventListener('change', function() {
                vegeInput.min = this.value;
                if (vegeInput.value && vegeInput.value < this.value) {
                    vegeInput.value = this.value;
                }
            });
        }
    });
</script>

<script>
    // Flatpickr inicializálások a letiltott napokkal
    document.addEventListener('DOMContentLoaded', function() {
        const allVacations = [
            <?php $__currentLoopData = $jovobeliSzabadsagok; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                { id: <?php echo e($sz->id); ?>, from: "<?php echo e($sz->datum_kezdes); ?>", to: "<?php echo e($sz->datum_vege); ?>" },
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ];

        function updateEndDateConstraints(startDateStr, endDatePicker, disableRanges) {
            endDatePicker.set('minDate', startDateStr);
            let start = new Date(startDateStr);
            let nextDisabledDate = null;
            let sortedRanges = [...disableRanges].sort((a, b) => new Date(a.from) - new Date(b.from));
            
            for (let range of sortedRanges) {
                let rangeStart = new Date(range.from);
                if (rangeStart > start) {
                    nextDisabledDate = rangeStart;
                    break;
                }
            }

            if (nextDisabledDate) {
                let maxDate = new Date(nextDisabledDate);
                maxDate.setDate(maxDate.getDate() - 1);
                endDatePicker.set('maxDate', maxDate);
            } else {
                endDatePicker.set('maxDate', null);
            }
        }

        const newDisableRanges = allVacations.map(v => ({ from: v.from, to: v.to }));

        if(document.getElementById("datum_vege") && document.getElementById("datum_kezdes")) {
            const newVegePicker = flatpickr("#datum_vege", {
                locale: "hu",
                minDate: "today",
                disable: newDisableRanges
            });

            const newKezdesPicker = flatpickr("#datum_kezdes", {
                locale: "hu",
                minDate: "today",
                disable: newDisableRanges,
                onChange: function(selectedDates, dateStr) {
                    updateEndDateConstraints(dateStr, newVegePicker, newDisableRanges);
                }
            });
        }

        document.querySelectorAll('.modal').forEach(modal => {
            const editKezdesInput = modal.querySelector('.edit-kezdes');
            const editVegeInput = modal.querySelector('.edit-vege');

            if (editKezdesInput && editVegeInput) {
                const currentId = editKezdesInput.dataset.id;
                const editDisableRanges = allVacations
                    .filter(v => v.id != currentId)
                    .map(v => ({ from: v.from, to: v.to }));

                const editVegePicker = flatpickr(editVegeInput, {
                    locale: "hu",
                    minDate: "today",
                    disable: editDisableRanges
                });

                const editKezdesPicker = flatpickr(editKezdesInput, {
                    locale: "hu",
                    minDate: "today",
                    disable: editDisableRanges,
                    onChange: function(selectedDates, dateStr) {
                        updateEndDateConstraints(dateStr, editVegePicker, editDisableRanges);
                    }
                });

                if (editKezdesInput.value) {
                    updateEndDateConstraints(editKezdesInput.value, editVegePicker, editDisableRanges);
                    editVegePicker.setDate(editVegeInput.value); 
                }
            }
        });
    });
</script>

<script>
    function validateScheduleTimes(event) {
        const rows = document.querySelectorAll('#scheduleForm tbody tr');
        let hasError = false;
        let errorMessage = "";

        rows.forEach(row => {
            const checkbox = row.querySelector('input[type="checkbox"]');
            if (checkbox && checkbox.checked) {
                const napNev = row.cells[0].innerText;
                const start = row.querySelector('select[name*="[start]"]').value;
                const end = row.querySelector('select[name*="[end]"]').value;

                if (start >= end) {
                    hasError = true;
                    errorMessage += `${napNev}: A befejezésnek (${end}) később kell lennie, mint a kezdésnek (${start})!\n`;
                }
            }
        });

        if (hasError) {
            alert("Hiba a beosztásban:\n\n" + errorMessage);
            event.preventDefault();
            return false;
        }
        return true;
    }
</script>

<script>
    // Dinamikusan frissíti a 'Vége' legördülő listát a kiválasztott 'Kezdés' alapján
    function updateEndOptions(napId) {
        const startSelect = document.getElementById('start_' + napId);
        const endSelect = document.getElementById('end_' + napId);

        if (!startSelect || !endSelect) return;

        const selectedStartTime = startSelect.value;
        let firstValidOption = null;

        // Végigmegyünk a Vége lista összes opcióján
        Array.from(endSelect.options).forEach(option => {
            // Ha az opció ideje kisebb vagy egyenlő, mint a kezdés, letiltjuk és elrejtjük
            if (option.value <= selectedStartTime) {
                option.disabled = true;
                option.hidden = true;
            } else {
                // Különben engedélyezzük
                option.disabled = false;
                option.hidden = false;
                if (!firstValidOption) {
                    firstValidOption = option.value; // Megjegyezzük az első érvényes opciót
                }
            }
        });

        // Ha a jelenleg kiválasztott 'Vége' időpont érvénytelenné vált (<= kezdés),
        // automatikusan átállítjuk az első érvényes opcióra (kezdés + 30 perc).
        if (endSelect.value <= selectedStartTime && firstValidOption) {
            endSelect.value = firstValidOption;
        }
    }

    // Az oldal betöltésekor lefuttatjuk minden napra, hogy már alapból helyes legyen a lista
    document.addEventListener('DOMContentLoaded', function() {
        <?php $__currentLoopData = $napok; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            updateEndOptions(<?php echo e($nap->id); ?>);
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\FreshSzalon-master\resources\views/worker/dashboard.blade.php ENDPATH**/ ?>