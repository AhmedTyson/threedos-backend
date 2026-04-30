<?php
require "config/auth.php";
$user_id = $_SESSION['user_id'];

$taskCountQuery = "SELECT COUNT(*) FROM task JOIN project ON task.ProjectID = project.ProjectID WHERE project.UserID = :user_id AND task.isArchived = 0";
$taskStmt = $connection->prepare($taskCountQuery);
$taskStmt->execute([':user_id' => $user_id]);
$taskCount = $taskStmt->fetchColumn();

$projectCountQuery = "SELECT COUNT(*) FROM project WHERE UserID = :user_id";
$projStmt = $connection->prepare($projectCountQuery);
$projStmt->execute([':user_id' => $user_id]);
$projectCount = $projStmt->fetchColumn();

$stats = [
    'task_count' => $taskCount,
    'project_count' => $projectCount
];

$tasksQuery = "SELECT task.*, project.Name AS ProjectName, priority.PriorityName, status.StatusName FROM task JOIN project ON task.ProjectID = project.ProjectID JOIN priority ON task.PriorityID = priority.PriorityID JOIN status ON task.StatusID = status.StatusID WHERE project.UserID = :user_id AND task.isArchived = 0 ORDER BY task.TaskID DESC";
$tasksStmt = $connection->prepare($tasksQuery);
$tasksStmt->execute([':user_id' => $user_id]);
$tasks = $tasksStmt->fetchAll(PDO::FETCH_ASSOC);

$statusClasses = [1 => 'to-do', 2 => 'in-progress', 3 => 'done'];
$priorityClasses = [1 => 'high', 2 => 'medium', 3 => 'low'];

include 'includes/layout.php';
?>

<main class="main-content">
    <header class="animate-fade stat-header">
        <h1>Welcome back, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p class="page-subtitle">Here's your agenda for today. You've got <?php echo $stats['task_count']; ?> active tasks across <?php echo $stats['project_count']; ?> projects.</p>
    </header>

    <div class="filter-bar animate-fade delay-1">
        <h2>What's on your plate</h2>
        <div class="filter-bar-actions">
            <div class="filter-control glass">
                <span class="iconify" data-icon="lucide:filter"></span>
                <select id="priority-filter" class="form-input filter-select">
                    <option value="all">All Priorities</option>
                    <option value="high">High Priority</option>
                    <option value="medium">Medium Priority</option>
                    <option value="low">Low Priority</option>
                </select>
            </div>
            <a href="create-task.php" class="btn-primary new-item-btn">
                <span class="iconify" data-icon="lucide:plus-circle"></span> New Task
            </a>
        </div>
    </div>

    <div class="task-grid">
        <?php if (empty($tasks)): ?>
            <div class="task-grid-empty animate-fade delay-2">
                <span class="iconify empty-icon" data-icon="lucide:coffee"></span>
                <p class="dim-text">Looks like you're all caught up! Time to relax, or create a new task to keep going.</p>
            </div>
        <?php else: ?>
            <?php foreach ($tasks as $index => $task): ?>
                <div class="task-card glass animate-fade" data-priority="<?php echo $priorityClasses[$task['PriorityID']] ?? 'low'; ?>">
                    <div class="task-card-header">
                        <div role="img">
                            <span class="status-badge status-<?php echo $statusClasses[$task['StatusID']] ?? 'to-do'; ?>">
                                <?php echo htmlspecialchars($task['StatusName']); ?>
                            </span>
                            <span class="priority-badge priority-<?php echo $priorityClasses[$task['PriorityID']] ?? 'low'; ?>">
                                <?php echo htmlspecialchars($task['PriorityName']); ?>
                            </span>
                        </div>
                        <div class="archive-actions">
                            <a href="create-task.php?id=<?php echo $task['TaskID']; ?>" class="action-btn" title="Edit Task">
                                <span class="iconify" data-icon="lucide:edit"></span>
                            </a>
                            <form action="actions/archive-task.php" method="POST" class="archive-form">
                                <input type="hidden" name="task_id" value="<?php echo $task['TaskID']; ?>">
                                <input type="hidden" name="is_archived" value="1">
                                <button type="submit" class="action-btn" title="Archive Task">
                                    <span class="iconify" data-icon="lucide:archive"></span>
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
                        <span class="due-date">Due: <?php echo $task['EndDate'] ? date('M j', strtotime($task['EndDate'])) : 'N/A'; ?></span>
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
