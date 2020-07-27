@extends('layouts.branch-layout')
@section('title','Branch | Orders')
@section('branch-content')
  <x-branch.orders :orders="$orders" />
@endsection
@section('branch-script')
<script>
        $(document).ready(function () { 
            $.ajaxSetup(
                {
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                }
                });
            let selectedBranch = $("select#branch").children("option:selected").val();
            if(selectedBranch > 0){
                $.get(`/laundry/branch/${selectedBranch}/services`,function (data) {
                    $.each(data, function () { 
                        $("select#service").append(`<option value='${this.name}'> ${this.name}</option>`);
                    });        
                });
            }
    
            $('select.status-upadate').change(function () { 
                var order = $(this).data('order');
                var csrf = $(this).data('csrf')
                var statusValue = $(this).val();
                console.log(statusValue)
                $.post({
                    method :'POST',
                    url : `/laundry/branch/order/${order.id}/update/status/${statusValue}`,
                    success: location.reload(true)
                });
                
            });

            $('#plus').click(function () { 
                let kilo = parseInt($('#kilo').val()) 
                if(kilo <= 6){
                    $('#kilo').val(kilo + 1);
                }else{
                    toastr["warning"]("Maximum is only up to 7 kilo");
                }  
            });

             $('#minus').click(function () { 
                let kilo = parseInt($('#kilo').val()) 
                if(kilo > 1){
                    $('#kilo').val(kilo - 1);
                } 
            });


        });
   </script>
@endsection


