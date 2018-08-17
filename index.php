<?php



require_once "php/vendor/autoload.php";

if(isset($_POST['name'])){

    $mail = new PHPMailer;

    $name = filter_var($_POST['name']);
    $company = filter_var($_POST['company']);
    $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    $num = filter_var($_POST['num']);
    if(isset($_POST['text'])) {
        
        $text = filter_var($_POST['text']);
    }


    //$mail->SMTPDebug = 4;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.nic.ru';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'send@anchor-vr.nichost.ru';                 // SMTP username
    $mail->Password = 'BlueSky777';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('anchor-vr.com', 'anchor');
    $mail->addAddress('anastasia.yushkova@gmail.com', 'Получатель');     // Add a recipient 
    $mail->addReplyTo('robot@mail.ru', 'Robot');
    $mail->addCC('info@anchor-vr.com',"info");

    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);                                  // Set email format to HTML

    if(!isset($_POST['text'])) {
        if($_GET['bro']=="360") {
            $mail->Body    = "<h1>Order a Brochure(360)</h1>";
        }
        else {
            $mail->Body    = "<h1>Order a Brochure(vr)</h1>";
        }
    }
    else{
        $mail->Body    = "<h1>Contact us</h1>";
    }

    $mail->Subject .= 'Письмо с сайта';
    $mail->Body    .= "<div>от: $name</div>";
    $mail->Body    .= "<div>e-mail: $email</div>";
    $mail->Body    .= "<div>company: $company</div>";
    $mail->Body    .= "<div>number: $num</div>";
    $mail->AltBody = $name;


    if(isset($_POST['text'])) {
        $mail->Body    .= "<div>text: $text</div>";
    }
    

    if($mail->send()){
        $res['sendstatus'] = 'done';
    
        //Edit your message here
        $res['message'] = 'Form Submission Successful';
    }
    else{
        $res['message'] = "Failed to send mail. Please mail me to rusartdub@gmail.com<br>"  . $mail->ErrorInfo;
    }

    ?>
        <script type="text/javascript">
            console.log(<?php echo json_encode($res); ?>);
            //alert(1);
        </script>

    <?php
    

}






?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109606372-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-109606372-1');
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ANCHOR-VR</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/reset.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/main.css">
   <link rel="stylesheet" href="css/media.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   
</head>

