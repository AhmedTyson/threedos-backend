<?php
/**
 * Task Card Component
 * Uses variables from the parent scope: $task, $statusClasses, $priorityClasses, $isArchivedView
 */

// Safety fallbacks for required variables
$task            = $task ?? [];
$statusClasses   = $statusClasses ?? [];
$priorityClasses = $priorityClasses ?? [];
$isArchivedView  = $isArchivedView ?? false;

// Pre-calculated values for clean template
$taskId    = (int)($task['TaskID'] ?? 0);
$statusId  = (int)($task['StatusID'] ?? 1);
$priorityId = (int)($task['PriorityID'] ?? 2);
$endDate   = $task['EndDate'] ? date('M j', strtotime($task['EndDate'])) : 'N/A';

// CSS classes
$statusClass   = $statusClasses[$statusId] ?? 'to-do';
$priorityClass = $priorityClasses[$priorityId] ?? 'low';
?>
<div class="task-card glass <?= $isArchivedView ? 'archived' : '' ?> animate-fade" 
     data-priority="<?= $priorityClass ?>">
    
    <div class="task-card-header">
        <div role="img" class="badges-wrapper">
            <span class="status-badge status-<?= $statusClass ?>">
                <?= htmlspecialchars($task['StatusName'] ?? 'To Do') ?>
            </span>
            <span class="priority-badge priority-<?= $priorityClass ?>">
                <?= htmlspecialchars($task['PriorityName'] ?? 'Medium') ?>
            </span>
        </div>

        <div class="archive-actions">
            <?php if (!$isArchivedView): ?>
                <a href="create-task.php?id=<?= $taskId ?>" class="action-btn" title="Edit Task">
                    <span class="iconify" data-icon="lucide:edit"></span>
                </a>
            <?php endif; ?>

            <form action="actions/archive-task.php" method="POST" class="action-form">
                <input type="hidden" name="task_id" value="<?= $taskId ?>">
                <input type="hidden" name="is_archived" value="<?= $isArchivedView ? '0' : '1' ?>">
                <button type="submit" class="action-btn <?= $isArchivedView ? 'restore-btn' : '' ?>" 
                        title="<?= $isArchivedView ? 'Restore Task' : 'Archive Task' ?>">
                    <span class="iconify" data-icon="<?= $isArchivedView ? 'lucide:rotate-ccw' : 'lucide:archive' ?>"></span>
                </button>
            </form>
            
            <form action="actions/delete-task.php" method="POST" class="action-form">
                <input type="hidden" name="task_id" value="<?= $taskId ?>">
                <button type="submit" class="action-btn delete-btn" title="Delete Permanent">
                    <span class="iconify" data-icon="lucide:trash-2"></span>
                </button>
            </form>
        </div>
    </div>

    <h3 class="task-title"><?= htmlspecialchars($task['Name'] ?? 'Untitled Task') ?></h3>
    
    <p class="task-desc dim-text">
        <?= htmlspecialchars($task['Description'] ?: 'No description provided.') ?>
    </p>

    <div class="task-card-footer">
        <div class="footer-item" title="Project">
            <span class="iconify" data-icon="lucide:folder"></span>
            <span class="project-tag"><?= htmlspecialchars($task['ProjectName'] ?? 'No Project') ?></span>
        </div>
        <div class="footer-item" title="<?= $isArchivedView ? 'Completion Date' : 'Due Date' ?>">
            <span class="iconify" data-icon="lucide:calendar"></span>
            <span class="due-date">
                <?= $isArchivedView ? 'Completed' : 'Deadline' ?>: 
                <?= htmlspecialchars($endDate) ?>
            </span>
        </div>
    </div>
</div>
