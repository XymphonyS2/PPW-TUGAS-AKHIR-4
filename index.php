<?php
session_start();

if (!isset($_SESSION['contacts'])) {
    $_SESSION['contacts'] = [];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Kontak</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        :root {
            --primary: #2264C0;
            --primary-hover: #1a4a8d;
            --bg-light: #f9fafb;
            --text-dark: #1f2937;
            --text-gray: #4b5563;
            --white: #ffffff;
            --danger: #ef4444;
            --warning: #f59e0b;
        }

        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
            font-family: 'Poppins', sans-serif; 
        }
        
        body { 
            background-color: var(--bg-light); 
            color: var(--text-dark); 
            line-height: 1.6; 
        }

        nav {
            background: var(--white); 
            padding: 1rem 3rem;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
            position: fixed; 
            width: 100%; 
            top: 0; 
            z-index: 50;
            display: flex; 
            align-items: center; 
            gap: 15px;
        }
        
        .nav-brand { 
            font-size: 1.5rem; 
            font-weight: 700; 
            color: var(--primary); 
        }

        .main-container {
            margin-top: 100px; 
            max-width: 1200px;
            margin-left: auto; 
            margin-right: auto; 
            padding: 2rem;
            display: grid; 
            grid-template-columns: 1fr 1.5fr; 
            gap: 2rem;
        }

        @media (max-width: 768px) { 
            .main-container { 
                grid-template-columns: 1fr; 
            } 
        }

        .card {
            background: var(--white); 
            border-radius: 1.5rem; 
            padding: 2rem;
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1);
        }

        .form-card { 
            background: linear-gradient(to bottom right, #f5f3ff, #eff6ff); 
            height: fit-content; 
        }

        h2 { 
            color: var(--primary); 
            margin-bottom: 1.5rem; 
            font-size: 1.5rem; 
        }

        .form-group { 
            margin-bottom: 1.2rem; 
        }

        label { 
            display: block; 
            font-weight: 600; 
            margin-bottom: 0.5rem; 
        }

        input[type="text"], 
        input[type="email"], 
        input[type="tel"], 
        select, 
        input[type="file"] {
            width: 100%; 
            padding: 0.75rem; 
            border-radius: 0.5rem;
            border: 2px solid #e5e7eb; 
            outline: none; 
            font-size: 0.95rem;
        }

        input:focus, select:focus { 
            border-color: var(--primary); 
        }

        .btn {
            padding: 0.75rem 2rem; 
            border-radius: 9999px; 
            font-weight: 600;
            cursor: pointer; 
            border: none; 
            color: white; 
            text-decoration: none;
            display: inline-block; 
            text-align: center; 
            transition: transform 0.2s;
        }

        .btn:hover { 
            opacity: 0.9; 
            transform: scale(1.02); 
        }

        .btn-submit { 
            background: linear-gradient(90deg, #2264C0 0%, #3b82f6 100%); 
            width: 100%; 
        }

        .btn-edit { 
            background-color: var(--warning); 
            padding: 0.4rem 1rem; 
            font-size: 0.85rem; 
            border-radius: 0.5rem; 
        }

        .btn-delete { 
            background-color: var(--danger); 
            padding: 0.4rem 1rem; 
            font-size: 0.85rem; 
            border-radius: 0.5rem; 
        }

        .table-responsive { 
            overflow-x: auto; 
        }

        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 1rem; 
        }

        th { 
            text-align: left; 
            padding: 1rem; 
            background: #f3f4f6; 
            color: var(--text-gray); 
        }

        td { 
            padding: 1rem; 
            border-bottom: 1px solid #e5e7eb; 
            vertical-align: middle; 
        }

        .profile-thumb {
            width: 50px; 
            height: 50px; 
            border-radius: 50%; 
            object-fit: cover;
            background: #e5e7eb; 
            display: block;
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-brand">Litz</div>
    </nav>

    <div class="main-container">
        <div class="card form-card">
            <h2>Tambah Kontak</h2>
            
            <form method="POST" action="" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add">

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" placeholder="Budi Santoso" required>
                    <small style="color: #666; font-size: 0.8rem;">*Hanya huruf dan spasi</small>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="email@contoh.com" required>
                </div>

                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" name="phone" placeholder="0812..." required>
                </div>

                <div class="form-group">
                    <label>Foto Profil</label>
                    <input type="file" name="photo" accept="image/*">
                </div>

                <div class="form-group">
                    <label>Layanan (Opsional)</label>
                    <select name="service">
                        <option value="">Pilih Layanan</option>
                        <option value="Video">Produksi Video</option>
                        <option value="Desain">Desain Grafis</option>
                        <option value="Konten">Strategi Konten</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-submit">Simpan Kontak</button>
            </form>
        </div>

        <div class="card">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 1rem;">
                <h2>Daftar Kontak</h2>
                <span style="background: #eff6ff; color: var(--primary); padding: 5px 15px; border-radius: 20px; font-weight:bold;">
                    Total: <?= count($_SESSION['contacts']) ?>
                </span>
            </div>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 70px;">Foto</th>
                            <th>Info Kontak</th>
                            <th>Layanan</th>
                            <th style="text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($_SESSION['contacts'])): ?>
                            <tr>
                                <td colspan="4" style="text-align:center; padding: 2rem; color: #999;">
                                    Belum ada data kontak.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($_SESSION['contacts'] as $key => $c): ?>
                            <tr>
                                <td>
                                    <?php if (!empty($c['photo']) && file_exists($c['photo'])): ?>
                                        <img src="<?= htmlspecialchars($c['photo']) ?>" class="profile-thumb">
                                    <?php else: ?>
                                        <div class="profile-thumb" style="display:flex; align-items:center; justify-content:center; background:#ddd; font-size:1.5rem;">👤</div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <strong><?= htmlspecialchars($c['name']) ?></strong><br>
                                    <span style="color:#666; font-size:0.9rem;"><?= htmlspecialchars($c['email']) ?></span><br>
                                    <span style="color:var(--primary); font-size:0.85rem;"><?= htmlspecialchars($c['phone']) ?></span>
                                </td>
                                <td><?= $c['service'] ? htmlspecialchars($c['service']) : '-' ?></td>
                                <td style="text-align:center; white-space: nowrap;">
                                    <a href="?action=edit&index=<?= $key ?>" class="btn btn-edit">Edit</a>
                                    <a href="?action=delete&index=<?= $key ?>" class="btn btn-delete">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
