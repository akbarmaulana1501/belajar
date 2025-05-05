
            <section id="footer-bar">
                <div class="row">
                    <div class="span6">
                       
                    </div>
                    <div class="span6">
                        <p class="logo"><img src="<?= base_url('templates/member/') ?>themes/images/logo.png" class="site_logo" alt=""></p>
                        <?php 
                        $this->db->where('id_company', 1);
                        $company = $this->db->get('_company', 1)->row_array(); ?>
                        <p>Alamat : <?= $company['alamat'] ?> Kel. <?= $company['kel'] ?> Kec. <?= $company['kec'] ?> Kota <?= $company['kab_kota'] ?> <br> Prov. <?= $company['prov'] ?> - Telp. <?= $company['no_telp'] ?> E-mail. <?= $company['email_company'] ?> Website. <?= $company['website'] ?></p>
                        <br/>
                        <span class="social_icons">
                            <a class="facebook" href="#">Facebook</a>
                            <a class="twitter" href="#">Twitter</a>
                            <a class="skype" href="#">Skype</a>
                            <a class="vimeo" href="#">Vimeo</a>
                        </span>
                    </div>                  
                </div>  
            </section>
            <section id="copyright">
                <span>Copyright <?= date('Y') ?> <?= $company['nama_company'] ?></span>
            </section>
        </div>
        <script src="<?= base_url('templates/member/') ?>themes/js/common.js"></script>
        <script src="<?= base_url('templates/member/') ?>themes/js/jquery.flexslider-min.js"></script>
        <?php if ($this->uri->segment(2)=='detail'): ?>
        <script type="text/javascript">
            $(function () {
                $('#myTab a:first').tab('show');
                $('#myTab a').click(function (e) {
                    e.preventDefault();
                    $(this).tab('show');
                })
            })
            $(document).ready(function() {
                $('.thumbnail').fancybox({
                    openEffect  : 'none',
                    closeEffect : 'none'
                });
                
                $('#myCarousel-2').carousel({
                    interval: 2500
                });                             
            });
        </script>   
        <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
            }, 8000);
        </script>   
        <?php else: ?>
        <script type="text/javascript">
            $(function() {
                $(document).ready(function() {
                    $('.flexslider').flexslider({
                        animation: "fade",
                        slideshowSpeed: 4000,
                        animationSpeed: 600,
                        controlNav: false,
                        directionNav: true,
                        controlsContainer: ".flex-container" // the container that holds the flexslider
                    });
                });
            });
          
        </script>        
        <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
            }, 8000);
        </script>    
        <?php endif ?>
    </body>
</html>