<body>
    
    <header id="home">
        <nav class="black_row navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <nav id="menu">
                    <ul class="nav nva navbar-nav">
                        
                        <li><a href="#home">HOME</a></li>
                        <li><a href="#intruduction">OUR VISION</a></li>
                        <li><a href="#services">SERVICES</a></li>
                        <li><a href="#clients">OUR CLIENTS</a></li>
                        <li><a href="#who_we_are">WHO WE ARE</a></li>
                        <li><a href="#contact_us">CONTACT US</a></li>
                        <hr class="visible-xs-block">
                        <li class="visible-xs-block"><a href="mailto:info@anchor-vr.com">info@anchor-vr.com</a></li>
                        <li class="visible-xs-block"><a href="tel:+79036115607">+7 903 611 5607</a></li>
    
                    </ul>
                    <div class=" contacts">
                        <div class="row">
                            <div class="mail"><a href="mailto:info@anchor-vr.com">info@anchor-vr.com</a></div>
                        </div>
                        <div class="row">
                            <div class="phone"><a href="tel:+79036115607">+7 903 611 5607</a></div>
                        </div>
                    </div>
                    </nav>

                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        
        <div class="main container-fluid">
            <div class="row">
                <div class="parallax-window"  data-parallax="scroll" data-image-src="img/header_bg-min.png">
                    <div class="wow fadeIn logo_names">
                        <div class=" logo">ANCHOR-VR</div>
                        <div class="discriprion">Virtual and Augmented Reality Solutions for The Superyacht Industry</div>

                    </div>
                    <div class="facebook-container">
                        
                            <a target="_blank" href="https://www.facebook.com/anchorvr/"><img src="img/facebook.png" alt="facebook"></a>
                        
                    </div>
                    <div class="watermark-container">
                        
                            <div class="watermark">Sand People Communications</div>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="intruduction" class="intruduction">
        <div class="bg">
            <div class="wow fadeIn container">
                <div class="row">
                    <div class="intro_container col-md-offset-1 col-md-10">
                        <div class="intro">
                            <div class="row">
                                <div class="wow fadeIn head col-md-4 col-md-offset-4">OUR VISION</div>
                            </div>
                            <div class="row">
                                <div class="flex-container col-md-6 col-md-offset-3">
                                    <div class="black_row"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="body col-xs-offset-1 col-xs-10"><span>A Superyacht is a dream come true.</span><br>
                                    While dreaming of a yacht, one combines life experience
                                    <br><span>with a vision of the future.</span><br> It is not easy <span>to foresee times</span> to come.<br> Yet, there are people and technologies designed to <span>achieve that.</span><br> For ages, architects carefully listened to clients,
                                    <span>transforming dreams</span> into drawings.<br> Times have changed, and now architects possess
                                    <br><span>a powerful tool</span> to visualize their ideas.<br> Virtual and Augmented Reality technologies allow a client to be <span>immersed in the design</span>, imagine it better than on a computer screen and to believe in its <span>materialization.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="parallax-window" data-position-y="0px" data-parallax="scroll" data-image-src="img/fst_padding-min.png">
            <div class="watermark-container">
                        
                            <div class="watermark"> Sinot Exclusive Yacht Design</div>
                        
            </div>
        </div>
    </div>


    <div id="services" class="services">
        <div class="bg ">
            <div class="wow fadeIn container">
                <div class="row">
                    <div class="services_container col-md-offset-1 col-md-10">
                        <div class="services">
                            <div class="row">
                                <div class="wow fadeIn head col-md-4 col-md-offset-4">SERVICES</div>
                            </div>
                            <div class="row">
                                <div class="flex-container col-md-6 col-md-offset-3">
                                    <div class="black_row"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="fst col-md-5">
                                    <div class="row">
                                        <div class="flex_container">
                                            <div class="icon_border">
                                                <img src="img/vr.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 head">Virtual and Augmented Reality</div>
                                    </div>
                                    <div class="row">
                                        <div class="body">Far beyond its mere "Wow-Effect", VR/AR is a forceful, accessible, client-friendly business instrument, convenient for both seller and buyer, which visualizes a new yacht — inside and out — at the touch of a button. </div>
                                    </div>
                                </div>
                                <div class="snd col-md-offset-2 col-md-5">
                                    <div class="row">
                                        <div class="flex_container">
                                            <div class="icon_border">
                                                <img src="img/camera_logo-min.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 head">360 <br>VR Tour</div>
                                    </div>
                                    <div class="row">
                                        <div class="body">A series of 360&deg; panoramic scenes, taken above and below decks by a professional 360&deg; camera, which creates a seamless "virtual walkthrough" and immerses a client in yacht's environment, allowing to feel its magic. </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="parallax-window" data-position-y="0px" data-parallax="scroll" data-image-src="img/snd_padding.png">
            <div class="watermark-container">
                        
                            <div class="watermark">Sand People Communications</div>
                        
            </div>
        </div>
    </div>

    <div id="vr" class="vr">
        <div class="wow fadeIn container">
            <div class="row">
                <div class="vr_container col-md-offset-1 col-md-10">
                    <div class="vr">
                        <div class="row">
                            <div class="wow fadeIn head col-md-12">VIRTUAL AND AUGMENTED REALITY</div>
                        </div>
                        <div class="row">
                            <div class="flex-container col-md-6 col-md-offset-3">
                                <div class="black_row"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="body col-md-12">
                                Want to create a new client experience?
                                <br> Want to let your client visit his future yacht as soon as possible and show her to his friends?
                                <br> Want to save money on costly prototypes and outdated mock-ups?
                                <br> Virtual Reality is a great way to make this happen!
                                <br>
                            </div>
                        </div>
                        <div class="row">

                            <div class="broshure col-md-12">
                                
                                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                                <a href="#p_vr" class="popup-content"><button type="button" class="btn btn-primary">Order a Brochure</button></a>
                                

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="watermark-container">
                    
            <div class="watermark">Sinot Exclusive Yacht Design</div>
                    
        </div>

    </div>

    <div class="_360">
        <div class="wow fadeIn container">
            <div class="row">
                <div class="_360_container col-md-offset-1 col-md-10">
                    <div class="_360">
                        <div class="row">
                            <div class="wow fadeIn head col-md-12">360 VR TOUR</div>
                        </div>
                        <div class="row">
                            <div class="flex-container col-md-6 col-md-offset-3">
                                <div class="black_row"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="body col-md-12">
                                Need to sell a yacht?
                                <br> Need to attract more charter clients?
                                <br> Need to familiarize your crew with onboard systems?
                                <br> Try 360 VR Tour, the most powerful way to engage your client!
                                <br>
                            </div>
                        </div>
                        <div class="row">

                            <div class="broshure col-md-12">
                                
                                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                                 <a href="#p_360" class="popup-content"><button type="button" class="btn btn-primary">Order a Brochure</button></a>
                                

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="watermark-container">
                    
            <div class="bold-opacity watermark">Sand People Communications</div>
                    
        </div>
    </div>

    <div id="clients" class="clients">
        <div class="wow fadeIn container">
            <div class="row">
                <div class="clients_container col-md-12">
                    <div class="clients">
                        <div class="row">
                            <div class="wow fadeIn head col-md-4 col-md-offset-4">OUR CLIENTS</div>
                        </div>
                        <div class="row">
                            <div class="flex-container col-md-6 col-md-offset-3">
                                <div class="black_row"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="banner col-md-12">
                    <div class="row">
                        <div class="bg_container col-xs-6 col-md-4">
                            <div class="bg ph_1">
                                <div class="head_container">
                                    <div class="head">Knowledgeable <br><span>shipbuilders</span></div>
                                    <div class="watermark_container">
                                        <div class="watermark">Sand People Communications</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg_container col-xs-6 col-md-4">
                            <div class="bg ph_2">
                                <div class="head_container">
                                    <div class="head">Competitive <br><span>brokers</span></div>
                                    <div class=" big watermark_container">
                                        <div class="watermark">Sand People Communications</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg_container col-xs-6 col-md-4">
                            <div class="bg ph_3">
                                <div class="head_container">
                                    <div class="head">Inventive naval <br><span>architects</span></div>
                                    <div class="watermark_container">
                                        <div class="watermark">Espen Oeino International</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg_container col-xs-6 col-md-4">
                            <div class="bg ph_4">
                                <div class="head_container">
                                    <div class="head">Creative <br><span>designers</span></div>
                                    <div class="big watermark_container">
                                        <div class="bold-opacity watermark">Sinot Exclusive Yacht Design</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg_container col-xs-6 col-md-4">
                            <div class="bg ph_5">
                                <div class="head_container">
                                    <div class="head">Enduring project <br><span>managers</span></div>
                                    <div class="watermark_container">
                                        <div class="watermark">Sand People Communications</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg_container col-xs-6 col-md-4">
                            <div class="bg ph_6">
                                <div class="head_container">
                                    <div class="head">And finally, <br><span>wishful clients!</span></div>
                                    <div class="watermark_container">
                                        <div class="watermark">Sand People Communications</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="bg_grey">
        <div id="who_we_are" class="who_we_are">
            <div class="wow fadeIn container">
                <div class="row">
                    <div class="photo_container">
                        <div class="photo">
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="who_container col-md-offset-1 col-md-10">
                        <div class="who">
                            <div class="row">
                                <div class="wow fadeIn head col-md-4 col-md-offset-4">WHO WE ARE?</div>
                            </div>
                            <div class="row">
                                <div class="flex-container col-md-6 col-md-offset-3">
                                    <div class="black_row"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="body col-xs-offset-1 col-xs-10">
                                    CEO and Founder of ANCHOR-VR, <span>Anastasia Yushkova</span> started her career in&nbsp;<span>The&nbsp;Superyacht Industry</span> in&nbsp;2005, as Editor-in-Chief for&nbsp;<span>Boat International</span> magazine and
                                    <span>The&nbsp;Superyachts</span> book in&nbsp;the&nbsp;Russian market. From 2011 she steered the&nbsp;relaunch of
                                    <span>Yachting, Russia's Premier Marine Magazine</span>, leading its total digital transformation. <br><br> She did marketing communications consultancy for&nbsp;<span>Burgess</span> in&nbsp;Russia and translated the&nbsp;<span class="italic">Galactica Star</span> book for
                                    <span>Heesen Yachts</span> into Russian. After the&nbsp;2014 Winter Olympics in&nbsp;Sochi, she took part in&nbsp;strategy development for&nbsp;<span>The&nbsp;Sochi Marine Club</span> and new Sochi Grand Marina and built a national and international communications campaign for&nbsp;the&nbsp;first
                                    <span>SCF Black Sea Tall Ships Regatta</span>.<br><br> Anastasia holds an <span>MBA</span> in&nbsp;Marketing and Sales from
                                    <span>Vienna University of Economics and Business</span> and an MA in&nbsp;Journalism from Moscow State University. Beyond business, she extensively&nbsp;collaborates with media, covering superyacht industry news for&nbsp;<span>Vedomosti, a leading Russian daily business newspaper</span>.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="contact_us" class="wow fadeIn  contact_us">
            <div class="wow fadeIn container">
                <div class="row">
                    <div class="contact_container col-md-offset-1 col-md-10">
                        <div class="contact">
                            <div class="row">
                                <div class="wow fadeIn head col-md-4 col-md-offset-4">CONTACT US</div>
                            </div>
                            <div class="row">
                                <div class="flex-container col-md-6 col-md-offset-3">
                                    <div class="black_row"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="body col-md-offset-1 col-md-10">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="row">
                                                <div class="mail"><a href="mailto:info@anchor-vr.com">info@anchor-vr.com</a></div>
                                            </div>
                                            <div class="row">
                                                <div class="phone"><a href="tel:+79036115607">+7 903 611 5607</a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <form action="index.php" method="post">
                                                <div class="submit_container">
                                                    <input placeholder="Name" required type="text" name="name">
                                                </div>
                                                <div class="submit_container">
                                                    <input placeholder="Company" type="text" name="company">
                                                </div>
                                                <div class="submit_container">
                                                    <input placeholder="E-mail" required type="email" name="email">
                                                </div>
                                                <div class="submit_container">
                                                    <input placeholder="Phone Number" type="tel" name="num">
                                                </div>
                                                <div class="submit_container">
                                                    <input class="textarea" placeholder="Text" name="text" id="text">
                                                </div>
                                                <div class="submit_container">
                                                    <input Value="Send" class="submit" type="submit">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="black_row">
            <div class="facebook-container">
                        
                   <a target="_blank" href="https://www.facebook.com/anchorvr/"><img src="img/facebook_footer.png" alt="facebook"></a>
                   <div class="text">&copy <?php $a = getdate(); echo $a['year']; ?> «ANCHOR-VR»</div>
                        
            </div>
        </div>   
    </footer>
   
    <div id="p_vr" class="contact_us popup mfp-hide ">
        <div class="container">
            <div class="row">
                <div class="contact_container col-md-offset-1 col-md-10">
                    <div class="contact">
                        <div class="abs row">
                            <div class="head col-md-4 col-md-offset-4">Order a Brochure</div>
                            <button class=" mfp-close mybtn"  type="button" title="Закрыть (Esc)">×</button>
                        </div>
                        <div class="row">
                            <div class="flex-container col-md-6 col-md-offset-3">
                                <div class="black_row"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="body col-md-offset-1 col-md-10">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="mail"><a href="mailto:info@anchor-vr.com">info@anchor-vr.com</a></div>
                                        </div>
                                        <div class="row">
                                            <div class="phone"><a href="tel:+79036115607">+7 903 611 5607</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <form action="index.php?bro=vr" method="post">
                                            <div class="submit_container">
                                                <input placeholder="Name" required type="text" name="name">
                                            </div>
                                            <div class="submit_container">
                                                <input placeholder="Company" type="text" name="company">
                                            </div>
                                            <div class="submit_container">
                                                <input placeholder="E-mail" required type="email" name="email">
                                            </div>
                                            <div class="submit_container">
                                                <input placeholder="Phone Number" type="tel" name="num">
                                            </div>
                                            <div class="submit_container">
                                                <input Value="Order" class="submit" type="submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="p_360" class="contact_us popup mfp-hide ">
        <div class="container">
            <div class="row">
                <div class="contact_container col-md-offset-1 col-md-10">
                    <div class="contact">
                        <div class="abs row">
                            <div class="head col-md-4 col-md-offset-4">Order a Brochure</div>
                            <button class=" mfp-close mybtn"  type="button" title="Закрыть (Esc)">×</button>
                        </div>
                        <div class="row">
                            <div class="flex-container col-md-6 col-md-offset-3">
                                <div class="black_row"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="body col-md-offset-1 col-md-10">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="mail"><a href="mailto:info@anchor-vr.com">info@anchor-vr.com</a></div>
                                        </div>
                                        <div class="row">
                                            <div class="phone"><a href="tel:+79036115607">+7 903 611 5607</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <form action="index.php?bro=360" method="post">
                                            <div class="submit_container">
                                                <input placeholder="Name" required type="text" name="name">
                                            </div>
                                            <div class="submit_container">
                                                <input placeholder="Company" type="text" name="company">
                                            </div>
                                            <div class="submit_container">
                                                <input placeholder="E-mail" required type="email" name="email">
                                            </div>
                                            <div class="submit_container">
                                                <input placeholder="Phone Number" type="tel" name="num">
                                            </div>
                                            <div class="submit_container">
                                                <input Value="Order" class="submit" type="submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="cookie_disc">
        <div class="text">
            This website uses cookies. By using this website and continuing navigating, you accept these cookies.
            <a href="policy.php">Learn more.</a>
        </div>
        <div class="cookie_button">Accept</div>
    </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
    
    <!-- Magnific Popup core JS file -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script>
        $('.popup-content').magnificPopup({
          type:'inline',
          midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
        });
    </script>


    <script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#menu").on("click", "a", function(event) {
            event.preventDefault();
            var id = $(this).attr('href'),
                top = $(id).offset().top;
            $('body,html').animate({ scrollTop: top }, 1500);
        });
    });
    </script>
    <script src="js/cookie_disc.js"></script>
</body>

</html>