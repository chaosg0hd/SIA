<style> 

#nav-topbar{
    width: 100%;
    height: 12vh;   
    padding: 0px !important;
}
#div-topbar{
    width: 100%;
    height: 100%; 
    border-radius: 50px 0px 0px 50px;
    background: var(--color_secondary);
    background-image: linear-gradient(to top right, rgba(173, 110, 81, .5), rgb(173, 156, 81, .5));
    padding: 0px !important;
    display: flex;
}
#div-navbar-left{
    border-style: none;
    width: 10%;
    height: 100%;  
    flex: 10%;;
}
#div-navbar-right{
    border-style: none;
    width: 70%;
    height: 100%;
    flex: 70%;  
}

#div-topbar-row-1{
    border-style: none;
    height: 50%;
    width: 100%;
    margin-left: auto;
    margin-right: 0;    
    display: flex
}
#div-topbar-row-2{  
    border-style: none;
    border-radius: 50px 0px 0px 0px;
    height: 50%;
    width: 100%;        
    background: var(--color_primary);
    background-image: linear-gradient(to right, rgba(173, 110, 81, .9), rgb(173, 156, 81, .5));
    margin-left: auto;
    margin-right: 0;
}
#div-logobox{
    border-style: none;
    width: 50%;
    height: 100%;    
    background-image: url(./assets/logo.png);
    background-position: center center;
	background-repeat: no-repeat;
	background-size: 95% auto;	
}
#div-topbar-title{
    border-style: none;
    height: 100%;  
    width: 50%;
    padding: 10px 10px;
    flex: 60%; 
    color: var(--white) !important;    
    font-size: 20px;    
    font-family: 'Montserrat', sans-serif;
    text-decoration: none;
    white-space: normal;
    word-wrap: break-word;
}
#div-topbar-text{
    border-style: none; 
    height: 100%;  
    width: 50%;
    padding: 10px 100px;
    flex: 40%; 
    display: flex; 
    justify-content: flex-end;    
    color: var(--white) !important;    
    font-size: 18px;    
    text-decoration: none;
    white-space: normal;
    word-wrap: break-word;    
}
#div-topbar-btn-box{
    border-style: none; 
    height: 100%;  
	display: flex;
    justify-content: flex-end;
    padding: 0px;
}
.btn-topbar{   
    border-style: none;     
    border-radius: 0;
    height: 100%;  
    width: 100%;      
    background: var(--black) !important;
    opacity: 0.7;
	font-size: 12px;    
}
.btn-topbar:hover{       
    border-radius: 0;
    color: var(--black) !important;
    background-color: var(--white) !important;
    border-style: none;
	font-size: 16px;    
}
.btn-topbar-active,.btn-topbar-active:hover,.btn-topbar-active:active{   
    height: 150%;  
    width: 100%;   
    color: var(--white) !important;
    background-color: var(--black) !important;
    clip-path: polygon(100% 0, 100% 85%, 50% 100%, 0 85%, 0% 0%);
    border-style: none;
	font-size: 20px;    
    z-index: 5;
}
#btn-nav{
    background: var(--red) !important;
    opacity: 0.7;
}
#btn-nav:hover{   
    border-style: none; 
    border-radius: 0;
    height: 100%;  
    width: 100%;    
    color: var(--white) !important;    
    background: var(--red) !important;
    flex: 10%;
    border-style: none;
	font-size: 20px;    
}

#user-image{    
    border-radius: 20px;
    height: 40px;  
    width: 40px;    
}
#icon-log-out:hover{
    color: var(--red) !important;
}

</style>    

<nav id ="nav-topbar" >
    <div id ="div-topbar" class ="container-fluid">
        <div id ="div-navbar-left">
            <div id ="div-logobox">
            </div>
        </div>

        <div id ="div-navbar-right">
            <div id ="div-topbar-row-1">            
                <div id="div-topbar-title">            
                    CocoLime Restaurant Management System
                </div>

                <div id="div-topbar-text">  
                    
                    <!-- Loads user_image -->

                    <?php $image = $_SESSION['Image_']?>

                    <img id ="user-image" src="./assets/user_image/<?php echo $image;?>"/>

                    <!-- Loads user_name -->

                    <p>&nbsp;  | <?php echo $_SESSION['Name_']; ?> |  &nbsp;</p>    
                        
                    <a id ="icon-log-out" href="./login.php"><i class="fas fa-sign-out-alt fa-lg"></i></a>
                    
                </div>
            </div>
      
            <div id ="div-topbar-row-2">
                <div id ="div-topbar-btn-box">
                    <?php if($_SESSION['Access_'] == 6 or $_SESSION['Access_'] == 0): ?>
                        <a href="./index.php?sys=PMS&page=home"><button type="button" id ="btn-topbar-PMS" class ="btn-topbar">Payroll Management</button></a>
                    <?php endif; ?>                    
                    
                    <?php if($_SESSION['Access_'] == 0): ?>
                        <a href="./index.php?sys=admin&page=home"><button type="button" id ="btn-nav" class ="btn-topbar btn-primary">Admin Tools</button></a> 
                    <?php endif; ?>

                </div>
            </div>
        </div>        
    </div>
</nav>

<!-- 

Script to toggle if button is active on click 

<script>

$('.btn-topbar').click(function() {
    $(this).toggleClass('btn-topbar');
    $(this).toggleClass('btn-topbar-active');
});

$('.btn-topbar-active').click(function() {
    $(this).toggleClass('btn-topbar-active');
    $(this).toggleClass('btn-topbar');
});

</script>

-->


<script>

    
</script>