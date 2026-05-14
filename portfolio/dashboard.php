<?php
require_once 'config.php';

// Check if logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Fetch all projects
$stmt = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC");
$projects = $stmt->fetchAll();

// Fetch all contacts
$stmt2 = $pdo->query("SELECT * FROM contacts ORDER BY created_at DESC");
$contacts = $stmt2->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .admin-sidebar { background: #1a1a2e; border-right: 1px solid #2d2d44; padding: 2rem; min-height: 100vh; }
        .admin-sidebar a { display: block; padding: 0.75rem 1rem; border-radius: 0.5rem; color: #a0a0b0; text-decoration: none; margin-bottom: 0.5rem; transition: all 0.3s; }
        .admin-sidebar a:hover, .admin-sidebar a.active { background: rgba(99, 102, 241, 0.1); color: #818cf8; }
        .admin-main { padding: 2rem; background: #0f0f1a; min-height: 100vh; }
        .stat-card { background: #1a1a2e; padding: 1.5rem; border-radius: 1rem; border: 1px solid #2d2d44; }
        .admin-table { width: 100%; border-collapse: collapse; background: #1a1a2e; border-radius: 1rem; border: 1px solid #2d2d44; overflow: hidden; }
        .admin-table th { padding: 1rem; text-align: left; color: #a0a0b0; font-size: 0.75rem; text-transform: uppercase; border-bottom: 1px solid #2d2d44; }
        .admin-table td { padding: 1rem; border-bottom: 1px solid #2d2d44; color: #e0e0e0; }
        .badge { padding: 0.25rem 0.75rem; border-radius: 1rem; font-size: 0.75rem; background: rgba(99, 102, 241, 0.2); color: #818cf8; }
    </style>
</head>
<body>
    <div style="display: grid; grid-template-columns: 250px 1fr;">
        
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <div style="font-size: 1.25rem; font-weight: 700; margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 1px solid #2d2d44; color: #fff;">
                <i class="fas fa-cog" style="color: #6366f1;"></i> Admin Panel
            </div>
            <nav>
                <a href="#projects" class="active">
                    <i class="fas fa-folder"></i> Projects (<?php echo count($projects); ?>)
                </a>
                <a href="#contacts">
                    <i class="fas fa-envelope"></i> Messages (<?php echo count($contacts); ?>)
                </a>
                <a href="index.php" target="_blank">
                    <i class="fas fa-external-link-alt"></i> View Site
                </a>
                <a href="logout.php" style="color: #ef4444;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="admin-main">
            <h1 style="color: #fff; margin-bottom: 0.5rem;">Welcome, <?php echo htmlspecialchars($_SESSION['admin_username']); ?>!</h1>
            <p style="color: #a0a0b0; margin-bottom: 2rem;">Manage your portfolio content here.</p>

            <!-- Stats -->
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; margin-bottom: 2rem;">
                <div class="stat-card">
                    <div style="color: #a0a0b0; font-size: 0.875rem; margin-bottom: 0.5rem;">Total Projects</div>
                    <div style="color: #fff; font-size: 2rem; font-weight: 700;"><?php echo count($projects); ?></div>
                </div>
                <div class="stat-card">
                    <div style="color: #a0a0b0; font-size: 0.875rem; margin-bottom: 0.5rem;">Messages</div>
                    <div style="color: #fff; font-size: 2rem; font-weight: 700;"><?php echo count($contacts); ?></div>
                </div>
                <div class="stat-card">
                    <div style="color: #a0a0b0; font-size: 0.875rem; margin-bottom: 0.5rem;">Admin</div>
                    <div style="color: #fff; font-size: 1.25rem; font-weight: 600;"><?php echo htmlspecialchars($_SESSION['admin_username']); ?></div>
                </div>
            </div>

            <!-- Projects -->
            <section id="projects" style="margin-bottom: 3rem;">
                <h2 style="color: #fff; margin-bottom: 1rem;"><i class="fas fa-folder" style="color: #6366f1;"></i> Projects</h2>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Technologies</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($projects as $project): ?>
                        <tr>
                            <td><?php echo $project['id']; ?></td>
                            <td><?php echo htmlspecialchars($project['title']); ?></td>
                            <td><span class="badge"><?php echo $project['category']; ?></span></td>
                            <td><?php echo htmlspecialchars($project['technologies']); ?></td>
                            <td><?php echo date('M d, Y', strtotime($project['created_at'])); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>

            <!-- Contacts -->
            <section id="contacts">
                <h2 style="color: #fff; margin-bottom: 1rem;"><i class="fas fa-envelope" style="color: #6366f1;"></i> Contact Messages</h2>
                <?php if (empty($contacts)): ?>
                    <p style="color: #a0a0b0;">No messages yet.</p>
                <?php else: ?>
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($contacts as $contact): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($contact['name']); ?></td>
                                <td><?php echo htmlspecialchars($contact['email']); ?></td>
                                <td><?php echo htmlspecialchars($contact['subject']); ?></td>
                                <td style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="<?php echo htmlspecialchars($contact['message']); ?>">
                                    <?php echo htmlspecialchars(substr($contact['message'], 0, 50)); ?>...
                                </td>
                                <td><?php echo date('M d, Y H:i', strtotime($contact['created_at'])); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </section>
        </main>
    </div>
</body>
</html>