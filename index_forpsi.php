<!DOCTYPE html>
<html lang="cs">
<?php 
    session_start();
      
    include 'components/projects.php';
    include 'components/project_title.php';
    include 'components/about.php';
    include 'components/contact.php';
    include 'components/skills.php';

    $lang = 'cs';
    if(isset($_GET['lang'])){
        $lang = $_GET['lang'];
    }    
    $second_lang = $lang=='cs' ? 'en' : 'cs';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Miroslav Sikora">
    <meta name="description" content="Full Stack Developer Miroslav Sikora - Portfolio">
    <title>MirSikora | Portfolio</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">    
</head>

<body>

    <?php if(isset($_SESSION['flash'])): ?>
    <div class="flash">
        <?php echo $_SESSION['flash']; 
        session_unset();?>
    </div>
    <?php endif ?>
    <div class="container">
        <aside>
            <h1>Miroslav Sikora</h1>
            <h4>Full Stack developer | PHP | HTML | JavaScript | C# | Java</h4>
            <ul class="other-sites">
                <li><a href="https://github.com/MirSikora"><img src="images/icons/github.svg" alt="GitHub"></a></li>
                <li><a href="https://www.linkedin.com/in/mir-sikora/"><img src="images/icons/linkedin.svg" alt="LinkedIn"></a></li>
                <li><a href="/?lang=<?php echo $second_lang ?>"><img class="lang-icon" src="images/icons/<?php echo $second_lang; ?>.png" alt="<?php echo $second_lang; ?>"></a></li>
            </ul>
            <div class="menu">
                <li><a href="#projects"><?php echo strtoupper($project_title[$lang]['title'])?></a></li>
                <li><a href="#about"><?php echo strtoupper($about[$lang]['title'])?></a></li>
                <li><a href="#contact"><?php echo strtoupper($contact[$lang]['title']) ?></a></li>
            </div>
        </aside>
        <main>
            <section class="projects" id="projects">
                <?php foreach($projects[$lang] as $project): ?>
                    <article class="article-background article-project" onmouseover="imageFilterOff(<?php echo $project['id']; ?>)" onmouseout="imageFilterOn(<?php echo $project['id']; ?>)" >
                        <div class="project-info">
                            <h3 class="<?php echo $project['color']; ?>"><?php echo str_replace('|','&nbsp|&nbsp', chunk_split(strtoupper($project['programming_language']),1,'&nbsp')); ?></h3>
                            <h2><?php echo $project['name']; ?></h2>
                            <p><?php echo $project['description']; ?></p>
                            <div class="buttons">
                                <?php if($project['web_page']): ?>
                                    <a href="<?php echo $project['web_page']; ?>">
                                        <img src="images/icons/web.png" alt="">
                                        <span>Web</span>
                                    </a>
                                <?php endif ?>
                                <?php if($project['github_code']): ?>
                                    <a href="<?php echo $project['github_code']; ?>">
                                        <img src="images/icons/github.svg" alt="">
                                        <span>Github</span>
                                    </a>
                                <?php endif ?>
                            </div>
                        </div>
                        <img class="project-image" id="img-<?php echo $project['id']; ?>" src="<?php echo $project['image']; ?>" alt="<?php echo $project['name']; ?>">
                    </article>  
                <?php endforeach ?>
            </section>
            <section class="about" id="about">
                <article class="article-background">
                    <h2><?php echo strtoupper($about[$lang]['title'])?></h2>
                    <p><?php echo $about[$lang]['content']?></p>
                    <div class="skills">
                        <?php for($i = 0; $i < count($skills); $i++): ?>
                            <?php if($i==0 || $i%3==0 ) echo '<ul>' ?>
                                <li><img src="<?php echo $skills[$i]['icon']?>" alt="<?php echo $skills[$i]['name']?>"> <?php echo $skills[$i]['name']?></li>
                            <?php if(($i+1)%3==0) echo '</ul>' ?>
                        <?php endfor ?>
                        </div>
                </article>
            </section>
            <section class="contact" id="contact">
                <article class="article-background">
                    <h2><?php echo strtoupper($contact[$lang]['title']) ?></h2>
                    <p><?php echo $contact[$lang]['content']?></p>
                    <form action="components/send_email.php" onsubmit="return validate()" method="post">
                        <label for="email">EMAIL</label>
                        <p id="errorEmail" hidden></p>
                        <input type="email" name="email" id="email">                    
                        <label for="message"><?php echo strtoupper($contact[$lang]['message-label'])?></label>
                        <p id="errorMessage" hidden ></p>
                        <textarea name="message" id="message" cols="30" rows="10"></textarea>                    
                        <button type="submit" id="submit" ><?php echo strtoupper($contact[$lang]['submit-button'])?></button>
                    </form>
                </article>
            </section>
            <footer>
                MirSikora &copy 2024 <a href="https://github.com/MirSikora">&lt;Open Source Licence - GitHub&gt;</a>
            </footer>
        </main>    
    </div>       

    <script src="js/validation.js"></script>
    <script src="js/image-filter.js"></script>

</body>

</html>