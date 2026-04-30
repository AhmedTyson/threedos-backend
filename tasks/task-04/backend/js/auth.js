document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');

    if (status) {
        switch (status) {
            case 'created':
                showToast('Account created successfully! Please login.', 'success');
                break;
            case 'project_created':
                showToast('Project created successfully!', 'success');
                break;
            case 'task_created':
                showToast('Task created successfully!', 'success');
                break;
            case 'task_archived':
                showToast('Task archived successfully!', 'success');
                break;
            case 'task_restored':
                showToast('Task restored successfully!', 'success');
                break;
            case 'task_deleted':
                showToast('Task deleted permanently!', 'success');
                break;
            case 'project_deleted':
                showToast('Project deleted permanently!', 'success');
                break;
        }
    }
});
