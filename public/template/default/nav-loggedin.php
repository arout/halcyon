<?php /** TOP NAV **/ ?>

<header id="topNav" class="topHead">
    <?php /** remove class="topHead" if no topHead used! **/ ?>
    <div class="container">
        <?php /** Mobile Menu Button **/ ?>
        <button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse"> <i class="fa fa-bars"></i> </button>
        <?php /** Logo text or image **/ ?>
        <a class="logo" href="<?= BASEURL; ?>"><img height="48px" class="animate_fade_in" src="<?= TEMPLATE_URL; ?>assets/images/logo/logo.png"></a>
        <?php /** Top Nav **/ ?>
        <div class="navbar-collapse nav-main-collapse collapse pull-right">
            <nav class="nav-main mega-menu">
                <ul class="nav nav-pills nav-main scroll-menu" id="topMain">
                    <li class="dropdown"><a class="dropdown-toggle" href="#"><i class="fa fa-file"></i> Documents</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= BASEURL; ?>assessments/wizard">Create New Assessment</a></li>
                            <li class="divider"></li>
                            <li><a href="<?= BASEURL; ?>assessments/resume">Resume Saved Assessment</a></li>
                            <li class="divider"></li>
                            <li><a href="<?= BASEURL; ?>assessments/archive">View Assessment Archive</a></li>
                            <li class="divider"></li>
                            <li><a href="<?= BASEURL; ?>assessments/cleanup">Delete Drafts</a></li>
                            <li class="divider"></li>
                            <li><a href="<?= BASEURL; ?>newsletter">Create New Newsletter</a></li>
                            <li class="divider"></li>
                            <li><a href="<?= BASEURL; ?>newsletter/archive">View Archive</a></li>
                            <li class="divider"></li>
                            <li><a href="<?= BASEURL; ?>newsletter/drafts">Edit Newsletter / Drafts</a></li>
                        </ul>
                    </li>
                    <?php /** GLOBAL SEARCH **/ ?>
                    <li class="search">
                        <?php /** search form **/ ?>
                        <form method="get" action="#" class="input-group pull-right">
                            <input type="text" class="form-control" name="k" id="k" value="" placeholder="Search">
                            <span class="input-group-btn">
                            <button class="btn btn-primary notransition"><i class="fa fa-search"></i></button>
                            </span>
                        </form>
                        <?php /** /search form **/ ?>
                    </li>
                    <?php /** /GLOBAL SEARCH **/ ?>
                    
                    <li class="messenger pull-right">
                        <?php // $data['unread_messages'] and $data['total_messages'] are set in header.php ?>
                        <span id="unread_messages_badge" class="badge pull-right <?php if( $data['count_messages'] >= 1) echo 'red'; ?>" />
                        <?= $data['count_messages']; ?>
                        </span>
                        <div class="row messenger-content">
                            <p class="text-center">
                                <i class="fa fa-warning"></i> You have <?= $data['count_messages']; ?> unread messages
                            </p>
                            
                            <?php foreach( $data['unread_messages'] as $mail ): ?>
                            <div class="row">
                                <div class="col-xs-6 col-md-3">
                                    <a href="<?= BASEURL; ?>member/view/<?= urlencode( $mail['sender'] ); ?>" />
                                        <img src="<?= USER_PICS_URL.$mail['username'].'/'; ?><?= $mail['pic']; ?>" class="img-responsive" alt="<?= $mail['sender']; ?>" />
                                    </a>
                                </div>
                                
                                <a onclick="update_unread_total( 'unread_messages_badge' )" href="<?= BASEURL; ?>messenger/view/<?= $mail['mid']; ?>" />
                                <div class="inline-block">
                                    <div class="col-md-5">
                                        <span class="title"><strong><?= $mail['subject']; ?></strong></span>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="price"><?= $this->toolbox('formatter')->datetime( $mail['date'] ); ?></span>
                                    </div>
                                </div>
                                </a>
                                <div class="clear"></div>
                            </div>
                            <?php endforeach; ?>
                            
                            <div class="row cart-footer">
                                <div class="col-xs-6 nopadding-right">
                                    <a href="<?= BASEURL; ?>messenger/unread" class="btn btn-primary btn-xs fullwidth">VIEW UNREAD</a>
                                </div>
                                <div class="col-xs-6 nopadding-left">
                                    <a href="<?= BASEURL; ?>messenger" class="btn btn-info btn-xs fullwidth">GO TO INBOX</a>
                                </div>
                            </div>
                       </div>
                        
                    </li>
                </ul>
            </nav>
        </div>
        <?php /** /Top Nav **/ ?>
    </div>
</header>
<span id="header_shadow"></span>
<?php /** /TOP NAV **/ ?>
