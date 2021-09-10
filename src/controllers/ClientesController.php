<?php

namespace src\controllers;

use \core\Controller;
use \src\models\Cliente;

class ClientesController extends Controller {
    
    public function add() {
        $this->render('adicionar');
    }

    public function addAction() {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $prof = filter_input(INPUT_POST, 'prof', FILTER_SANITIZE_SPECIAL_CHARS);
        $nascimento = filter_input(INPUT_POST, 'nascimento', FILTER_SANITIZE_SPECIAL_CHARS);
        $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_SPECIAL_CHARS);
        $peso = filter_input(INPUT_POST, 'peso', FILTER_SANITIZE_SPECIAL_CHARS);
        $altura = filter_input(INPUT_POST, 'altura', FILTER_SANITIZE_SPECIAL_CHARS);
        $nacionalidade = filter_input(INPUT_POST, 'nacionalidade', FILTER_SANITIZE_SPECIAL_CHARS);
        if ($nacionalidade == '') {
            $nacionalidade = 'Brasil';
        }
        $cursopreferido = filter_input(INPUT_POST, 'cursopreferido', FILTER_VALIDATE_INT);

        if ($nome && $email && $sexo && $cursopreferido) {
            $data = Cliente::select()->where('email', $email)->execute();
            if (count($data) === 0) {
                Cliente::insert([
                    'nome' => ucfirst(trim($nome)),
                    'email' => strtolower(trim($email)),
                    'prof' => ucfirst(trim($prof)),
                    'nascimento' => $nascimento,
                    'sexo' => $sexo,
                    'peso' => $peso,
                    'altura' => $altura,
                    'nacionalidade' => ucfirst(trim($nacionalidade)),
                    'cursopreferido' => $cursopreferido
                ])->execute();
                
                $_SESSION['success'] = '<p style="color: green;">Cliente <strong>'. $nome . '</strong> cadastrado com sucesso"</p>';
                $this->redirect('/');
                exit;
            } else {
                $_SESSION['alert'] = '<p style="color: red;">este email já existe, escolha outro</p>';
                $this->redirect('/novo');
                exit;
            }
        } else {
            $_SESSION['alert'] = '<p style="color: red;">Preencha os campos obrigatórios!</p>';
            $this->redirect('/novo');
            exit;
        }
    }

    public function update($id) {
        if ($this->logado) {
            $cliente = Cliente::select()->find($id['id']);
        
            $this->render('editar', [
            'cliente' => $cliente
        ]);
        } else {
            $_SESSION['alert'] = '<p style="color: red;">Você não é um Admnistrador, não pode editar!</p>';
            $this->redirect('/');
            exit;
        }
        
    }

    public function updateAction($dados) {
        $emailExists = filter_input(INPUT_POST, 'emailExists', FILTER_VALIDATE_EMAIL);
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $prof = filter_input(INPUT_POST, 'prof', FILTER_SANITIZE_SPECIAL_CHARS);
        $nascimento = filter_input(INPUT_POST, 'nascimento', FILTER_SANITIZE_SPECIAL_CHARS);
        $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_SPECIAL_CHARS);
        $peso = filter_input(INPUT_POST, 'peso', FILTER_SANITIZE_SPECIAL_CHARS);
        $altura = filter_input(INPUT_POST, 'altura', FILTER_SANITIZE_SPECIAL_CHARS);
        $nacionalidade = filter_input(INPUT_POST, 'nacionalidade', FILTER_SANITIZE_SPECIAL_CHARS);
        if ($nacionalidade == '') {
            $nacionalidade = 'Brasil';
        }
        $cursopreferido = filter_input(INPUT_POST, 'cursopreferido', FILTER_VALIDATE_INT);

        if ($this->logado) {
            if ($nome && $email && $sexo && $cursopreferido) {
                $data = Cliente::select()->where('email', $email)->execute();
                if (count($data) === 0 || $email === $emailExists) {
                    Cliente::update()
                    ->set('nome', ucfirst(trim($nome))) 
                    ->set('email', strtolower(trim($email)))
                    ->set('prof', ucfirst(trim($prof))) 
                    ->set('nascimento', $nascimento)
                    ->set('sexo', $sexo)
                    ->set('peso', $peso)
                    ->set('altura', $altura)
                    ->set('nacionalidade', ucfirst(trim($nacionalidade))) 
                    ->set('cursopreferido', $cursopreferido)
                    ->where('id', $dados['id'])
                    ->execute();
                    
                    $_SESSION['success'] = '<p style="margin: 10px auto; color: green; text-align: center;">Cliente <strong>'. $nome . '</strong> alterado com sucesso"</p>';
                    $this->redirect('/');
                    exit;
                } else {
                    $_SESSION['alert'] = '<p style="color: red;">este email já existe, escolha outro</p>';
                    $this->redirect('/editar/'.$dados['id']);
                    exit;
                }
            } else {
                $_SESSION['alert'] = '<p style="color: red;">Preencha os campos obrigatórios!</p>';
                $this->redirect('/editar/'.$dados['id']);
                exit;
            }
        } else {
            $_SESSION['alert'] = '<p style="color: red;">Você não é um Administrador, não pode editar!</p>';
            $this->redirect('/editar/'.$dados['id']);
            exit;
        }
        
    }

    public function findAll() {
        
    }

    public function findId($id) {
        
    }

    public function findByEmail($email) {
        
    }

    public function del($id) {

        if ($this->logado) {
            $cliente = Cliente::select()->find($id['id']);
            if ($cliente['id']) {
                Cliente::delete()->where('id', $cliente['id'])->execute();
                $_SESSION['success'] = '<p style="color: green;">Cliente <strong>'. $cliente['nome'] . '</strong> deletado com sucesso!</p>';
                $this->redirect('/');
                exit;
            } else {
                $_SESSION['alert'] = '<p style="color: red;">este ID não existe, nada deletado!</p>';
                $this->redirect('/');
                exit;
            }
        } else {
            $_SESSION['alert'] = '<p style="color: red;">Você não é um Administrador, não pode excluir nada!</p>';
            $this->redirect('/');
            exit;
        }
        
    }

}