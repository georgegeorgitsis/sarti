<div class="srt-header-wrapper">
<header class="srt-header srt-container">
    <div class="srt-header-top">
        <div class="srt-header-top-logo">
            <img src="https://rooms.sarti.gr/shared-assets/logo.png" alt="Sarti Logo" class="srt-header-top-logo-img">
        </div>
        <div class="srt-header-top-social">
            <div class="srt-social srt-round">
                <a href="#" class="facebook icon ion-social-facebook"></a>
            </div>
            <div class="srt-social srt-round">
                <a href="#" class="twitter icon ion-social-twitter"></a>
            </div>
            <div class="srt-social srt-round">
                <a href="#" class="google icon ion-social-googleplus-outline"></a>
            </div>
        </div>
    </div>
    <div class="srt-header-bottom">
        <nav class="srt-header-bottom-nav">
            <ul class="srt-header-nav">
                <li class="srt-nav-item">
                    <a href="#" class="active">    
                        Home
                    </a>
                </li>
                <li class="srt-nav-item">
                    <a href="#">
                        Accomodation
                    </a>
                </li>
                <li class="srt-nav-item">
                    <a href="#">
                        Excursions
                    </a>
                </li>
                <li class="srt-nav-item">
                    <a href="#">
                        Transfers
                    </a>
                </li>
                <li class="srt-nav-item">
                    <a href="#">
                        Travel Guide
                    </a>
                </li>
                <li class="srt-nav-item">
                    <a href="#">
                        Contact
                    </a>
                </li>
                <li class="srt-nav-item">
                    <a href="#">
                        About Us
                    </a>
                </li>
            </ul>
        </nav>
        <div class="srt-nav-langs">
            <div class="srt-dropdown">
                <a href="#" class="srt-dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                    <img class="flag-icon" src="<?= base_url('assets/uploads/langs/us-01.png') ?>" alt="English"> 
                    English
                    <div class="srt-caret">&#8250;</div>
                </a>
                <ul class="srt-dropdown-menu">
                    <li>
                        <a href="#">
                            <img class="flag-icon" src="<?= base_url('assets/uploads/langs/us-01.png') ?>" alt="English">
                            English                                
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img class="flag-icon" src="<?= base_url('assets/uploads/langs/gr-01.png') ?>" alt="Greek">
                            Greek                                
                        </a>
                    </li>
                </ul>
            </div> 
        </div>
    </div>
</header>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        [].forEach.call(document.querySelectorAll('.srt-dropdown-toggle'), function(el) {
            el.addEventListener('click', function() {
                el.parentNode.classList.toggle('open');
            });
        });
    });
</script>