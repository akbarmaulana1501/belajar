			<?php $query = $this->db->get_where('_company', array('id_company' => 1))->row_array(); ?>
			<?php if ($this->uri->segment(2)=='detail'): ?>
				<section class="header_text sub">
					<img class="pageBanner" src="<?= base_url('templates/member/') ?>themes/images/pageBanner.png" alt="New products" >
					<h4><span>ProduK Detail</span></h4>
				</section>
			<?php else: ?>
				<section  class="homepage-slider" id="home-slider">
					<div class="flexslider">
						<ul class="slides">
							<li>
								<img src="<?= base_url('templates/member/') ?>themes/images/carousel/banner-1.jpg" alt="" />
							</li>
							<li>
								<img src="<?= base_url('templates/member/') ?>themes/images/carousel/banner-2.jpg" alt="" />
								<div class="intro">
									<h1>Menyediakan Barang-barang Kualitas Premium</h1>
									<p><span>Harga Murah Meriah</span></p>
								</div>
							</li>
						</ul>
					</div>			
				</section>
				<section class="header_text">
					<?= strtoupper("<b><h3>Selamat Datang di website resmi ".$query['nama_company']."  </h3>Silahkan pilih barang-barang kebutuhan anda. </b>") ?>
				</section>
			<?php endif ?>