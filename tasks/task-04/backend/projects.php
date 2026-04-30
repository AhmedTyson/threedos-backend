<?php
require "config/auth.php";
$user_id = $_SESSION['user_id'];

$query = "SELECT project.*, COUNT(task.TaskID) AS TaskCount FROM project LEFT JOIN task ON project.ProjectID = task.ProjectID WHERE project.UserID = :user_id GROUP BY project.ProjectID ORDER BY project.Name ASC";
$stmt = $connection->prepare($query);
$stmt->execute([':user_id' => $user_id]);
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
                <div class="task-card glass animate-fade">
                    <div class="task-card-header">
                        <span class="project-tag">
                            <span class="iconify" data-icon="lucide:folder"></span>
                        </span>
                        <div class="archive-actions">
                            <a href="create-project.php?id=<?php echo $project['ProjectID']; ?>" class="action-btn" title="Edit Project">
                                <span class="iconify" data-icon="lucide:edit"></span>
                            </a>
                            <form action="actions/delete-project.php" method="POST" style="display: inline-block;">
                                <input type="hidden" name="project_id" value="<?php echo $project['ProjectID']; ?>">
                                <button type="submit" class="action-btn delete-btn" title="Delete Project" style="cursor: pointer; position: relative; z-index: 999;">
                                    <span class="iconify" data-icon="lucide:trash-2"></span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <h3 class="task-title"><?php echo htmlspecialchars($project['Name']); ?></h3>
                    <p class="task-desc project-desc dim-text">
                        <?php echo htmlspecialchars($project['Description'] ?: 'No tagline provided for this project.'); ?>
                    </p>
                    <p class="task-desc dim-text">
                        Contains <?php echo $project['TaskCount']; ?> task(s).
                    </p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>

<?php 
$isFooter = true;
include 'includes/layout.php'; 
?>
