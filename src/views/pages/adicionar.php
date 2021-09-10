<?php $render('header'); ?>
<header>
    <h1>Adicionar Clientes</h1>
</header>

<main>
    <section>
        <form method="POST" action="<?=$base;?>/novo">
            <?php 
                if (isset($_SESSION['alert'])) {
                    echo $_SESSION['alert'];
                    $_SESSION['alert'] = '';
                }
            ?>
            <label>
                Nome: *<br>
                <input type="text" name="nome" placeholder="seu nome">
            </label>
            <br><br>

            <label>
                E-mail: *<br>
                <input type="email" name="email" placeholder="seu e-mail">
            </label>
            <br><br>

            <label>
                Profissão:<br>
                <input type="text" name="prof" placeholder="sua profissão">
            </label>
            <br><br>

            <label>
                Data de nascimento:<br>
                <input type="text" name="nascimento" placeholder="sua data de nascimento">
            </label>
            <br><br>

            <label>
                Sexo: *<br>
                <input class="sex" type="radio" name="sexo" value="M">Homem<br>
                <input class="sex" type="radio" name="sexo" value="F">Mulher
            </label>
            <br><br>

            <label>
                Peso:<br>
                <input type="text" name="peso" placeholder="seu peso">
            </label>
            <br><br>

            <label>
                Altura:<br>
                <input type="text" name="altura" placeholder="sua altura">
            </label>
            <br><br>
            
            <label>
                Nacionalidade:<br>
                <input type="text" name="nacionalidade" placeholder="sua nacionalidade">
            </label>
            <br><br>

            <label>
                Curso: *<br>
                <input type="number" name="cursopreferido" placeholder="seu curso preferido">
            </label>
            <br><br>

            <button>Cadastrar</button>
        
        </form>
    </section>
</main>


<?php $render('footer'); ?>