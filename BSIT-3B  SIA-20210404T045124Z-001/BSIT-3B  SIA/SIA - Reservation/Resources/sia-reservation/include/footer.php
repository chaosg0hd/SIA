
<section id="footer-sec" >
             
            <div class="container">
           <div class="row  pad-bottom" >
            <div class="col-md-4">
                <h4> <strong>ABOUT COMPANY</strong> </h4>
                            <p>
                                Sweet Captel Policies and Other Information
                            </p>
                <a href="#" >read more</a>
                </div>
               <div class="col-md-4">
                    <h4> <strong>SOCIAL LINKS</strong> </h4>
                   <p>
                     <a href="#"><i class="fa fa-facebook-square fa-3x"  ></i></a>  
                        <a href="#"><i class="fa fa-twitter-square fa-3x"  ></i></a>  
                        <a href="#"><i class="fa fa-linkedin-square fa-3x"  ></i></a>  
                       <a href="#"><i class="fa fa-google-plus-square fa-3x"  ></i></a>  
                   </p>
                </div>
               <div class="col-md-4">
                   <h4> <strong>OUR LOCATION</strong> </h4>
                            <p>
                              <?php $location = $con->query("select * from tblprofile order by id desc")->fetch_object();?>
                                <?php echo $location->address; ?><br />
                                <?php echo $location->contact; ?>
                            </p>

                </div>
               </div>
            </div>
    </section>         
    <!--/.FOOTER END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/jquery-ui.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/plugins/bootstrap.js"></script>
  <!-- CUSTOM SCRIPTS  -->
	
