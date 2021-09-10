<?php $render('header'); ?>
<header>
    <h1>Clientes da empresa</h1>
    <span>Logado como: <strong class="log"><?=$name;?></strong></span>
</header>

<main>
    <section class="clientes">
        <?php 
            if (isset($_SESSION['success'])) {
                echo $_SESSION['success'];
                $_SESSION['success'] = '';
            }

            if (isset($_SESSION['alert'])) {
                echo $_SESSION['alert'];
                $_SESSION['alert'] = '';
            }

        ?>
        <table class="tab-clientes">
            <thead>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>PROFISSÃO</th>
                <th>DATA-NASCIMENTO</th>
                <th>SEXO</th>
                <th>PESO</th>
                <th>NACIONALIDADE</th>
                <?php if($logado): ?>
                    <th colspan="2">Ações</th>
                <?php endif; ?>    
            </thead>

            <tbody>
                <?php foreach($dados as $dado): ?>
                    <tr class="rows-table">
                        <td><?=$dado['id'];?></td>
                        <td><?=$dado['nome'];?></td>
                        <td><?=$dado['email'];?></td>
                        <td><?=$dado['prof'];?></td>
                        <td><?=$dado['nascimento'];?></td>
                        <td><?=$dado['sexo'];?></td>
                        <td><?=$dado['peso'];?></td>
                        <td><?=$dado['nacionalidade'];?></td>
                        <?php if($logado): ?>
                            <td><a href="<?=$base;?>/editar/<?=$dado['id'];?>"><img class="img-editar" title="Editar" width="25px" src="<?=$base;?>/assets/images/document.png" alt="editar"></a></td>
                            <td><a href="<?=$base;?>/excluir/<?=$dado['id'];?>" onclick="return confirm('tem certeza que deseja excluir este cliente?')"><img class="img-excluir" title="Excluir" width="25px" src="<?=$base;?>/assets/images/trash.png" alt="editar"></a></td>
                        <?php endif; ?>    
                    </tr>
                <?php endforeach; ?>    
            </tbody>
        </table>
        <a class="linkNovoCliente" href="<?=$base;?>/novo">Adicionar novo cliente</a>
    </section>

    <section class="cinema">
        <h1>Filmes em cartaz</h1>
        <div class="firmes-atual">
            <?php foreach($dadosCinemaJson as $data): ?>
                <div class="firmes">
                    <h3><?=$data['titulo']?></h3>
                    <img src="<?=$data['avatar']?>" alt=""> 
                </div>   
            <?php endforeach; ?>                       
        </div>
           
    </section>
</main>


<?php $render('footer'); ?>