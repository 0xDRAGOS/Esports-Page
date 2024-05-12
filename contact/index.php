<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hydra Esports</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="../site-structure/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include "../site-structure/header.php" ?>

    <div class="content">
        <div class="container">
            <h1>CONTACT US</h1>
        </div>

        <div class="contact">
            <div class="contact-container">
                <div class="box">
                    <div class="icon">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>Strada Alexandru Ioan Cuza 13, Craiova 200585</p>
                    </div>
                </div>

                <div class="box">
                    <div class="icon">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>0251 414 398</p>
                    </div>
                </div>

                <div class="box">
                    <div class="icon">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>icst@central.ucv.ro</p>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <?php if(isset($_SESSION['success']) && $_SESSION['success']): ?>
                    <div class="confirmation-message">
                         <h2>Your message has been sent successfully!</h2>   
                        </div>
                        <?php unset($_SESSION['success']); ?>
                <?php else: ?>
                    <form action="process-contact.php" method="POST">
                        <h2>Send Message</h2>
                        <div class="fullname">
                        <div>
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" name="firstName">
                        </div>
                        
                        <div>
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="lastName">
                        </div>
                    </div>
                    
                    <div class="email">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email">
                    </div>

                    <div class="message">
                        <label for="message">Type your message...</label>
                        <input type="text" id="message" name="message">
                    </div>

                    <div class="send-button">
                        <button>Send</button>
                    </div>

                    </form>
                <?php endif; ?>
        </div>
        </div> 
    </div>

    <?php include "../site-structure/footer.html" ?>
</body>
</html>