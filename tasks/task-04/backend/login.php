<?php
require "config/connection.php";
include 'includes/layout.php';
?>

<div class="signup-wrapper">
    <div class="signup-card glass animate-fade">
        <div class="signup-header">
            <img src="assets/logo.png" width="70" alt="Organizo">
            <h1>Welcome Back</h1>
            <p>Log in to access your projects and tasks.</p>
        </div>
        
        <?php if (isset($_GET['status'])): ?>
            <?php if ($_GET['status'] === 'error'): ?>
                <div class="form-error"><span class="iconify" data-icon="lucide:alert-circle"></span> Invalid email or password.</div>
            <?php elseif ($_GET['status'] === 'empty'): ?>
                <div class="form-error"><span class="iconify" data-icon="lucide:alert-circle"></span> Please fill all fields.</div>
            <?php endif; ?>
        <?php endif; ?>

        <form id="login-form" action="actions/login.php" method="POST">
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-input" placeholder="ahmed@organizo.dev" required>
            </div>
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-input" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn-primary submit-btn-auth">
                <span class="iconify" data-icon="lucide:log-in"></span>
                Login
            </button>
        </form>
        <div class="login-link">
            Don't have an account? <a href="signup.php">Sign up</a>
        </div>
    </div>
</div>

<?php 
$isFooter = true;
include 'includes/layout.php'; 
?>
