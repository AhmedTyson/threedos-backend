<?php
if (!function_exists('getPageMetadata')) {
    function getPageMetadata() {
        $currentFile = basename($_SERVER['PHP_SELF']);
        
        $pages = [
            'dashboard.php'      => ['title' => 'Dashboard | Organizo', 'active' => 'dashboard', 'css' => '<link rel="stylesheet" href="css/dashboard.css">', 'js' => '', 'noSidebar' => false],
            'projects.php'       => ['title' => 'Projects | Organizo', 'active' => 'projects', 'css' => '<link rel="stylesheet" href="css/dashboard.css">', 'js' => '', 'noSidebar' => false],
            'archived.php'       => ['title' => 'Archive | Organizo', 'active' => 'archived', 'css' => '<link rel="stylesheet" href="css/dashboard.css"><link rel="stylesheet" href="css/archived.css">', 'js' => '', 'noSidebar' => false],
            'create-project.php' => ['title' => 'Create Project | Organizo', 'active' => 'create-project', 'css' => '', 'js' => '<script src="js/forms.js" defer></script>', 'noSidebar' => false],
            'create-task.php'    => ['title' => 'Create Task | Organizo', 'active' => 'create-task', 'css' => '', 'js' => '<script src="js/forms.js" defer></script>', 'noSidebar' => false],
            'login.php'          => ['title' => 'Login | Organizo', 'active' => '', 'css' => '<link rel="stylesheet" href="css/signup.css">', 'js' => '<script src="js/auth.js" defer></script>', 'noSidebar' => true],
            'signup.php'         => ['title' => 'Sign Up | Organizo', 'active' => '', 'css' => '<link rel="stylesheet" href="css/signup.css">', 'js' => '<script src="js/auth.js" defer></script>', 'noSidebar' => true],
        ];

        if (isset($pages[$currentFile])) {
            return $pages[$currentFile];
        }
        return ['title' => 'Organizo', 'active' => '', 'css' => '', 'js' => '', 'noSidebar' => false];
    }
}

$metadata = getPageMetadata();
if (!isset($pageTitle)) $pageTitle = $metadata['title'];
if (!isset($activePage)) $activePage = $metadata['active'];
if (!isset($extraCSS)) $extraCSS = $metadata['css'];
if (!isset($extraJS)) $extraJS = $metadata['js'];
if (!isset($noSidebar)) $noSidebar = $metadata['noSidebar'];

if (!isset($isFooter)) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/forms.css">
    <?php echo $extraCSS; ?>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <script src="js/components.js" defer></script>
    <script src="js/global.js" defer></script>
    <?php echo $extraJS; ?>
</head>
<body>
    <div class="app-container <?php echo $noSidebar ? 'no-sidebar' : ''; ?>">
        <?php if (!$noSidebar): ?>
        <aside class="sidebar glass">
            <div class="logo-area">
                <img src="assets/logo.png" width="80" alt="Organizo">
                <h2>ORGANIZO</h2>
            </div>
            <nav>
                <a href="dashboard.php" class="nav-link <?php echo ($activePage == 'dashboard') ? 'active' : ''; ?>">
                    <span class="iconify" data-icon="lucide:layout-dashboard"></span>
                    Dashboard
                </a>
                <a href="projects.php" class="nav-link <?php echo ($activePage == 'projects') ? 'active' : ''; ?>">
                    <span class="iconify" data-icon="lucide:folder-open"></span>
                    Projects
                </a>
                <a href="archived.php" class="nav-link <?php echo ($activePage == 'archived') ? 'active' : ''; ?>">
                    <span class="iconify" data-icon="lucide:archive"></span>
                    Archive
                </a>
            </nav>
        </aside>
        <?php endif; ?>
<?php
} else {
?>
    </div>
</body>
</html>
<?php
}
?>
