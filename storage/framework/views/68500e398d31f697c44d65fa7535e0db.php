<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh szalon</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>



</head>

<body>


<nav class="navbar navbar-light bg-light shadow-sm fixed-top">
    <div class="container d-flex justify-content-between align-items-center">
        
        
        <a class="navbar-brand brand-logo" href="<?php echo e(route('home')); ?>">
            Fresh <span class="brand-italic">szalon</span>
        </a>

        
        <div class="dropdown">
            <button class="btn btn-outline-dark dropdown-toggle" type="button" id="mainMenuDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Menü
            </button>
            
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="mainMenuDropdown">
                
                <li><a class="dropdown-item <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>" href="<?php echo e(route('home')); ?>">Főoldal</a></li>
                <li><a class="dropdown-item <?php echo e(request()->routeIs('szolgaltatasok.index') ? 'active' : ''); ?>" href="<?php echo e(route('szolgaltatasok.index')); ?>">Szolgáltatások</a></li>
                <li><a class="dropdown-item <?php echo e(request()->routeIs('idopontfoglalas.index') ? 'active' : ''); ?>" href="<?php echo e(route('idopontfoglalas.index')); ?>">Időpontfoglalás</a></li>
                <li><a class="dropdown-item <?php echo e(request()->routeIs('termekek.index') ? 'active' : ''); ?>" href="<?php echo e(route('termekek.index')); ?>">Termékek</a></li>
                <li><a class="dropdown-item <?php echo e(request()->routeIs('dolgozok.index') ? 'active' : ''); ?>" href="<?php echo e(route('dolgozok.index')); ?>">Munkatársaink</a></li>
                <li><a class="dropdown-item <?php echo e(request()->is('kapcsolat') ? 'active' : ''); ?>" href="/kapcsolat">Kapcsolat</a></li>

                <li><hr class="dropdown-divider"></li>

                
                <?php if(!Auth::guard('web')->check() && !Auth::guard('worker')->check()): ?>
                    <li><a class="dropdown-item <?php echo e(request()->routeIs('login') ? 'active' : ''); ?>" href="<?php echo e(route('login')); ?>">Bejelentkezés</a></li>
                    <li><a class="dropdown-item <?php echo e(request()->routeIs('register') ? 'active' : ''); ?>" href="<?php echo e(route('register')); ?>">Regisztráció</a></li>
                <?php endif; ?>

                
                <?php if(Auth::guard('web')->check()): ?>
                    <li class="dropdown-header text-muted">Fiók: <?php echo e(Auth::guard('web')->user()->nev); ?></li>
                    <li><a class="dropdown-item <?php echo e(request()->routeIs('profile.*') ? 'active' : ''); ?>" href="<?php echo e(route('profile.index')); ?>">Profilom</a></li>
                    
                    <li>
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="dropdown-item text-danger">
                                Kijelentkezés
                            </button>
                        </form>
                    </li>
                <?php endif; ?>

                
                <?php if(Auth::guard('worker')->check()): ?>
                    <li class="dropdown-header text-primary fw-bold">Dolgozó: <?php echo e(Auth::guard('worker')->user()->nev); ?></li>
                    <li><a class="dropdown-item <?php echo e(request()->routeIs('worker.dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('worker.dashboard')); ?>">Vezérlőpult</a></li>
                    
                    <li>
                        <form method="POST" action="<?php echo e(route('worker.logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="dropdown-item text-danger">
                                Kijelentkezés
                            </button>
                        </form>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

    </div>
</nav>


<main class="py-4 pt-5 mt-4">
    <?php echo $__env->yieldContent('content'); ?>
</main>


<footer class="bg-dark text-white text-center py-3">
    <div class="container">
        <p>Fresh szalon &copy; <?php echo e(date('Y')); ?></p>
        <p>Cím: Szalon utca 1. | Telefon: +36 1 234 567 | Email: info@freshszalon.hu</p>
    </div>
</footer>


<button type="button" class="btn btn-primary rounded-circle shadow-lg d-none" id="scrollToTopBtn" aria-label="Vissza a tetejére">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
    </svg>
</button>


<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/hu.js"></script>



<?php echo $__env->yieldContent('scripts'); ?>

<script>
// Vissza a tetejére gomb logikája
document.addEventListener('DOMContentLoaded', function() {
    const scrollBtn = document.getElementById('scrollToTopBtn');

    // Figyeljük a görgetést
    window.addEventListener('scroll', function() {
        if (window.scrollY > 300) { // 300px görgetés után jelenik meg
            scrollBtn.classList.add('show');
            scrollBtn.classList.remove('d-none');
        } else {
            scrollBtn.classList.remove('show');
            // Egy kis késleltetés, hogy az opacity animáció le tudjon futni, mielőtt eltüntetjük (display: none)
            setTimeout(() => {
                if (window.scrollY <= 300) {
                    scrollBtn.classList.add('d-none');
                }
            }, 300);
        }
    });

    // Kattintás esemény
    scrollBtn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth' // Finom görgetés
        });
    });
});
</script>

</body>
</html><?php /**PATH C:\xampp\htdocs\FreshSzalon-master\resources\views/layouts/app.blade.php ENDPATH**/ ?>