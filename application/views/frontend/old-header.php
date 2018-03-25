<header class="header-lrg">
            <div class="top_header container flex">
                <a href="<?= base_url() ?>" class="brand-container auto-mr">
                    <img src="https://rooms.sarti.gr/shared-assets/logo.png" alt="Rooms Sarti logo">
                </a>
            </div>
            <div class="bottom_header">
            <nav class="navbar navbar-flat">
                <div class="container no-padding">
                
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Accommodations</a></li>
                        <li><a href="#">Excursions</a></li>
                        <li><a href="#">Transfer</a></li>
                        <li><a href="#">Travel Guide</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">About Us</a></li>
                    </ul>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img class="flag-icon" src="<?= base_url('assets/uploads/langs/').$lang_png ?>" alt="<?= $language_name ?>"> 
                            <?= $language_name ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach($all_langs as $lang){ ?>
                            <li>
                                <a href="#">
                                    <img class="flag-icon" src="<?= base_url('assets/uploads/langs/').$lang['lang_icon'] ?>" alt="<?= $lang['lang_name'] ?>">
                                    <?=$lang['lang_name']?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                        </li>
                    </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            </div>
        </header>