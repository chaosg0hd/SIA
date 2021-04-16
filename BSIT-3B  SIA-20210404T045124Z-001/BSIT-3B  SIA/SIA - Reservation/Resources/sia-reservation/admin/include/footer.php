            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->
    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="scripts/jgrowl/jquery.jgrowl.min.js"></script>
<script>
setInterval(function(){
    $.ajax({    
        url: 'model/model_count.php', 
        type: 'POST',
        data: { count:'reservation'},
        success: function(dataJim) {    
            $('.count_reservation').html(dataJim);
        }
     }); 
    
    $.ajax({    
        url: 'model/model_count.php', 
        type: 'POST',
        data: { count:'billing'},
        success: function(dataJim) {    
            $('.count_billing').html(dataJim);
        }
     }); 
    $.ajax({    
        url: 'model/model_count.php', 
        type: 'POST',
        data: { count:'customer'},
        success: function(dataJim) {    
            console.log(dataJim);
            $('.count_customer').html(dataJim);
        }
     }); 
},1000); 
</script>
    

