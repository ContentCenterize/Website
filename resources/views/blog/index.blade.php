<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" media = 'screen and (max-width: 768px)' href="./CSS/mobile.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Staatliches&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <script src="https://kit.fontawesome.com/85a5fdd30e.js" async></script>

    <title>NewsGrid | Your News Website</title>
</head>
<body>
<nav id="main-nav">
    <div class="container">
        <img src="img/logo.png" alt="NewsMedia" class="logo">
        <div class = 'social'>
            <a href="http://facebook.com.br" target = 'blank'><i class="fab fa-facebook fa-2x"></i></a>
            <a href="http://twitter.com.br" target = 'blank'><i class="fab fa-twitter fa-2x"></i></a>
            <a href="http://instagram.com.br" target = 'blank'><i class="fab fa-instagram fa-2x"></i></a>
            <a href="http://youtube.com.br" target = 'blank'><i class="fab fa-youtube fa-2x"></i></a>
        </div>
        <ul>
            <li><a href="index.html" class="current">Home</a></li>
            <li><a href="about.html" >About</a></li>
        </ul>
    </div>
</nav>

<header id = 'showcase'>
    <div class="container">
        <div class="showcase-container">
            <div class="showcase-content">
                <div class="category category-sports">
                    Sports
                </div>
                <h1>Sports Article</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste deserunt, at laborum accusamus veniam reprehenderit deleniti reiciendis vel animi ipsum obcaecati ex nesciunt ipsa, voluptatibus provident, quas doloribus molestias. Saepe.</p>
                <a href="article.html" class="btn btn-primary">Read More</a>
            </div>
        </div>
    </div>
</header>

<section id="home-articles" class="py-2">
    <div class="container">
        <h2>Editors Picks</h2>
        <div class="articles-container">
            <article class="card">
                <img src="img/articles/ent1.jpg" alt="photo">
                <div>
                    <div class="category category-ent">
                        Entertainment
                    </div>
                    <h3>
                        <a href="article.html">Lorem ipsum dolor sit amet.</a>
                    </h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, facere harum dicta dolor molestias amet eos! Doloribus molestiae cum accusamus?</p>
                </div>
            </article>

            <article class="card bg-dark">
                <div class="category category-sports">
                    Sports
                </div>
                <h3>
                    <a href="article.html">Lorem ipsum dolor sit amet.</a>
                </h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium numquam illum ipsa corporis nemo beatae odio exercitationem vel, sit porro?</p>
            </article>

            <article class="card">
                <img src="img/articles/tech1.jpg" alt="photo">
                <div class="category category-tech">
                    Technology
                </div>
                <h3>
                    <a href="article.html">Lorem ipsum dolor sit amet.</a>
                </h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum expedita quam quibusdam ipsum nemo maiores. Cum ipsa amet quaerat sunt.</p>
            </article>

            <article class="card">
                <div class="category category-sports">
                    Sports
                </div>
                <h3>
                    <a href="article.html">Lorem ipsum dolor sit amet.</a>
                </h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum expedita quam quibusdam ipsum nemo maiores. Cum ipsa amet quaerat sunt.</p>
                <img src="img/articles/sports1.jpg" alt="photo">
            </article>

            <article class="card">
                <img src="img/articles/tech2.jpg" alt="photo">
                <div class="category category-tech">
                    Technology
                </div>
                <h3>
                    <a href="article.html">Lorem ipsum dolor sit amet.</a>
                </h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum expedita quam quibusdam ipsum nemo maiores. Cum ipsa amet quaerat sunt.</p>
            </article>

            <article class="card bg-primary">
                <div class="category category-sports">
                    Sports
                </div>
                <h3>
                    <a href="article.html">Lorem ipsum dolor sit amet.</a>
                </h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium numquam illum ipsa corporis nemo beatae odio exercitationem vel, sit porro?</p>
            </article>

            <article class="card">
                <div>
                    <div class="category category-ent">
                        Entertainment
                    </div>
                    <h3>
                        <a href="article.html">Lorem ipsum dolor sit amet.</a>
                    </h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, facere harum dicta dolor molestias amet eos! Doloribus molestiae cum accusamus?</p>
                </div>
                <img src="img/articles/ent2.jpg" alt="photo">
            </article>
        </div>
    </div>
</section>

<footer id = 'main-footer' class = 'py-2'>
    <div class="container footer-container">
        <div>
            <img src="img/logo_light.png" alt="logo">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium quod ratione veniam sit harum excepturi sed quos dignissimos maxime consequatur.</p>
        </div>
        <div>
            <h3>Email Newsletter</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <form>
                <input type="email" placeholder="Email:" required>
                <input type="submit" value="Subscribe" class = 'btn btn-primary'>
            </form>
        </div>
        <div>
            <h3>Site Links</h3>
            <ul class = 'list'>
                <li><a href="#">Help and Support</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div>
            <h2>Join our Club</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, provident.</p>
            <a href="#" class="btn btn-secondary">Join Now</a>
        </div>
        <div>
            <p>
                Copyright NewsGrid &copy; 2019, All Rights reserved.
            </p>
        </div>
    </div>
</footer>
</body>
</html>
