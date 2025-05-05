    <body>      
        <div id="top-bar" class="container">
            <div class="row">
                <div class="span4">
                   
                </div>
                <div class="span8">
                    <div class="account pull-right">
                        <ul class="user-menu">                              
							<?php if($this->session->userdata('online')==false):?>
	                            <li><a href="<?php echo base_url() ?>cart">Keranjang Anda</a></li>
								<li><a href="<?php echo base_url() ?>login">Login</a></li> 
	                        <?php else:?>
								<!-- <li><a href="#">My Account</a></li> -->
	                            <li><a href="<?php echo base_url() ?>cart">Keranjang</a></li>
	                            <li><a href="<?php echo base_url() ?>pesanan">Pesanan Anda</a></li>
	                            <li><a href="<?php echo base_url() ?>checkout">Checkout</a></li>   	                        	
	                        	<li><a href="<?php echo base_url() ?>login/logout">Logout</a></li> 
	                        <?php endif;?>                            

                        </ul>
                    </div>
                </div>
            </div>
        </div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="<?php echo base_url() ?>home" class="logo pull-left"><img src="<?= base_url('templates/member/') ?>themes/images/logo.png" class="site_logo" alt="" width="220" height="80"></a>
					<nav id="menu" class="pull-right">
						<ul>
							<li><a href="<?php echo base_url() ?>home">Home</a></li>			
							<li><a href="<?php echo base_url() ?>barang">Barang</a></li>			
							<!-- <li><a href="./produks.html">Woman</a>					
								<ul>
									<li><a href="./produks.html">Lacinia nibh</a></li>									
									<li><a href="./produks.html">Eget molestie</a></li>
									<li><a href="./produks.html">Varius purus</a></li>									
								</ul>
							</li>																		
							<li><a href="./produks.html">Sport</a>
								<ul>									
									<li><a href="./produks.html">Gifts and Tech</a></li>
									<li><a href="./produks.html">Ties and Hats</a></li>
									<li><a href="./produks.html">Cold Weather</a></li>
								</ul>
							</li>							
							<li><a href="./produks.html">Hangbag</a></li> -->
							<!-- <li><a href="#">Best Seller</a></li>
							<li><a href="#">Top Seller</a></li> -->
						</ul>
					</nav>
				</div>
			</section>