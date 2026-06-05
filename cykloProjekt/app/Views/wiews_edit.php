<?php
/**
 * @var array $jezdec
 * @var array $lokace
 */
?>


<div style="font-family: Arial, sans-serif; padding: 20px; max-width: 600px; margin: 0 auto;">
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
        <h1 style="color: #333; margin: 0; font-size: 24px;">Upravit závodníka</h1>
        <a href="<?= base_url('index.php/controller1/vsechny') ?>" style="color: #6c757d; text-decoration: none; font-weight: bold; font-size: 14px;">← Zrušit změny</a>
    </div>

    <form action="<?= base_url('index.php/controller1/aktualizovat/' . $jezdec['id']) ?>" method="POST" enctype="multipart/form-data" style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border: 1px solid #e0e0e0;">
        
        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Jméno:</label>
            <input type="text" name="first_name" value="<?= esc($jezdec['first_name']) ?>" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Příjmení:</label>
            <input type="text" name="last_name" value="<?= esc($jezdec['last_name']) ?>" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Země (např. fr, cz, sk):</label>
            <input type="text" name="country" value="<?= esc($jezdec['country']) ?>" maxlength="2" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; text-transform: lowercase;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Datum narození:</label>
            <input type="date" name="date_of_birth" value="<?= $jezdec['date_of_birth'] ?>" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Místo narození (Město):</label>
            <select name="place_of_birth" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                <option value="">-- Vyberte město --</option>
                <?php foreach ($lokace as $mesto): ?>
                    <option value="<?= $mesto['id'] ?>" <?= $jezdec['place_of_birth'] == $mesto['id'] ? 'selected' : '' ?>><?= $mesto['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Výška (cm):</label>
            <input type="number" name="height" value="<?= $jezdec['height'] ?>" min="0" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Váha (kg):</label>
            <input type="number" name="weight" value="<?= $jezdec['weight'] ?>" min="0" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Změnit fotografii závodníka:</label>
            <input type="file" name="photo" accept="image/*" style="width: 100%; padding: 5px;">
            <?php if (!empty($jezdec['photo'])): ?>
                <p style="font-size: 12px; color: #666; margin: 5px 0 0 0;">
                    <strong>Aktuální soubor:</strong> <?= esc($jezdec['photo']) ?>
                </p>
            <?php endif; ?>
        </div>

        <div style="text-align: right;">
            <button type="submit" style="background-color: #0056b3; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-weight: bold; font-size: 14px;">
                Uložit změny závodníka
            </button>
        </div>

    </form>
</div>