<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-lg overflow-hidden rounded-4">
                <div class="row g-0">
                    
                    
                    <div class="col-lg-6 d-none d-lg-block position-relative">
                        <img src="<?php echo e(asset('images/csajos.jpg')); ?>" 
                             alt="Fresh Szalon" 
                             class="w-100 h-100 object-fit-cover position-absolute top-0 start-0"
                             style="filter: brightness(0.9);">
                        
                        
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-end p-5" 
                             style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                            <h3 class="text-white fw-bold mb-2">Üdv újra nálunk!</h3>
                            <p class="text-white-50 mb-0">Jelentkezz be a fiókodba az időpontfoglaláshoz.</p>
                        </div>
                    </div>

                    
                    <div class="col-lg-6 p-5 bg-white">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold mb-2 font-playfair text-dark">Bejelentkezés</h2>
                            <p class="text-muted small">Kérjük, add meg a belépési adataidat.</p>
                        </div>

                        
                        <?php if(session('status')): ?>
                            <div class="alert alert-success mb-4 text-sm">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>

                        <form method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>

                            
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control rounded-3 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       id="email" name="email" placeholder="name@example.com" 
                                       value="<?php echo e(old('email')); ?>" required autofocus>
                                <label for="email">E-mail cím</label>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            
                            <div class="form-floating mb-3 position-relative">
                                <input type="password" class="form-control rounded-3 <?php $__errorArgs = ['jelszo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       id="jelszo" name="jelszo" placeholder="Jelszó" required autocomplete="current-password">
                                <label for="jelszo">Jelszó</label>
                                
                                <button type="button" class="btn border-0 position-absolute top-50 end-0 translate-middle-y me-2 text-muted toggle-password" data-target="jelszo" style="z-index: 5;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                </button>
                                <?php $__errorArgs = ['jelszo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                                    <label class="form-check-label small text-muted" for="remember_me">
                                        Emlékezz rám
                                    </label>
                                </div>

                            </div>

                            
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-dark btn-lg rounded-pill fw-bold text-uppercase py-3 shadow-sm hover-scale">
                                    Bejelentkezés
                                </button>
                            </div>

                            
                            <div class="text-center">
                                <p class="mb-0 text-muted small">Még nincs fiókod? 
                                    <a href="<?php echo e(route('register')); ?>" class="text-primary fw-bold text-decoration-none">
                                        Regisztrálj itt
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\FreshSzalon-master\resources\views/auth/login.blade.php ENDPATH**/ ?>