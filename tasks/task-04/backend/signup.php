<?php
require "config/connection.php";
include 'includes/layout.php';
?>

<div class="signup-wrapper">
    <div class="signup-card glass animate-fade">
        <div class="signup-header">
            <img src="assets/logo.png" width="70" alt="Organizo">
            <h1>Create Account</h1>
            <p>Join Organizo and start managing your productivity.</p>
        </div>

        <?php if (isset($_GET['status'])): ?>
            <?php if ($_GET['status'] === 'mismatch'): ?>
                <div class="form-error"><span class="iconify" data-icon="lucide:alert-circle"></span> Passwords do not match.</div>
            <?php elseif ($_GET['status'] === 'empty'): ?>
                <div class="form-error"><span class="iconify" data-icon="lucide:alert-circle"></span> Please fill all fields.</div>
            <?php elseif ($_GET['status'] === 'db_error'): ?>
                <div class="form-error"><span class="iconify" data-icon="lucide:alert-circle"></span> Database error. Please try again.</div>
            <?php endif; ?>
        <?php endif; ?>

        <form id="signup-form" action="actions/signup.php" method="POST">
            <div class="form-group">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-input" placeholder="Ahmed_Tyson" required>
            </div>
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-input" placeholder="ahmed@organizo.dev" required>
            </div>
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-input" placeholder="••••••••" required>
            </div>
            <div class="form-group">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-input" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn-primary submit-btn-auth">
                <span class="iconify" data-icon="lucide:user-plus"></span>
                Get Started
            </button>
        </form>
        <div class="login-link">
            Already have an account? <a href="login.php">Sign in</a>
        </div>
    </div>
</div>

<?php 
$isFooter = true;
include 'includes/layout.php'; 
?>