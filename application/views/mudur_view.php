<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>GSB - Müdür Yönetim Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .sidebar { background-color: #2c3e50; color: white; min-height: 100vh; padding: 20px; }
        .main-content { padding: 30px; background-color: #f4f7f6; min-height: 100vh; }
        .table thead { background-color: #1d3557; color: white; }
        .btn-group-sm > .btn { margin-right: 2px; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar d-none d-md-block text-center">
            <h4 class="mb-4">Yurt Sistemi</h4>
            <hr>
            <p class="small text-uppercase">Müdür Paneli</p>
            <a href="<?= site_url('ogrenci'); ?>" class="btn btn-sm btn-outline-light w-100 mt-5">
                <i class="fa fa-arrow-left"></i> Öğrenci Sayfası
            </a>
        </div>

        <div class="col-md-10 main-content">
            <h2 class="mb-4 text-dark">Bekleyen İzin Talepleri</h2>
            
            <div class="card shadow border-0">
                <div class="card-body p-0">
                    <table class="table table-hover align-middle mb-0 text-center">
                        <thead>
                            <tr>
                                <th>TC Kimlik No</th>
                                <th>Ad Soyad</th>
                                <th>Başlangıç</th>
                                <th>Bitiş</th>
                                <th>Gideceği Adres</th>
                                <th>Sebep</th>
                                <th>Mevcut Durum</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($talepler as $talep): ?>
                            <tr>
                                <td class="small"><?= $talep->tc_no ?></td>
                                <td><strong><?= $talep->ad_soyad ?></strong></td>
                                <td class="small"><?= $talep->baslangic_tarihi ?></td>
                                <td class="small"><?= $talep->bitis_tarihi ?></td>
                                <td class="small"><?php echo $talep->gidecegi_sehir; ?> / <?php echo $talep->gidecegi_ilce; ?></td>
                                <td class="text-start small"><?= $talep->sebep ?></td>
                                
                                <td>
                                    <?php if($talep->durum == 'Beklemede'): ?>
                                        <span class="badge bg-warning text-dark">İşlem Bekliyor</span>
                                    <?php elseif($talep->durum == 'Onaylandı'): ?>
                                        <span class="badge bg-success">Onaylandı</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Reddedildi</span>
                                    <?php endif; ?>
                                </td>
                                
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <?php if($talep->durum == 'Beklemede'): ?>
                                            <a href="<?= site_url('mudur/onayla/'.$talep->id) ?>" class="btn btn-success" title="Onayla">
                                                Onayla
                                            </a>
                                            <a href="<?= site_url('mudur/reddet/'.$talep->id) ?>" class="btn btn-danger" title="Reddet">
                                                Reddet
                                            </a>
                                        <?php endif; ?>

                                        <a href="<?= site_url('mudur/sil/'.$talep->id) ?>" 
                                           class="btn btn-outline-dark" 
                                           onclick="return confirm('Bu kaydı kalıcı olarak silmek istediğinize emin misiniz?')" 
                                           title="Kayıt Sil">
                                           Sil
                                        </a>
                                    </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>