<?php 
  
    function request ($endpoint = ''){
        $url = "https://brasilapi.com.br/api/cnpj/v1/".$endpoint;

        $resposta = @file_get_contents($url);
        return json_decode($resposta, true);
    }

    function show($cnpj){
        $data = request($cnpj);
        //var_dump($data);

        echo 'CNPJ: '.$data['cnpj'].'<br>';
        echo 'Descrição Matriz Filial: '.$data['descricao_matriz_filial'].'<br>';
        echo 'Razão Social: '.$data['razao_social'].'<br>';
        echo 'Nome Fantasia: '.$data['nome_fantasia'].'<br>';
        echo 'Descrição Situação Cadastral: '.$data['descricao_situacao_cadastral'].'<br>';
        echo 'Data Situação Cadastral: '.$data['data_situacao_cadastral'].'<br>';
        echo 'Data Início Atividade: '.$data['data_inicio_atividade'].'<br>';
        echo 'Descrição: '.$data['cnae_fiscal_descricao'].'<br>';
        echo 'Endereço: '.$data['descricao_tipo_logradouro'].' '.$data['logradouro'].' N°: '.$data['numero'].', '.$data['complemento'].', Bairro: '.$data['bairro'].', '.$data['municipio'].' - '.$data['uf'].'<br>';
        echo 'CEP: '.$data['cep'].'<br>';
        echo 'Telefone: '.$data['ddd_telefone_1'].'<br>';
    }

?>