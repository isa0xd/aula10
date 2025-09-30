<?php

require_once("modelo/Pessoa.php");
require_once("modelo/PessoaJuridica.php");
require_once("modelo/PessoaFisica.php");

$arrayPessoa = array();

do{
    echo "----MENU----\n";
    echo "1-Cadastrar PF\n";
    echo "2-Cadastrar PJ\n";
    echo "3-Listar\n";
    echo "4-Excluir\n";
    echo "0- Sair\n";

    $opcao = readline("Informe a opção: ");

    switch ($opcao) {
        case 1:
            $pessoaFisica = new PessoaFisica;
            $pessoaFisica->setNome(readline("Infome o nome: \n" ));
            $pessoaFisica->setCpf(readline("Infome o cpf: \n" ));
            $pessoaFisica->setIdade(readline("Informe a idade: \n" ));
            array_push($arrayPessoa, $pessoaFisica);
            break;

        case 2:
            $pessoaJuridica = new PessoaJuridica;
            $pessoaJuridica->setNome(readline("Infome o nome: \n" ));
            $pessoaJuridica->setNomeFantasia(readline("Infome o nome: \n" ));
            $pessoaJuridica->setCnpj(readline("Infome o cnpj: \n" ));
            array_push($arrayPessoa, $pessoaJuridica);
            break;
        
        case 3:
            foreach ($arrayPessoa as $p) {
                if ($p instanceof PessoaFisica) {
                   echo $p->getNome() . " - Idade: " . $p->getIdade() . " - CPF: " . $p->getCpf() . "\n";
                } elseif ($p instanceof PessoaJuridica) {
                    echo $p->getNome() . " - Nome fantasia: " . $p->getNomeFantasia() . " - CNPJ:  " . $p->getCnpj() . "\n";
                }
            }
            break;

        case 4:
            array_splice($arrayPessoa, 1);
            break;

        case 0:
            echo "Programa encerrado!";
            break;

        default:
            echo "Opção errada!";
        }
} while ($opcao != 0);
