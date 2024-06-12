<section class="login">
    <img src="img/roue-de-voiture.png" alt="Logo d'UniConduite" class="logo"> 
    <h2><span>UniConduite,</span><br> suivez votre avancée dans la conduite accompagnée !</h2>
    <p>L'application UniConduite vous permet d'enregistrer vos expériences de conduite pour vous permettre un suivi de votre avancée. 
        Grâce à UniConduite, vous aurez la certitude d'avoir bien travaillé toutes les possibilités avant de passer l'examen de conduite !
    </p>
    <h2>Connectez vous</h2> 
    <form method="post" action="fonctions/login.php">
        <fieldset>
            <label for="mail">Votre adresse mail</label>
            <input name="mail" id="mail" type="text" placeholder="adresse@mail.com" required>
            <label for="mdp">Votre mot de passe</label>
            <input name="mdp" id="mdp" type="text" placeholder="votre mot de passe secret" required>
        </fieldset>
        <fieldset class="problemeUser">
            <a href="#">Créer un compte</a>
            <a href="#">Mot de passe oublié ?</a>
        </fieldset>
        <button type="submit" aria-label="Cliquez pour vous connecter !">Se connecter</button>
    </form>
</section>