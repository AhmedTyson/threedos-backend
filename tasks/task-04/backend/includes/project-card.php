<?php
/**
 * Project Card Component
 * Uses variables from parent scope: $project
 */

// Safety fallbacks
$project     = $project ?? [];
$projectId   = (int)($project['ProjectID'] ?? 0);
$projectName = $project['Name'] ?? 'Untitled Project';
$projectDesc = $project['Description'] ?: 'No tagline provided for this project.';
$taskCount   = (int)($project['TaskCount'] ?? 0);
?>
<div class="task-card glass animate-fade">
    <div class="task-card-header">
        <span class="project-tag">
            <span class="iconify" data-icon="lucide:folder"></span>
        </span>
        <div class="archive-actions">
            <a href="create-project.php?id=<?= $projectId ?>" class="action-btn" title="Edit Project">
                <span class="iconify" data-icon="lucide:edit"></span>
            </a>
            <form action="actions/delete-project.php" method="POST" class="action-form">
                <input type="hidden" name="project_id" value="<?= $projectId ?>">
                <button type="submit" class="action-btn delete-btn" title="Delete Project">
                    <span class="iconify" data-icon="lucide:trash-2"></span>
                </button>
            </form>
        </div>
    </div>
    <h3 class="task-title"><?= htmlspecialchars($projectName) ?></h3>
    <p class="task-desc project-desc dim-text">
        <?= htmlspecialchars($projectDesc) ?>
    </p>
    <div class="task-card-footer">
        <div class="footer-item">
            <span class="iconify" data-icon="lucide:list"></span>
            <span>Contains <?= $taskCount ?> task(s)</span>
        </div>
    </div>
</div>
