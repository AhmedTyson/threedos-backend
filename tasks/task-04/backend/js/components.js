function initCustomSelects() {
    const selects = document.querySelectorAll('select.form-input');

    selects.forEach(nativeSelect => {
        const container = document.createElement('div');
        container.className = 'custom-select-container';

        const trigger = document.createElement('div');
        trigger.className = 'select-trigger';
        setTriggerContent(trigger, nativeSelect.options[nativeSelect.selectedIndex]);

        const menu = document.createElement('div');
        menu.className = 'custom-select-options glass';

        Array.from(nativeSelect.options).forEach((opt, idx) => {
            const item = document.createElement('div');
            item.className = 'custom-option';
            if (idx === nativeSelect.selectedIndex) item.classList.add('selected');

            setOptionContent(item, opt);

            item.addEventListener('click', () => {
                nativeSelect.value = opt.value;
                setTriggerContent(trigger, opt);
                menu.querySelectorAll('.custom-option').forEach(o => o.classList.remove('selected'));
                item.classList.add('selected');
                closeAllSelects();
                nativeSelect.dispatchEvent(new Event('change'));
            });

            menu.appendChild(item);
        });

        trigger.addEventListener('click', (e) => {
            e.stopPropagation();
            const isOpen = container.classList.contains('open');
            closeAllSelects();
            if (!isOpen) {
                container.classList.add('open');
            }
        });

        container.appendChild(trigger);
        container.appendChild(menu);
        nativeSelect.style.display = 'none';
        nativeSelect.parentNode.insertBefore(container, nativeSelect);
    });

    document.addEventListener('click', closeAllSelects);
}

function closeAllSelects() {
    document.querySelectorAll('.custom-select-container.open').forEach(c => {
        c.classList.remove('open');
    });
}

function isPriorityValue(val) {
    return ['high', 'medium', 'low'].includes(val.toLowerCase());
}

function setTriggerContent(trigger, option) {
    const val = option.value.toLowerCase();
    if (isPriorityValue(val)) {
        trigger.innerHTML = `<span class="priority-dot ${val}"></span>${option.text}`;
    } else {
        trigger.textContent = option.text;
    }
}

function setOptionContent(item, option) {
    const val = option.value.toLowerCase();
    if (isPriorityValue(val)) {
        item.innerHTML = `<span class="priority-dot ${val}"></span>${option.text}`;
    } else {
        item.textContent = option.text;
    }
}
