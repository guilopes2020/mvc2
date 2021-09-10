<?php $render('header'); ?>
<header>
    <h1>Editando Cliente <strong style="color: blue;"><?= $cliente['nome']; ?></strong></h1>
</header>

<main>
    <section>
        <form method="POST" action="<?=$base;?>/editar/<?= $cliente['id']; ?>">
            <?php 
                if (isset($_SESSION['alert'])) {
                    echo $_SESSION['alert'];
                    $_SESSION['alert'] = '';
                }
            ?>
            <input type="hidden" name="id" value=<?=$cliente['id'];?>>
            <input type="hidden" name="emailExists" value=<?=$cliente['email'];?>>
            <label>
                Nome: *<br>
                <input type="text" name="nome" placeholder="seu nome" value=<?= $cliente['nome']; ?>>
            </label>
            <br><br>

            <label>
                E-mail: *<br>
                <input type="email" name="email" placeholder="seu e-mail" value=<?= $cliente['email']; ?>>
            </label>
            <br><br>

            <label>
                Profissão:<br>
                <input type="text" name="prof" placeholder="sua profissão" value=<?= $cliente['prof']; ?>>
            </label>
            <br><br>

            <label>
                Data de nascimento:<br>
                <input type="text" name="nascimento" placeholder="sua data de nascimento" value=<?= $cliente['nascimento']; ?>>
            </label>
            <br><br>

            <label>
                Sexo: *<br>
                <?php if($cliente['sexo'] === 'M'): ?>
                    <input class="sex" type="radio" name="sexo" value="M" checked>Homem<br>
                    <input class="sex" type="radio" name="sexo" value="F">Mulher
                    <?php else: ?>
                        <input class="sex" type="radio" name="sexo" value="M">Homem<br>
                        <input class="sex" type="radio" name="sexo" value="F" checked>Mulher
                <?php endif; ?>
            </label>
            <br><br>

            <label>
                Peso:<br>
                <input type="text" name="peso" placeholder="seu peso" value=<?= $cliente['peso']; ?>>
            </label>
            <br><br>

            <label>
                Altura:<br>
                <input type="text" name="altura" placeholder="sua altura" value=<?= $cliente['altura']; ?>>
            </label>
            <br><br>
            
            <label>
                Nacionalidade:<br>
                <input type="text" name="nacionalidade" placeholder="sua nacionalidade" value=<?= $cliente['nacionalidade']; ?>>
            </label>
            <br><br>

            <label>
                Curso: *<br>
                <input type="number" name="cursopreferido" placeholder="seu curso preferido" value=<?= $cliente['cursopreferido']; ?>>
            </label>
            <br><br>

            <button>Salvar</button>
        
        </form>
    </section>
</main>


<?php $render('footer'); ?>