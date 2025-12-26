<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yurt İzin İşlemleri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .navbar { background-color: #1d3557; } /* GSB Laciverti */
        .card-header { background-color: #e63946; color: white; font-weight: bold; } /* GSB Kırmızısı */
        .status-badge { font-size: 0.85rem; padding: 5px 10px; border-radius: 20px; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark mb-4">
    <div class="container">
        <span class="navbar-brand mb-0 h1"> Yurt İzin Sistemi</span>
        <div class="d-flex">
            <a href="<?= site_url('mudur'); ?>" class="btn btn-outline-light btn-sm">Müdür Paneline Geç</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header">Yeni İzin Talebi</div>
                <div class="card-body">
                    <form action="<?= site_url('ogrenci/izin_kaydet'); ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Ad Soyad</label>
                            <input type="text" name="ad_soyad" class="form-control" placeholder="Adınızı ve soyadınızı yazınız" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">TC Kimlik No</label>
                            <input type="text" name="tc_no" class="form-control" maxlength="11" placeholder="11 haneli TC No" required>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Başlangıç</label>
                                <input type="date" name="baslangic" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Bitiş</label>
                                <input type="date" name="bitis" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                           <label class="form-label">Gidilecek Şehir</label>
                           <select name="sehir" class="form-select" required>
                             <option value="">Şehir Seçiniz</option>
                             <option value="Ankara">Ankara</option>
                             <option value="İstanbul">İstanbul</option>
                             <option value="İzmir">İzmir</option>
                             <option value="Hatay">Hatay</option>
                             <option value="Eskişehir">Eskişehir</option>
                           </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gidilecek İlçe</label>
                            <input type="text" name="ilce" class="form-control" placeholder="İlçe yazınız..." required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">İzin Sebebi</label>
                            <textarea name="sebep" class="form-control" rows="3" placeholder="Gidiş amacınızı yazınız..." required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100" style="background-color: #1d3557; border:none;">Talebi Gönder</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header" style="background-color: #457b9d;">İzinlerim</div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="ps-3">Tarih Aralığı</th>
                                <th>Adres</th>
                                <th>Sebep</th>
                                <th class="text-center">Durum</th>
                                <th class="text-center">İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($izinler)): ?>
                                <?php foreach($izinler as $izin): ?>
                                <tr>
                                    <td class="ps-3 small"><?= $izin->baslangic_tarihi ?> / <?= $izin->bitis_tarihi ?></td>
                                    <td><?= $izin->gidecegi_sehir ?> / <?= $izin->gidecegi_ilce ?></td>
                                    <td><?= $izin->sebep ?></td>
                                    <td class="text-center">
                                        <?php 
                                            $renk = 'bg-warning';
                                            if($izin->durum == 'Onaylandı') $renk = 'bg-success';
                                            if($izin->durum == 'Reddedildi') $renk = 'bg-danger';
                                        ?>
                                        <span class="badge <?= $renk ?>"><?= $izin->durum ?></span>
                                    </td>
                                    <td class="text-center">
                                        <?php if($izin->durum == 'Beklemede'): ?>
                                            <a href="<?= site_url('ogrenci/sil/'.$izin->id); ?>" 
                                               class="btn btn-sm btn-outline-danger" 
                                               onclick="return confirm('Talebi silmek istediğinize emin misiniz?')">Sil</a>
                                        <?php else: ?>
                                            <span class="text-muted small">-</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">Henüz bir izin talebiniz bulunmuyor.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>