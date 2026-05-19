document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-confirm]').forEach((form) => {
        form.addEventListener('submit', (event) => {
            if (!window.confirm(form.dataset.confirm)) {
                event.preventDefault();
            }
        });
    });

    document.querySelectorAll('.quantity-form input[name="quantity"]').forEach((input) => {
        input.addEventListener('change', () => {
            const min = Number(input.min || 1);
            const max = Number(input.max || 20);
            const value = Number(input.value || min);
            input.value = Math.min(Math.max(value, min), max);
        });
    });
});
