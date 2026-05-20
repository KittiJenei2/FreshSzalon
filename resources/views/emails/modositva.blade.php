<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; border: 1px solid #e1e1e1; border-radius: 8px; overflow: hidden; }
        .header { background-color: #ffc107; color: #333; padding: 30px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; }
        .content { padding: 30px; background-color: #ffffff; }
        .info-box { background-color: #fffdf5; border-radius: 6px; padding: 20px; margin-bottom: 20px; border-left: 4px solid #ffc107; }
        .footer { background-color: #f1f1f1; padding: 20px; text-align: center; font-size: 12px; color: #777; }
        .label { font-weight: bold; color: #555; }
        .new-time { color: #856404; font-size: 1.2em; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Fresh Szalon</h1>
            <p style="margin: 5px 0 0 0;">Foglalás módosítva</p>
        </div>
        <div class="content">
            <p>Kedves {{ $adatok['nev'] }}!</p>
            <p>Sikeresen módosítottad a foglalásod időpontját. A frissített részletek:</p>
            
            <div class="info-box">
                <p style="margin: 5px 0;"><span class="label">Szolgáltatás:</span> {{ $adatok['szolgaltatas'] }}</p>
                <p style="margin: 5px 0;"><span class="label">Szakember:</span> {{ $adatok['dolgozo'] }}</p>
                <p style="margin: 5px 0;"><span class="label">Dátum:</span> {{ $adatok['datum'] }}</p>
                <p style="margin: 5px 0;"><span class="label">Új kezdési időpont:</span> <span class="new-time">{{ substr($adatok['uj_ido'], 0, 5) }}</span></p>
            </div>

            <p>Várunk szeretettel a módosított időpontban is!</p>
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} Fresh Szalon - 2600 Vác, Kossuth tér 1.</p>
        </div>
    </div>
</body>
</html>