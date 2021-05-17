<?php
    session_start();
    if(!isset($_SESSION['Access_'])){
        header('location:login.php');
    }
 ?>	
 <!DOCTYPE html>
<html>

<?php include 'header.php'; ?>

<style>
#container {
    height: 100vh;
}
#top-div {
    height: 30vh;    
    display: flex;
    align-items: center;
    background: url(./assets/logo.png);
    background-position: center center;
    background-repeat: no-repeat;
    background-size: 50% auto;		
}
#ribbon {    
    background: var(--color_secondary);    
    background-image: linear-gradient(to right, rgba(173, 110, 81, .5), rgb(173, 156, 81, .5)); 
    padding: 20px 20px;
	display: flex;
}
.btn {
    height: 18%;
    width: 20%;
    min-height: 140px;
    min-width: 140px;
    border-style: dotted;  
    border-color: var(--white);
    border-width: 1px;
    border-radius: 10px;
    margin: 5px 5px;  
    position: relative;  
    background: var(--white) !important;        
    display: inline-flex;
    align-items: flex-end; 
    color: var(--color_primary);
    font-size: 20px;    
    text-decoration: none;
    white-space: normal;
    word-wrap: break-word;       
    transition-duration: 0.4s;    
}
.btn:hover {    
    border-style: dotted;    
    border-width: 1px;
    border-radius: 12px !important;    
    width: 24%;
    background: var(--color_secondary) !important;      
    color: var(--white);
}
#button-CMS{     
    background-image: url( './assets/customer.png' ) !important;    
    background-size: 50px 50px !important;  
    background-position: left 5px top 5px !important;
    background-repeat: no-repeat !important;    
}
#button-CMS:hover{      
    background-size: 100px 100px !important; 
}
#button-POS{     
    background-image: url( './assets/point-of-sale.png' ) !important;    
    background-size: 50px 50px !important;  
    background-position: left 5px top 5px !important;
    background-repeat: no-repeat !important;    
}
#button-POS:hover{         
    background-size: 100px 100px !important;  
}
#button-MMS{     
    background-image: url( './assets/menu.png' ) !important;    
    background-size: 50px 50px !important;  
    background-position: left 5px top 5px!important;
    background-repeat: no-repeat !important;    
}
#button-MMS:hover{     
    background-size: 100px 100px !important;  
}
#button-IMS{     
    background-image: url( './assets/shipping.png' ) !important;    
    background-size: 50px 50px !important;  
    background-position: left 5px top 5px!important;
    background-repeat: no-repeat !important;    
}
#button-IMS:hover{     
    background-size: 100px 100px !important;  
}
#button-DTR{     
    background-image: url( './assets/calendar.png' ) !important;    
    background-size: 50px 50px !important;  
    background-position: left 5px top 5px!important;
    background-repeat: no-repeat !important;    
}
#button-DTR:hover{     
    background-size: 100px 100px !important;  
}
#button-PMS{     
    background-image: url( './assets/salary.png' ) !important;    
    background-size: 50px 50px !important;  
    background-position: left 5px top 5px!important;
    background-repeat: no-repeat !important;    
}
#button-PMS:hover{     
    background-size: 100px 100px !important;  
}
#button-MAR{     
    background-image: url( './assets/megaphone.png' ) !important;    
    background-size: 50px 50px !important;  
    background-position: left 5px top 5px!important;
    background-repeat: no-repeat !important;    
}
#button-MAR:hover{     
    background-size: 100px 100px !important;  
}
#button-FMS{     
    background-image: url( './assets/money.png' ) !important;    
    background-size: 50px 50px !important;  
    background-position: left 5px top 5px!important;
    background-repeat: no-repeat !important;    
}
#button-FMS:hover{     
    background-size: 100px 100px !important;  
}
#button-adm{         
    color: var(--white) !important;
    background: var(--red) !important;  
    align-items: center; 
    clip-path: polygon(100% 100%, 50% 70%, 0 100%, 0 30%, 50% 0, 100% 30%);
}
#button-adm:hover{     
    background-size: 100px 100px !important;  
}
</style>

<body>

<!-- To check if user has access to certain subsystem, This is ugly, it could be better implemented -->

<div id ="container">
    <div id ="top-div">
    </div>
    <div id ="ribbon">
        <center>
            <?php if($_SESSION['Access_'] == 1 or $_SESSION['Access_'] == 0): ?>		
                <a href="./index.php?sys=CMS&page=home"><button id ="button-CMS" class ="btn">Customer Management</button></a>
            <?php endif; ?>
            <?php if($_SESSION['Access_'] == 2 or $_SESSION['Access_'] == 0): ?>
                <a href="./index.php?sys=POS&page=home"><button id ="button-POS" class ="btn">Point of Sale</button></a>
            <?php endif; ?>
            <?php if($_SESSION['Access_'] == 3 or $_SESSION['Access_'] == 0): ?>
                <a href="./index.php?sys=MMS&page=home"><button id ="button-MMS" class ="btn">Menu Management</button></a>
            <?php endif; ?>
            <?php if($_SESSION['Access_'] == 4 or $_SESSION['Access_'] == 0): ?>
                <a href="./index.php?sys=IMS&page=home"><button id ="button-IMS" class ="btn">Inventory Management</button></a>
            <?php endif; ?>
            <?php if($_SESSION['Access_'] == 5 or $_SESSION['Access_'] == 0): ?>
                <a href="./index.php?sys=DTR&page=home"><button id ="button-DTR" class ="btn">Daily Time Record Management</button></a>
            <?php endif; ?>
            <?php if($_SESSION['Access_'] == 6 or $_SESSION['Access_'] == 0): ?>
                <a href="./index.php?sys=PMS&page=home"><button id ="button-PMS" class ="btn">Payroll Management</button></a>
            <?php endif; ?>
            <?php if($_SESSION['Access_'] == 7 or $_SESSION['Access_'] == 0): ?>
                <a href="./index.php?sys=MAR&page=home"><button id ="button-MAR" class ="btn">Marketing Management</button></a>
            <?php endif; ?>
            <?php if($_SESSION['Access_'] == 8 or $_SESSION['Access_'] == 0): ?>
                <a href="./index.php?sys=FMS&page=home"><button id ="button-FMS" class ="btn">Finance Management System</button></a>
            <?php endif; ?>
            <?php if($_SESSION['Access_'] == 0): ?>		
                <a href="./index.php?sys=admin&page=home"><button id ="button-adm" class ="btn">Administrator Tools</button></a>
            <?php endif; ?>
        </center>
    </div>
</div>

</body>
<script>
</script>

<!-- Script to show session data -->

<script> console.log("<?php echo $_SESSION['Access_']; ?>") </script>

</html>
