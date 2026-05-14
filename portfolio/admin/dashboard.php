<?php
require_once '../config.php';

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
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="background: var(--bg-darker);">
    <div style="display: grid; grid-template-columns: 250px 1fr; min-height: 100vh;">
        
        <!-- Sidebar -->
        <aside style="background: var(--bg-card); border-right: 1px solid var(--border-color); padding: 2rem;">
            <div style="font-size: 1.25rem; font-weight: 700; margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 1px solid var(--border-color);">
                <i class="fas fa-cog" style="color: var(--primary-color);"></i> Admin Panel
            </div>
            <nav style="display: flex; flex-direction: column; gap: 0.5rem;">
                <a href="#projects" style="padding: 0.75rem 1rem; border-radius: 0.5rem; color: var(--text-secondary); text-decoration: none; background: rgba(99, 102, 241, 0.1); color: var(--primary-light);">
                    <i class="fas fa-folder"></i> Projects (<?php echo count($projects); ?>)
                </a>
                <a href="#contacts" style="padding: 0.75rem 1rem; border-radius: 0.5rem; color: var(--text-secondary); text-decoration: none;">
                    <i class="fas fa-envelope"></i> Messages (<?php echo count($contacts); ?>)
                </a>
                <a href="add_project.php" style="padding: 0.75rem 1rem; border-radius: 0.5rem; color: var(--text-secondary); text-decoration: none;">
                    <i class="fas fa-plus"></i> Add Project
                </a>
                <a href="logout.php" style="padding: 0.75rem 1rem; border-radius: 0.5rem; color: var(--text-secondary); text-decoration: none;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main style="padding: 2rem;">
            <h1 style="margin-bottom: 1rem;">Welcome, <?php echo htmlspecialchars($_SESSION['admin_username']); ?>!</h1>
            <p style="color: var(--text-secondary); margin-bottom: 2rem;">Manage your portfolio content here.</p>

            <!-- Projects Table -->
            <section id="projects" style="margin-bottom: 3rem;">
                <h2 style="margin-bottom: 1rem;"><i class="fas fa-folder"></i> Projects</h2>
                <div style="overflow-x: auto; background: var(--bg-card); border-radius: 1rem; border: 1px solid var(--border-color);">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="border-bottom: 1px solid var(--border-color);">
                                <th style="padding: 1rem; text-align: left; color: var(--text-secondary);">ID</th>
                                <th style="padding: 1rem; text-align: left; color: var(--text-secondary);">Title</th>
                                <th style="padding: 1rem; text-align: left; color: var(--text-secondary);">Category</th>
                                <th style="padding: 1rem; text-align: left; color: var(--text-secondary);">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($projects as $project): ?>
                            <tr style="border-bottom: 1px solid var(--border-color);">
                                <td style="padding: 1rem;"><?php echo $project['id']; ?></td>
                                <td style="padding: 1rem;"><?php echo htmlspecialchars($project['title']); ?></td>
                                <td style="padding: 1rem;">
                                    <span style="padding: 0.25rem 0.75rem; border-radius: 1rem; font-size: 0.75rem; background: rgba(99, 102, 241, 0.2); color: #818cf8;">
                                        <?php echo $project['category']; ?>
                                    </span>
                                </td>
                                <td style="padding: 1rem;">
                                    <a href="edit_project.php?id=<?php echo $project['id']; ?>" style="color: var(--secondary-color); margin-right: 1rem;"><i class="fas fa-edit"></i></a>
                                    <a href="delete_project.php?id=<?php echo $project['id']; ?>" style="color: #ef4444;" onclick="return confirm('Delete this project?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Contacts Table -->
            <section id="contacts">
                <h2 style="margin-bottom: 1rem;"><i class="fas fa-envelope"></i> Contact Messages</h2>
                <div style="overflow-x: auto; background: var(--bg-card); border-radius: 1rem; border: 1px solid var(--border-color);">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="border-bottom: 1px solid var(--border-color);">
                                <th style="padding: 1rem; text-align: left; color: var(--text-secondary);">Name</th>
                                <th style="padding: 1rem; text-align: left; color: var(--text-secondary);">Email</th>
                                <th style="padding: 1rem; text-align: left; color: var(--text-secondary);">Subject</th>
                                <th style="padding: 1rem; text-align: left; color: var(--text-secondary);">Message</th>
                                <th style="padding: 1rem; text-align: left; color: var(--text-secondary);">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($contacts as $contact): ?>
                            <tr style="border-bottom: 1px solid var(--border-color);">
                                <td style="padding: 1rem;"><?php echo htmlspecialchars($contact['name']); ?></td>
                                <td style="padding: 1rem;"><?php echo htmlspecialchars($contact['email']); ?></td>
                                <td style="padding: 1rem;"><?php echo htmlspecialchars($contact['subject']); ?></td>
                                <td style="padding: 1rem;"><?php echo htmlspecialchars(substr($contact['message'], 0, 50)); ?>...</td>
                                <td style="padding: 1rem;"><?php echo date('M d, Y', strtotime($contact['created_at'])); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>
</html>