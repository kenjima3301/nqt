
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.data-table').dataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "dom": 'T<"clear">lfrtip',
            "sPaginationType": "full_numbers",
            'aoColumnDefs': [{
                'bSortable': false,
                'searchable': false,
                'aTargets': ['no-search'],
                'bTargets': ['no-sort']
            }]
        });

        $('.table').DataTable({
            "searching": false, 
            "info"  : false,
            "lengthChange": false,
        });
        $(el).dataTable({
  language: {
    'paginate': {
      'previous': '<span class="prev-icon"></span>',
      'next': '<span class="next-icon"></span>'
    }
  }
});
    });
    
</script>
