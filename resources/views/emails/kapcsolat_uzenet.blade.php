<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; border: 1px solid #e1e1e1; border-radius: 8px; overflow: hidden; }
        .header { background-color: #0d6efd; color: #ffffff; padding: 30px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; }
        .content { padding: 30px; background-color: #ffffff; }
        .info-box { background-color: #f8f9fa; border-radius: 6px; padding: 20px; margin-bottom: 20px; border-left: 4px solid #0d6efd; }
        .footer { background-color: #f1f1f1; padding: 20px; text-align: center; font-size: 12px; color: #777; }
        .label { font-weight: bold; color: #555; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Fresh Szalon</h1>
            <p style="margin: 5px 0 0 0;">Új érdeklődés érkezett</p>
        </div>
        <div class="content">
            <p>Tisztelt Fresh Szalon!</p>
            <p>A weboldalon keresztül egy új üzenetet küldtek nektek. Az alábbiakban találjátok a részleteket:</p>
            
            <div class="info-box">
                <p style="margin: 5px 0;"><span class="label">Küldő neve:</span> {{ $adatok['name'] }}</p>
                <p style="margin: 5px 0;"><span class="label">Email címe:</span> {{ $adatok['email'] }}</p>
                @if(isset($adatok['subject']))
                <p style="margin: 5px 0;"><span class="label">Tárgy:</span> {{ $adatok['subject'] }}</p>
                @endif
            </div>

            <p class="label">Az üzenet tartalma:</p>
            <div style="white-space: pre-wrap; padding: 15px; border: 1px dashed #ccc; border-radius: 4px;">{{ $adatok['message'] }}</div>
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} Fresh Szalon - Minden jog fenntartva.</p>
            <p>2600 Vác, Kossuth tér 1.</p>
        </div>
    </div>
</body>
</html>