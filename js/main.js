document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.js-delete-link').forEach(function (link) {
        link.addEventListener('click', function (event) {
            if (!confirm('Видалити цей запис?')) {
                event.preventDefault();
            }
        });
    });

    document.querySelectorAll('.js-delete-form').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!confirm('Видалити цей запис?')) {
                event.preventDefault();
            }
        });
    });
});
