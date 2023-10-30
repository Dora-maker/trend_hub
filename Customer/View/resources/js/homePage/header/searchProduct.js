$(document).ready(function () {
    $('input[name="search"]').keydown(function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            $('form').submit();
        }
    });
});