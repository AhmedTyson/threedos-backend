<?php
require "config/auth.php";
$user_id = $_SESSION['user_id'];

$projQuery = "SELECT ProjectID, Name FROM project WHERE UserID = :user_id ORDER BY Name ASC";
$projStmt = $connection->prepare($projQuery);
$projStmt->execute([':user_id' => $user_id]);
$userProjects = $projStmt->fetchAll(PDO::FETCH_ASSOC);

$is_edit = false;
$task_data = [
    'Name' => '',
    'Description' => '',
    'ProjectID' => '',
    'PriorityID' => 2,
    'StatusID' => 1,
    'StartDate' => '',
    'EndDate' => ''
];
$form_action = 'actions/create-task.php';
$form_title = 'Create New Task';
$form_subtitle = 'Define a new task and link it to an existing project.';
$form_btn = 'Create Task';
$task_id = '';

if (isset($_GET['id'])) {
    $task_id = $_GET['id'];
    $stmt = $connection->prepare("SELECT task.* FROM task JOIN project ON task.ProjectID = project.ProjectID WHERE task.TaskID = :id AND project.UserID = :user_id");
    $stmt->execute([':id' => $task_id, ':user_id' => $user_id]);
    $task = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($task) {
        $is_edit = true;
        $task_data = $task;
        $form_action = 'actions/edit-task.php';
        $form_title = 'Edit Task';
        $form_subtitle = 'Update the details for this task.';
        $form_btn = 'Save Changes';
    }
}

include 'includes/layout.php';
?>

<main class="main-content">
    <div class="form-container">
        <header class="animate-fade header-margin form-header-wide">
            <a href="dashboard.php" class="back-link">
                <span class="iconify" data-icon="lucide:arrow-left"></span> Back to Dashboard
            </a>
            <h1><?php echo htmlspecialchars($form_title); ?></h1>
            <p class="page-subtitle"><?php echo htmlspecialchars($form_subtitle); ?></p>
        </header>

        <section class="glass animate-fade delay-1 form-card-wide">
            <?php if (isset($_GET['status'])): ?>
                <?php if ($_GET['status'] === 'error'): ?>
                    <div class="form-error"><span class="iconify" data-icon="lucide:alert-circle"></span> An error occurred creating the task.</div>
                <?php elseif ($_GET['status'] === 'empty'): ?>
                    <div class="form-error"><span class="iconify" data-icon="lucide:alert-circle"></span> Please fill all required fields.</div>
                <?php endif; ?>
            <?php endif; ?>

            <form action="<?php echo $form_action; ?>" method="POST" id="task-form">
                <?php if ($is_edit): ?>
                    <input type="hidden" name="task_id" value="<?php echo $task_id; ?>">
                <?php endif; ?>
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label class="form-label">Task Name</label>
                        <input type="text" name="task_name" class="form-input" placeholder="e.g. Implement user authentication" value="<?php echo htmlspecialchars($task_data['Name']); ?>" required>
                    </div>
                    <div class="form-group full-width">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-input" placeholder="Provide details about the task..."><?php echo htmlspecialchars($task_data['Description']); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Target Project</label>
                        <select name="project_id" class="form-input">
                            <option value="">Select a project...</option>
                            <?php foreach ($userProjects as $proj): ?>
                                <option value="<?php echo $proj['ProjectID']; ?>" <?php echo ($task_data['ProjectID'] == $proj['ProjectID']) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($proj['Name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Priority</label>
                        <select name="priority" class="form-input">
                            <option value="high" <?php echo ($task_data['PriorityID'] == 1) ? 'selected' : ''; ?>>High Priority</option>
                            <option value="medium" <?php echo ($task_data['PriorityID'] == 2) ? 'selected' : ''; ?>>Medium Priority</option>
                            <option value="low" <?php echo ($task_data['PriorityID'] == 3) ? 'selected' : ''; ?>>Low Priority</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select name="status_id" class="form-input">
                            <option value="1" <?php echo ($task_data['StatusID'] == 1) ? 'selected' : ''; ?>>To Do</option>
                            <option value="2" <?php echo ($task_data['StatusID'] == 2) ? 'selected' : ''; ?>>In Progress</option>
                            <option value="3" <?php echo ($task_data['StatusID'] == 3) ? 'selected' : ''; ?>>Done</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-input" value="<?php echo $task_data['StartDate']; ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">End Date</label>
                        <input type="date" name="end_date" class="form-input" value="<?php echo $task_data['EndDate']; ?>">
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-primary">
                        <span class="iconify" data-icon="lucide:check"></span>
                        <?php echo htmlspecialchars($form_btn); ?>
                    </button>
                </div>
            </form>
        </section>
    </div>
</main>

<?php 
$isFooter = true;
include 'includes/layout.php'; 
?>
