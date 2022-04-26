<script>
    $(document).ready(function(){
        $.ajax({
            url: "{{ url('admin/orders_list') }}",
            type: "POST",
            data: {"_token": "{{ csrf_token() }}"},
            success:function(res){
                $(".list_orders").html(res);
                $('#dataTable').DataTable({ 
                    "destroy": true, //use for reinitialize datatable
                });
            }
        });
    });
</script>