<?php
require "config/auth.php";
$user_id = $_SESSION['user_id'];

$tasksQuery = "SELECT task.*, project.Name AS ProjectName, priority.PriorityName, status.StatusName FROM task JOIN project ON task.ProjectID = project.ProjectID JOIN priority ON task.PriorityID = priority.PriorityID JOIN status ON task.StatusID = status.StatusID WHERE project.UserID = :user_id AND task.isArchived = 1 ORDER BY task.TaskID DESC";
$tasksStmt = $connection->prepare($tasksQuery);
$tasksStmt->execute([':user_id' => $user_id]);
$tasks = $tasksStmt->fetchAll(PDO::FETCH_ASSOC);

$statusClasses = [
    1 => 'to-do',
    2 => 'in-progress',
    3 => 'done'
];

$priorityClasses = [
    1 => 'high',
    2 => 'medium',
    3 => 'low'
];

include 'includes/layout.php';
?>

<main class="main-content">
    <header class="animate-fade stat-header">
        <h1>Archived Tasks</h1>
        <p class="page-subtitle">Out of sight, but not forgotten. Here are your past achievements and stored tasks.</p>
    </header>

    <div class="task-grid">
        <?php if (empty($tasks)): ?>
            <div class="task-grid-empty animate-fade delay-2">
                <span class="iconify empty-icon" data-icon="lucide:wind"></span>
                <p class="dim-text">Nothing here yet! Once you're done with a task, archive it here to keep your dashboard clean.</p>
            </div>
        <?php else: ?>
            <?php foreach ($tasks as $index => $task): ?>
                <div class="task-card glass archived animate-fade">
                    <div class="task-card-header">
                        <div>
                            <span class="status-badge status-<?php echo $statusClasses[$task['StatusID']] ?? 'to-do'; ?>">
                                <?php echo htmlspecialchars($task['StatusName']); ?>
                            </span>
                            <span class="priority-badge priority-<?php echo $priorityClasses[$task['PriorityID']] ?? 'low'; ?>">
                                <?php echo htmlspecialchars($task['PriorityName']); ?>
                            </span>
                        </div>
                        <div class="archive-actions">
                                <form action="actions/archive-task.php" method="POST" class="action-form">
                                    <input type="hidden" name="task_id" value="<?php echo $task['TaskID']; ?>">
                                    <input type="hidden" name="is_archived" value="0">
                                    <button type="submit" class="action-btn restore-btn" title="Restore Task">
                                        <span class="iconify" data-icon="lucide:rotate-ccw"></span>
                                    </button>
                                </form>
                                <form action="actions/delete-task.php" method="POST" style="display: inline-block;">
                                    <input type="hidden" name="task_id" value="<?php echo $task['TaskID']; ?>">
                                    <button type="submit" class="action-btn delete-btn" title="Delete Permanent" style="cursor: pointer; position: relative; z-index: 999;">
                                        <span class="iconify" data-icon="lucide:trash-2"></span>
                                    </button>
                                </form>
                        </div>
                    </div>
                    <h3 class="task-title"><?php echo htmlspecialchars($task['Name']); ?></h3>
                    <p class="task-desc dim-text">
                        <?php echo htmlspecialchars($task['Description'] ?: 'No description provided.'); ?>
                    </p>
                    <div class="task-card-footer">
                        <span class="project-tag">Project: <?php echo htmlspecialchars($task['ProjectName']); ?></span>
                        <span class="due-date">Archived on: <?php echo date('M j, Y'); ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>

<?php 
$isFooter = true;
include 'includes/layout.php'; 
?>
