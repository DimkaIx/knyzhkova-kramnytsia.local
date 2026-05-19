document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.js-delete-link').forEach(function (link) {
        link.addEventListener('click', function (event) {
            if (!confirm('Видалити цей запис?')) {
                event.preventDefault();
            }
        });
    });
});
