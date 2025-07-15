<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('table').each(function() {
        // Only apply DataTable if table has thead and tbody
        if($(this).find('thead').length && $(this).find('tbody').length) {
            $(this).DataTable();
        }
    });
});
</script>
