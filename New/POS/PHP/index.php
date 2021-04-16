
<html>
    <head>
        <style>
            *{
                box-sizing: border-box;
                margin: 0;
            }
            body{
                font-family: arial,sans-serif;
                color: #202124;
            }
            header{
                float: left;
                width: 100%;
                color: white;
                background-color: #869760;
                padding:25px;
                height: calc(10%);
            }
            nav{
                float: left;
                width: 15%;
                padding: 10px;
                height: calc(90%);
            }
            nav a{
                float: left;
                width: 100%;
                font-size: .875rem;
                padding: 15px;  
                border-radius: 10px;
                font-weight: bold;
            }
            nav a:hover{
                color: white;
                background-color: #99AD6E;
            }
            table{
                width: 100%;
                border-collapse: collapse;
            }
            
            th, td{
                width: 100%;
                padding: 15px;
                border-bottom: solid 1px;
            }
            button{
                width: 100px;
                padding: 5px 20px 5px 20px; 
                border: none;
                background-color: #f8f5f1; 
            }
            button:hover{
                background-color: #d8e3e7;
            }
            .div-order{
                float: left;
                width: 80%;
                padding: 20px;
                border-radius: 20px;
            }
            .div-order-left{
                float: left;
                width: 60%;
                padding: 20px;
                border-radius: 25px;
            }
            .div-order-right{
                float: right;
                width: 40%;
                padding: 20px;
            }
            .order-food{
                float: left;
                width: 100%;
                text-align: justify;
                padding: 25px;
                background-color: #bfcba8;
                margin-bottom: 5px;
            }
            .menu-food{
                float: left;
                width: 100%;
                padding: 15px;
                background: #f8f5f1; 
                margin-bottom: 5px;
                border-radius: 10px;
            }
            .menu-food:hover{
                background-color: #d8e3e7;
            }
            .search{
                font-size: 15px;
                border-radius: 20px;
                padding: 10px;
                outline: none;
                border: none;
                margin-bottom: 10px;
                background-color: #f1f3f4;
            }
            .button-delete{
                color: red;  
                background-color: transparent;
            }
            .button-add{
                background-color: transparent;
                float: right;
                outline: none;
            }
        </style>
    </head>
        <header>Point Of Sales</header>
        <nav>
            <a><i class="fas fa-shopping-cart"></i> &nbsp Sales</a>
            <a><i class="fas fa-history"></i> &nbsp Transactions</a>
            <a href="../../landing.php"><i class="fas fa-sign-out-alt"></i> &nbsp Logout</a>
            <button type="button" onclick="totalfunction()">Total</button>
        </nav>
        <div class="div-order">
            <div class="div-order-left">
                <h1><i class="fas fa-cart-plus"></i> Orders</h1>
                <br>
                <hr>
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tbody id='orders'>
                    </tbody>
                </table>
                <h1 id='total'></h1>
            </div>
            <div class="div-order-right">
                <h1><i class="fas fa-utensils"></i> Menu</h1>
                <br>
                <hr>
                <br>
                <i class="fas fa-search"></i>&nbsp<input type="text" placeholder="Search" class="search">
                <br>
                <br>
                <?php
                $dbServerName = "localhost";
                $dbUserName = "root";
                $dbPassword = "";
                $dbName = "db_sia";
                $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
                 $sql = "SELECT * FROM tbl_products WHERE 1";
                $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                        echo "<div class='menu-food'>";
                        echo $row['prd_name'];
                        $row = json_encode($row);
                        echo "<button class='button-add' onclick='add($row)'> <i class='fas fa-plus'></i> </button>";
                        echo "</div>";
                        }
                    }
                    else
                    {
                    echo "no data";
                    }
                ?>
            </div>
        </div>
        <script src="https://kit.fontawesome.com/c4442c2032.js" crossorigin="anonymous"></script>
        <script src='../js/jquery-3.6.0.js'></script>
        <script>
        
            var orders = [];
            var data;
            var quantity = 1;

            function add(data){
                var str_html='';
                data = data;
                console.log(data);
                orders.push(data);
                console.log(orders);
                for(var i=0;i<orders.length; i++){
                    str_html+='<tr>';
                    str_html+='<td>'+orders[i].prd_name+'</td>';
                    str_html+='<td>'+orders[i].prd_price+'</td>';
                    str_html+='<td><button class="button-delete" onclick="remove()"><i class="fas fa-trash"></i></button></td>';
                    str_html+='</tr>';        
                }
                $('#orders').html(str_html);
            } 
            function remove(){
                orders.pop();
                console.log(orders);
            }
        </script>
</html>