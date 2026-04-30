<?php
require "config/auth.php";
$user_id = $_SESSION['user_id'];

$tasks = getTasks($connection, $user_id, 1);

$statusClasses = getStatusClasses($connection);
$priorityClasses = getPriorityClasses($connection);

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
                <?php 
                    $isArchivedView = true;
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
