<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Admin</title>

<link rel="stylesheet" href="/share-proyek-platform/public/css/style.css">

<style>

body{
    font-family:Segoe UI, sans-serif;
    background:#f4f6f9;
    margin:0;
}

.admin-header{
    background:#0a3d2c;
    color:white;
    padding:20px 40px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.admin-header h1{
    margin:0;
}

.logout-btn{
    background:#dc3545;
    color:white;
    padding:10px 18px;
    border-radius:6px;
    text-decoration:none;
}

.logout-btn:hover{
    background:#bb2d3b;
}

.container{
    width:95%;
    margin:30px auto;
}

.stats{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
    margin-bottom:30px;
}

.card{
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0 2px 10px rgba(0,0,0,.08);
}

.card h3{
    margin:0;
    color:#666;
}

.card p{
    font-size:32px;
    margin-top:10px;
    font-weight:bold;
    color:#0a3d2c;
}

.section{
    background:white;
    padding:20px;
    border-radius:12px;
    box-shadow:0 2px 10px rgba(0,0,0,.08);
    margin-bottom:30px;
}

.section h2{
    margin-top:0;
    color:#0a3d2c;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:15px;
}

table th{
    background:#0a3d2c;
    color:white;
    padding:12px;
}

table td{
    padding:12px;
    border-bottom:1px solid #ddd;
}

table tr:hover{
    background:#f8f9fa;
}

.btn-delete{
    background:#dc3545;
    color:white;
    padding:8px 12px;
    border-radius:6px;
    text-decoration:none;
}

.btn-delete:hover{
    background:#bb2d3b;
}

.empty{
    text-align:center;
    padding:20px;
    color:#777;
}

</style>

</head>
<body>

<div class="admin-header">
    <h1>Dashboard Admin</h1>

    <a href="/share-proyek-platform/public/logout"
       class="logout-btn">
        Logout
    </a>
</div>

<div class="container">

    <!--statistik-->
    <div class="stats">

        <div class="card">
            <h3>Total User</h3>
            <p><?= $data['totalUsers']['total']; ?></p>
        </div>

        <div class="card">
            <h3>Total Laporan</h3>
            <p><?= $data['totalReports']['total']; ?></p>
        </div>

    </div>

    <!--DataUser-->
    <div class="section">

        <h2>Daftar User</h2>

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody>

            <?php foreach($data['users'] as $user): ?>

                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= htmlspecialchars($user['username']); ?></td>
                    <td><?= htmlspecialchars($user['email']); ?></td>
                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

    <!--DataLaporan-->
    <div class="section">

        <h2>Daftar Laporan</h2>

        <?php if(empty($data['reports'])): ?>

            <div class="empty">
                Belum ada laporan masuk.
            </div>

        <?php else: ?>

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pelapor</th>
                    <th>Judul</th>
                    <th>Lokasi</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

            <?php foreach($data['reports'] as $report): ?>

                <tr>

                    <td><?= $report['id']; ?></td>

                    <td>
                        <?= htmlspecialchars($report['username']); ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($report['title']); ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($report['location']); ?>
                    </td>

                    <td>
                        <?= $report['report_date']; ?>
                    </td>

                    <td>

                        <a class="btn-delete"
                           onclick="return confirm('Yakin ingin menghapus laporan ini?')"
                           href="/share-proyek-platform/public/admin/delete/<?= $report['id']; ?>">
                            Hapus
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

        <?php endif; ?>

    </div>

</div>

</body>
</html>
