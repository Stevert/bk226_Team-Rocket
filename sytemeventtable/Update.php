<head>
<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
</head>
<div id="tableHolder"></div>
<script type="text/javascript">
    $(document).ready(function(){
      refreshTable();
    });

    function refreshTable(){
        $('#tableHolder').load('getTable.php', function(){
           setTimeout(refreshTable, 5000);
        });
    }
</script>