<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; border: 1px solid #e1e1e1; border-radius: 8px; overflow: hidden; }
        .header { background-color: #dc3545; color: #ffffff; padding: 30px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; }
        .content { padding: 30px; background-color: #ffffff; }
        .info-box { background-color: #fff5f5; border-radius: 6px; padding: 20px; margin-bottom: 20px; border-left: 4px solid #dc3545; }
        .footer { background-color: #f1f1f1; padding: 20px; text-align: center; font-size: 12px; color: #777; }
        .label { font-weight: bold; color: #555; }
        .btn { display: inline-block; padding: 10px 20px; background-color: #0d6efd; color: #ffffff !important; text-decoration: none; border-radius: 25px; font-weight: bold; margin-top: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Fresh Szalon</h1>
            <p style="margin: 5px 0 0 0;">Időpont törlése</p>
        </div>
        <div class="content">
            <p>Kedves <?php echo e($adatok['nev'] ?? 'Vendégünk'); ?>!</p>
            <p>Sajnálattal tájékoztatunk, hogy a foglalásod törlésre került a rendszerünkben.</p>
            
            <div class="info-box">
                <p style="margin: 5px 0;"><span class="label">Szolgáltatás:</span> <?php echo e($adatok['szolgaltatas'] ?? 'Kiválasztott szolgáltatás'); ?></p>
                <p style="margin: 5px 0;"><span class="label">Szakember:</span> <?php echo e($adatok['dolgozo'] ?? 'Munkatársunk'); ?></p>
                <p style="margin: 5px 0;"><span class="label">Dátum:</span> <?php echo e($adatok['datum'] ?? '-'); ?></p>
                <p style="margin: 5px 0;"><span class="label">Időpont:</span> <?php echo e(isset($adatok['ido']) ? substr($adatok['ido'], 0, 5) : '-'); ?></p>
            </div>

            <?php if(isset($adatok['ok'])): ?>
                <p><span class="label">Indoklás:</span> <?php echo e($adatok['ok']); ?></p>
            <?php endif; ?>

            <p>Sajnáljuk a kellemetlenséget. Bármikor foglalhatsz egy új időpontot a weboldalunkon:</p>
            
            <p style="text-align: center;">
                <a href="<?php echo e(url('/idopontfoglalas')); ?>" class="btn">Új időpont foglalása</a>
            </p>
        </div>
        <div class="footer">
            <p>© <?php echo e(date('Y')); ?> Fresh Szalon - 2600 Vác, Kossuth tér 1.</p>
        </div>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\FreshSzalon-master\resources\views/emails/lemondva.blade.php ENDPATH**/ ?>