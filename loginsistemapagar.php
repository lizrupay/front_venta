
    <?php	include 'sesion_actualiza.php';	?>


                    
    <a href="index.php" class="logo" style="margin-left: 50px;"> <img src="images\logo.png" style="width:250px"></a>
        

    <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
        <!-- Search -->
        <!--
        <div class="header_search">
            <form action="#" id="header_search_form">
                <input type="text" class="search_input" placeholder="Search Item" required="required">
                <button class="header_search_button"><img src="images/search.png" alt=""></button>
            </form>
        </div>
		-->	   
   
        <!-- User -->
                

        <?php


                
            // echo "datos : ".$gg_pp_codigo_usuario." nombre : ".$gg_pp_nombreapellido_usuario." perfil :".$gg_pp_nombreperfil;

            if ($gg_pp_codigo_usuario == "")
            {
            ?>
                <div class="user" style="margin-left: 100px; width: 50px;" >
                    <a href="login.php"><img src="images/user.jpg" style="width:50px">
                    </a>	
                </div>
                
                <div>
                    <button class="btn btn-primary" style="margin-left: 15px;">
                        <a href="login.php" style="color:  #FFFFFF;">Ingresar / Registrarse</a>
                    </button>
                </div>
            <?php
            }
            else
            {
            ?>

                <div class="usuario-navegacion__nombre" style="width=200px; height:30px">
                    <p class="usuario-navegacion__nombre--usuario" style="align:right"><?php echo $gg_pp_nombreapellido_usuario; ?></p>
                </div>

                <div class="user" style="margin-left: 100px; width: 50px;" >
                    <a href=""><img src="images/user.jpg" style="width:50px">
                    </a>	
                </div>

            <input 
                type="hidden" 
                class="" 
                name="gg_codigo_usuario" 
                id="gg_codigo_usuario" 
                value="<?php echo $gg_pp_codigo_usuario; ?>" 
                placeholder=""
                readonly
                />

            <?php
            }
            ?>


        <!-- Cart -->
        
        <!-- <div> <div class="cart"><a href="carritocompra.php"><div><img src="images/cart.svg" class="svg" alt=""></div></a>10</div></div> -->
    
    </div>

