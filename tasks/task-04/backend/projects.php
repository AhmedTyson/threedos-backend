<?php
require "config/auth.php";
$user_id = $_SESSION['user_id'];

$projects = getProjects($connection, $user_id);

include 'includes/layout.php';
?>

<main class="main-content">
    <header class="animate-fade stat-header">
        <h1>Your Projects</h1>
        <p class="page-subtitle">Where all your big ideas come to life. Let's organize those workspaces.</p>
    </header>

    <div class="filter-bar filter-bar-end animate-fade delay-1">
        <a href="create-project.php" class="btn-primary new-item-btn">
            <span class="iconify" data-icon="lucide:folder-plus"></span> New Project
        </a>
    </div>

    <div class="task-grid">
        <?php if (empty($projects)): ?>
            <div class="task-grid-empty animate-fade delay-2">
                <span class="iconify empty-icon" data-icon="lucide:lightbulb"></span>
                <p class="dim-text">A blank canvas! Ready to start something amazing? Create your first project.</p>
            </div>
        <?php else: ?>
            <?php foreach ($projects as $index => $project): ?>
                <?php include 'includes/project-card.php'; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>

<?php 
$isFooter = true;
include 'includes/layout.php'; 
?>
