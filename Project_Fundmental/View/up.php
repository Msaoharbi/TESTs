
 <header>
             <br><br><br><br><br>
             <br><br><br><br><br>
             <br><br><br><br><br>
             <br><br><br><br><br>
              </header>
              
           <div class="bar">  
           <nav><hr>Menu<hr>
       <ul>
       <li><a href="index.php">Home</a></li>
       <li><a href="Movie.php">Movie's</a></li>
       <li><a href="AboutUs.php"> About Us </a></li>
       <li><a href="ContactUs.php"> Contact Us </a></li>
	   <?php
	    if(isset($_SESSION['login']))
       echo'<li><a href="AdminControlPanel.php"> Control Panel </a></li>';
   ?>
   			<?php
	    if(isset($_SESSION['login']))
          echo'   <a href="Logout.php"> <button class="b1"><hr> <span style="font-family: fantasy">Logout</span> <hr></button> </a>';
		?>
                 <?php
	    if(!isset($_SESSION['login']))
          echo'   <a href="login.php"> <button class="b1"><hr> <span style="font-family: fantasy">Log-in</span> <hr></button> </a>';
		?>
        
       </ul>
           </nav>
             
          

     
    
            </div> 
              
              
              
            <p class="hed1"> Disney website </p>