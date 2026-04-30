const toastContainer = document.createElement('div');
toastContainer.id = 'toast-container';
document.body.appendChild(toastContainer);

function showToast(message, type = 'info') {
    const toast = document.createElement('div');
    toast.className = `toast glass toast-${type}`;

    const icons = {
        success: 'lucide:check-circle-2',
        error:   'lucide:alert-circle',
        info:    'lucide:info'
    };

    toast.innerHTML = `
        <span class="iconify toast-icon toast-icon-${type}" data-icon="${icons[type] || icons.info}"></span>
        <span class="toast-message">${message}</span>
    `;

    toastContainer.appendChild(toast);

    setTimeout(() => {
        toast.classList.add('hiding');
        setTimeout(() => toast.remove(), 300);
    }, 4000);
}

document.addEventListener('DOMContentLoaded', () => {
    if (typeof initCustomSelects === 'function') {
        initCustomSelects();
    }

    const priorityFilter = document.getElementById('priority-filter');
    if (priorityFilter) {
        priorityFilter.addEventListener('change', () => {
            const filterValue = priorityFilter.value;
            filterTasks(filterValue);
            
            const newUrl = filterValue === 'all' ? 'dashboard.php' : `dashboard.php?priority=${filterValue}`;
            window.history.pushState({ priority: filterValue }, '', newUrl);
        });

        const urlParams = new URLSearchParams(window.location.search);
        const priorityParam = urlParams.get('priority');
        if (priorityParam) {
            priorityFilter.value = priorityParam;
            filterTasks(priorityParam);
        }
    }
});

function filterTasks(priority) {
    const cards = document.querySelectorAll('.task-card');
    cards.forEach(card => {
        if (priority === 'all' || card.getAttribute('data-priority') === priority) {
            card.style.display = 'flex';
            card.style.animation = 'none';
            card.offsetHeight;
            card.style.animation = '';
        } else {
            card.style.display = 'none';
        }
    });
}
