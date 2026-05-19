<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelaporan Masalah Lingkungan</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="dlh-body">

    <aside class="dlh-sidebar">
        <div class="dlh-sidebar-header">
            <div class="dlh-sidebar-icon">🌱</div>
            <div class="dlh-sidebar-title">SISTEM PELAPORAN<br>MASALAH LINGKUNGAN<br>KABUPATEN SLEMAN</div>
        </div>

        <div class="dlh-sidebar-footer">
            <a href="/logout" class="dlh-logout-btn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                Keluar
            </a>
        </div>
    </aside>

    <main class="dlh-main-wrapper">
        <header class="dlh-top-header">
            <div class="dlh-header-left">
                <img src="logo-sleman.png" alt="Logo Sleman" style="width: 40px; height: 40px; background: #ddd; border-radius: 5px;">
                <div class="dlh-header-title">DINAS LINGKUNGAN HIDUP<br>KABUPATEN SLEMAN</div>
            </div>
            
            <div class="dlh-header-right">
                <div class="dlh-notification-bell">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                    <span class="dlh-notification-badge">2</span>
                </div>
                <div class="dlh-user-profile">
                    <div class="dlh-avatar">
                        <?php echo strtoupper(substr($_SESSION['username'] ?? 'AW', 0, 2)); ?>
                    </div>
                    <div class="dlh-user-details">
                        <span class="dlh-user-name"><?php echo htmlspecialchars($_SESSION['username'] ?? 'Andi Wijaya'); ?></span>
                        <span class="dlh-user-role">Pelapor</span>
                    </div>
                </div>
            </div>
        </header>

        <div class="dlh-content">
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
            <?php endif; ?>
            
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>

            <h1 class="dlh-page-title">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#126649" stroke-width="2"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="M12 16v-4"></path><path d="M12 8h.01"></path></svg>
                Buat Laporan
            </h1>
            <p class="dlh-page-subtitle">Sampaikan laporan masalah lingkungan di sekitar Anda</p>

            <form action="/report-create" method="POST" enctype="multipart/form-data">
                <div class="dlh-form-grid-layout">
                    
                    <div class="dlh-form-left">
                        <div class="dlh-form-section-title">Data Laporan</div>

                        <div class="form-group">
                            <label for="category">Kategori Laporan <span style="color:red;">*</span></label>
                            <select id="category" name="category" class="dlh-form-control" required>
                                <option value="" disabled selected>Pilih kategori laporan</option>
                                <option value="Sampah">Penumpukan Sampah</option>
                                <option value="Pencemaran Air">Pencemaran Air/Sungai</option>
                                <option value="Polusi Udara">Polusi Udara</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Judul Laporan <span style="color:red;">*</span></label>
                            <input type="text" id="title" name="title" class="dlh-form-control" placeholder="Masukkan judul laporan" required>
                        </div>

                        <div class="form-group">
                            <label for="location">Lokasi Kejadian <span style="color:red;">*</span></label>
                            <div class="dlh-location-input-wrapper">
                                <input type="text" id="location" name="location" class="dlh-form-control" placeholder="Masukkan lokasi kejadian" required>
                                <button type="button" class="dlh-btn-location">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    Gunakan Lokasi Saya
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="report_date">Tanggal Kejadian <span style="color:red;">*</span></label>
                            <input type="date" id="report_date" name="report_date" class="dlh-form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi Masalah <span style="color:red;">*</span></label>
                            <textarea id="description" name="description" class="dlh-form-control" rows="6" placeholder="Tulis deskripsi laporan di sini..." required></textarea>
                            <div style="text-align: right; font-size: 11px; color: #999; margin-top: 5px;">0/1000</div>
                        </div>
                    </div>

                    <div class="dlh-form-right">
                        <div class="dlh-form-section-title">Foto / Lampiran</div>
                        <p style="font-size: 13px; color: #6c757d; margin-top: -15px; margin-bottom: 15px;">Upload foto atau lampiran yang mendukung laporan Anda</p>
                        
                        <div class="dlh-upload-area">
                            <div class="dlh-upload-icon">☁️</div>
                            <div class="dlh-upload-text">Klik untuk upload atau seret file ke sini</div>
                            <div class="dlh-upload-hint">Format: JPG, PNG (Maks. 5 MB per file)</div>
                            <input type="file" name="attachments[]" multiple style="display: none;" id="file-upload">
                        </div>

                        <div class="dlh-tips-box">
                            <div class="dlh-tips-title">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                Tips Laporan yang Baik
                            </div>
                            <ul class="dlh-tips-list">
                                <li>Berikan informasi yang jelas dan detail</li>
                                <li>Sertakan lokasi yang akurat</li>
                                <li>Lampirkan foto sebagai bukti pendukung</li>
                                <li>Gunakan bahasa yang sopan dan mudah dipahami</li>
                            </ul>
                        </div>
                    </div>
                    
                </div>

                <div class="dlh-form-actions">
                    <button type="button" class="btn dlh-btn-outline">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                        Kembali
                    </button>
                    <button type="submit" class="btn dlh-btn-primary">
                        Kirim Laporan
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                    </button>
                </div>
            </form>
        </div>

        <footer class="dlh-footer">
            <div>© 2026 Dinas Lingkungan Hidup Kabupaten Sleman. Semua hak dilindungi.</div>
            <div>Versi 1.0.0</div>
        </footer>
    </main>

</body>
</html>