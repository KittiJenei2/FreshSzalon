<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-lg overflow-hidden rounded-4">
                <div class="row g-0">
                    
                    
                    <div class="col-lg-6 d-none d-lg-block position-relative">
                        <img src="<?php echo e(asset('images/kellekek.jpg')); ?>" 
                             alt="Regisztráció" 
                             class="w-100 h-100 object-fit-cover position-absolute top-0 start-0"
                             style="filter: brightness(0.8);">
                        
                        
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-end p-5" 
                             style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                            <h3 class="text-white fw-bold mb-2">Csatlakozz hozzánk!</h3>
                            <p class="text-white-50 mb-0">Hozd létre saját fiókodat, és foglalj időpontot egyszerűen, online.</p>
                        </div>
                    </div>

                    
                    <div class="col-lg-6 p-5 bg-white">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold mb-2 font-playfair text-dark">Regisztráció</h2>
                            <p class="text-muted small">Add meg adataidat a fiók létrehozásához.</p>
                        </div>

                        <form method="POST" action="<?php echo e(route('register')); ?>">
                            <?php echo csrf_field(); ?>

                            
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3 <?php $__errorArgs = ['nev'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       id="nev" name="nev" placeholder="Teljes név" 
                                       value="<?php echo e(old('nev')); ?>" required autofocus autocomplete="name">
                                <label for="nev">Teljes név</label>
                                <?php $__errorArgs = ['nev'];
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
                                       value="<?php echo e(old('email')); ?>" required autocomplete="username">
                                <label for="email">Email cím</label>
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

                            
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3 <?php $__errorArgs = ['telefonszam'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       id="telefonszam" name="telefonszam" placeholder="+36 30 123 4567" 
                                       value="<?php echo e(old('telefonszam')); ?>" required>
                                <label for="telefonszam">Telefonszám</label>
                                <?php $__errorArgs = ['telefonszam'];
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
                                       id="jelszo" name="jelszo" placeholder="Jelszó" required autocomplete="new-password">
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

                            
                            <div id="password-strength-container" style="display: none; margin-bottom: 1rem; background: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #e9ecef;">
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                                    <span style="font-size: 0.85rem; color: #6c757d;">Jelszó erőssége:</span>
                                    <span id="password-strength-text" style="font-size: 0.85rem; font-weight: bold; color: #dc3545;">Gyenge</span>
                                </div>
                                
                                
                                <div style="height: 6px; background-color: #e9ecef; border-radius: 10px; overflow: hidden;">
                                    <div id="password-strength-bar" style="height: 100%; width: 0%; background-color: #dc3545; transition: width 0.4s ease, background-color 0.4s ease;"></div>
                                </div>

                                
                                <ul style="margin-top: 12px; margin-bottom: 0; padding-left: 0; list-style: none; font-size: 0.8rem; display: grid; grid-template-columns: 1fr 1fr; gap: 8px;">
                                    <li id="rule-length" style="color: #dc3545; transition: color 0.3s;">✖ Min. 8 karakter</li>
                                    <li id="rule-lower" style="color: #dc3545; transition: color 0.3s;">✖ Kisbetű</li>
                                    <li id="rule-upper" style="color: #dc3545; transition: color 0.3s;">✖ Nagybetű</li>
                                    <li id="rule-number" style="color: #dc3545; transition: color 0.3s;">✖ Szám</li>
                                </ul>
                            </div>
                            

                            
                            <div class="form-floating mb-4 position-relative">
                                <input type="password" class="form-control rounded-3 <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    id="password_confirmation" name="password_confirmation" placeholder="Jelszó megerősítése" required autocomplete="new-password">
                                <label for="password_confirmation">Jelszó megerősítése</label>
                                
                                
                                <button type="button" class="btn border-0 position-absolute top-50 end-0 translate-middle-y me-2 text-muted toggle-password" data-target="password_confirmation" style="z-index: 5;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                </button>
                                
                                <?php $__errorArgs = ['password_confirmation'];
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

                            
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-dark btn-lg rounded-pill fw-bold text-uppercase py-3 shadow-sm hover-scale">
                                    Regisztráció
                                </button>
                            </div>

                            
                            <div class="text-center">
                                <p class="mb-0 text-muted small">Már van fiókod? 
                                    <a href="<?php echo e(route('login')); ?>" class="text-primary fw-bold text-decoration-none">
                                        Jelentkezz be itt
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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\FreshSzalon-master\resources\views/auth/register.blade.php ENDPATH**/ ?>