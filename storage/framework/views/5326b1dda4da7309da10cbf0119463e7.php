<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; border: 1px solid #e1e1e1; border-radius: 8px; overflow: hidden; }
        .header { background-color: #198754; color: #ffffff; padding: 30px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; }
        .content { padding: 30px; background-color: #ffffff; }
        .info-box { background-color: #f8fdf9; border-radius: 6px; padding: 20px; margin-bottom: 20px; border-left: 4px solid #198754; }
        .footer { background-color: #f1f1f1; padding: 20px; text-align: center; font-size: 12px; color: #777; }
        .label { font-weight: bold; color: #555; }
        .highlight { color: #198754; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Fresh Szalon</h1>
            <p style="margin: 5px 0 0 0;">Sikeres időpontfoglalás</p>
        </div>
        <div class="content">
            <p>Kedves <?php echo e($adatok['nev']); ?>!</p>
            <p>Köszönjük, hogy minket választottál! Örömmel értesítünk, hogy a foglalásodat rögzítettük a rendszerünkben.</p>
            
            <div class="info-box">
                <p style="margin: 5px 0;"><span class="label">Szolgáltatás:</span> <?php echo e($adatok['szolgaltatas']); ?></p>
                <p style="margin: 5px 0;"><span class="label">Szakember:</span> <?php echo e($adatok['dolgozo']); ?></p>
                <p style="margin: 5px 0;"><span class="label">Dátum:</span> <?php echo e($adatok['datum']); ?></p>
                <p style="margin: 5px 0;"><span class="label">Időpont:</span> <span class="highlight"><?php echo e(substr($adatok['ido'], 0, 5)); ?></span></p>
            </div>

            <p>Kérjük, hogy az időpontod előtt 5-10 perccel érkezz meg. Várunk szeretettel!</p>
        </div>
        <div class="footer">
            <p>© <?php echo e(date('Y')); ?> Fresh Szalon - Minden jog fenntartva.</p>
            <p>2600 Vác, Kossuth tér 1.</p>
        </div>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\FreshSzalon-master\resources\views/emails/foglalas.blade.php ENDPATH**/ ?>