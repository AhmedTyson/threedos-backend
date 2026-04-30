<?php
require "config/auth.php";
$user_id = $_SESSION['user_id'];

$is_edit = false;
$project_data = [
    'Name' => '',
    'Description' => ''
];
$form_action = 'actions/create-project.php';
$form_title = 'Launch New Project';
$form_subtitle = 'Start a new collaboration space for your team.';
$form_btn = 'Launch Project';
$project_id = '';

if (isset($_GET['id'])) {
    $project_id = $_GET['id'];
    $stmt = $connection->prepare("SELECT * FROM project WHERE ProjectID = :id AND UserID = :user_id");
    $stmt->execute([':id' => $project_id, ':user_id' => $user_id]);
    $project = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($project) {
        $is_edit = true;
        $project_data = $project;
        $form_action = 'actions/edit-project.php';
        $form_title = 'Edit Project';
        $form_subtitle = 'Update your project workspace details.';
        $form_btn = 'Save Changes';
    }
}

include 'includes/layout.php';
?>

<main class="main-content">
    <div class="form-container">
        <header class="animate-fade header-margin form-header">
            <a href="dashboard.php" class="back-link">
                <span class="iconify" data-icon="lucide:arrow-left"></span> Back to Dashboard
            </a>
            <h1><?php echo htmlspecialchars($form_title); ?></h1>
            <p class="page-subtitle"><?php echo htmlspecialchars($form_subtitle); ?></p>
        </header>

        <section class="glass animate-fade delay-1 form-card">
            <?php if (isset($_GET['status'])): ?>
                <?php if ($_GET['status'] === 'error'): ?>
                    <div class="form-error"><span class="iconify" data-icon="lucide:alert-circle"></span> An error occurred creating the project.</div>
                <?php elseif ($_GET['status'] === 'empty'): ?>
                    <div class="form-error"><span class="iconify" data-icon="lucide:alert-circle"></span> Please provide a project name.</div>
                <?php endif; ?>
            <?php endif; ?>

            <form action="<?php echo $form_action; ?>" method="POST" id="project-form">
                <?php if ($is_edit): ?>
                    <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
                <?php endif; ?>
                <div class="form-group">
                    <label class="form-label">Project Name</label>
                    <input type="text" name="project_name" class="form-input" placeholder="e.g. Marketing Q4 Strategy" value="<?php echo htmlspecialchars($project_data['Name']); ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Project Tagline</label>
                    <input type="text" name="tagline" class="form-input" placeholder="A short description..." value="<?php echo htmlspecialchars($project_data['Description'] ?? ''); ?>">
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-primary full-width-btn">
                        <span class="iconify" data-icon="lucide:rocket"></span>
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
