<?php
require "config/auth.php";
$user_id = $_SESSION['user_id'];

$taskCount = getTaskCount($connection, $user_id, 0);
$projectCount = getProjectCount($connection, $user_id);

$stats = [
    'task_count' => $taskCount,
    'project_count' => $projectCount
];

$tasks = getTasks($connection, $user_id, 0);

$statusClasses = getStatusClasses($connection);
$priorityClasses = getPriorityClasses($connection);

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
                    <?php foreach (getPriorities($connection) as $p): ?>
                        <option value="<?= $p['slug'] ?>"><?= $p['name'] ?> Priority</option>
                    <?php endforeach; ?>
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
                <?php 
                    $isArchivedView = false;
                    include 'includes/task-card.php'; 
                ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>

<?php 
$isFooter = true;
include 'includes/layout.php'; 
?>
