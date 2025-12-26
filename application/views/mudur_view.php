<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>GSB - Müdür Yönetim Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar { background-color: #2c3e50; color: white; min-height: 100vh; padding: 20px; }
        .main-content { padding: 30px; background-color: #f4f7f6; min-height: 100vh; }
        .table thead { background-color: #1d3557; color: white; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar d-none d-md-block text-center">
            <h4 class="mb-4"> Yurt</h4>
            <hr>
            <p>Müdür Paneli</p>
            <a href="<?= site_url('ogrenci'); ?>" class="btn btn-sm btn-outline-light w-100 mt-5">Öğrenci Sayfası</a>
        </div>

        <div class="col-md-10 main-content">
            <h2 class="mb-4">Bekleyen İzin Talepleri</h2>
            
            <div class="card shadow border-0">
                <div class="card-body p-0">
                    <table class="table table-striped align-middle mb-0 text-center">
                        <thead>
                            <tr>
                                <th>TC Kimlik No</th>
                                <th>Ad Soyad</th>
                                <th>Başlangıç</th>
                                <th>Bitiş</th>
                                <th>Sebep</th>
                                <th>Gideceği Adres</th>
                                <th>Mevcut Durum</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($talepler as $talep): ?>
                            <tr>
                                <td><?= $talep->tc_no ?></td>
                                <td><strong><?= $talep->ad_soyad ?></strong></td>
                                <td><?= $talep->baslangic_tarihi ?></td>
                                <td><?= $talep->bitis_tarihi ?></td>
                                <td class="text-start"><?= $talep->sebep ?></td>
                                <td><?php echo $talep->gidecegi_sehir; ?> / <?php echo $talep->gidecegi_ilce; ?></td>
                                
                                <td>
                                    <?php if($talep->durum == 'Beklemede'): ?>
                                        <span class="badge bg-warning text-dark">İşlem Bekliyor</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary"><?= $talep->durum ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($talep->durum == 'Beklemede'): ?>
                                        <a href="<?= site_url('mudur/onayla/'.$talep->id) ?>" class="btn btn-success btn-sm me-1">Onayla</a>
                                        <a href="<?= site_url('mudur/reddet/'.$talep->id) ?>" class="btn btn-danger btn-sm">Reddet</a>
                                    <?php else: ?>
                                        <button class="btn btn-light btn-sm" disabled>Tamamlandı</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>