document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const logo = document.getElementById('logo');

    logo.addEventListener('click', function (event) {
        event.stopPropagation();
        sidebar.classList.toggle('Open');
    });

    document.addEventListener('click', function (event) {
        if (!sidebar.contains(event.target) && event.target !== logo) {
            sidebar.classList.remove('Open');
        }
    });
});
