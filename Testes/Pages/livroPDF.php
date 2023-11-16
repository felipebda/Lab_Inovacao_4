<?php

include_once '../Connection/conexao.php';
require('../../../../fpdf/fpdf.php');


session_start();
//Pegar TUDO info livro

$idLivro = $_POST["idLivro"]; //ID do Livro
$imgLivro = "../Images/culinary book.jpg"; //Endereço da imagem

$slqLivro = "SELECT li.idLivro as idLivro,
             li.titulo_livro as titulo,
             li.isbn as isbn,
             li.editor as idEditor,
             fu.nome as nome_editor
             FROM livro li
             JOIN funcionario fu on li.editor = fu.idFunc
             WHERE idLivro = $idLivro";

$queryLivro =  $pdo->query($slqLivro);
$queryLivro->execute();
$resultadoLivro = $queryLivro->fetch(PDO::FETCH_ASSOC);
//var_dump($resultadoLivro);

$nomeDoLivro = $resultadoLivro["titulo"]; // Nome do Livro
$isbn = $resultadoLivro["isbn"];// ISBN
$nomeDoEditor = $resultadoLivro["nome_editor"];// Nome do Editor

//Pegar TUDO info publicacao

$sqlBuscarReceitasLivro = "SELECT
                           pu.Receita_nome as nomeReceita,
                           pu.Receita_cozinheiro as idCozinheiro
                           FROM publicacao pu
                           WHERE Livro_idLivro = $idLivro";

$queryBuscarReceitaLivro = $pdo->query($sqlBuscarReceitasLivro);
$queryBuscarReceitaLivro->execute();
$resultadoBuscarReceitaLivro = $queryBuscarReceitaLivro->fetchAll(PDO::FETCH_ASSOC);

//var_dump($resultadoBuscarReceitaLivro);



//Pegar TUDO info receita


//fazer PDF


/*
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,$nomeDoLivro);
$pdf->Cell(40,10,$isbn);
$pdf->Cell(40,10,$nomeDoEditor);
$pdf->Image($imgLivro, 100, 100, 100);
$pdf->Output();
*/

// Crie uma instância do FPDF
$pdf = new FPDF('P','mm','A4');


//------------------------------------------CAPA DO LIVRO --------------------------------------------------

// Adicione uma página ao documento
$pdf->AddPage();

// Adicione o título do livro
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 80, $nomeDoLivro, 0, 1, 'C');

// Adicione a imagem da capa do livro
$pdf->Image($imgLivro, 50, 90, 110);

// Pule para a próxima linha para o restante das informações
$pdf->Ln(30);

// Adicione outras informações sobre o livro
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 120, 'ISBN:'.$isbn, 0, 1, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, -80, 'Editor:'.$nomeDoEditor, 0, 1, 'C');

/*
// Adicione o rodapé com o ISBN e o nome do editor
$pdf->SetY(-15);
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 10, $nomeDoLivro, 0, 0, 'L');
*/


// -------------------------------------CRIAR AS PAGINAS DA RECEITA-------------------------------------------


foreach($resultadoBuscarReceitaLivro as $colunasPublicacao)
{
    $pdf->AddPage(); //criar uma pagina no PDF

    $nomeReceita = $colunasPublicacao['nomeReceita'];
    $idCozinheiro = intval($colunasPublicacao['idCozinheiro']);
    //var_dump($nomeReceita);
    //echo "Nome da receita: ".$nomeReceita."<br>";
    //var_dump($idCozinheiro);
    //echo "Id cozinheiro: ".$idCozinheiro."<br><br>";


    //FAZER SQL DA RECEITA E PEGAR AS INFORMACOES
    $sqlReceita = "SELECT
                   re.nome as nome_receita,
                   cat.descricao as categoria,
                   re.porcoes as porcoes,
                   re.modo_preparo as modo_preparo,
                   re.imagem as imagem
                   FROM receita re
                   JOIN categoria cat ON re.id_categ = cat.idCategoria
                   WHERE re.nome = :n AND re.cozinheiro = :idc";
    
    $queryReceita = $pdo->prepare($sqlReceita);
    $queryReceita->bindValue(":n",$nomeReceita);
    $queryReceita->bindValue(":idc",$idCozinheiro);
    $queryReceita->execute();
    $resultadoReceita = $queryReceita->fetch(PDO::FETCH_ASSOC);
    //var_dump($resultadoReceita);

    $nomeReceita = $resultadoReceita["nome_receita"];
    $categoria = $resultadoReceita["categoria"];
    $porcoes = $resultadoReceita["porcoes"];
    $modoPreparo = $resultadoReceita["modo_preparo"];
    $imagem = "../Images/receitas/".$resultadoReceita["imagem"].".jpg"; //"../Images/culinary book.jpg";
    //echo "Nome da receita: ".$nomeReceita."<br>";
    //echo "Categoria: ".$categoria."<br>";
    //echo "Pocoes: ".$porcoes."<br>";
    //echo "Modo de Preparo: ".$modoPreparo."<br>";
    //echo "Link imagem: ".$imagem."<br>";
    
    
    //FAZER SQL DOS INGREDIENTES DA RECEITA
    $sqlIngredientes = "SELECT
                        has. qtd_medida as medida,
                        ing.nome as nome_ingrediente,
                        med.descricao as medida_ingrediente
                        FROM receita_has_ingrediente has
                        JOIN ingrediente ing ON has.idIngrediente = ing.idIngrediente
                        JOIN medida_ingrediente med ON has.idMedida = med.idMedida
                        WHERE has.nome = :n AND has.cozinheiro = :c";

    $queryIngredientes = $pdo->prepare($sqlIngredientes);
    $queryIngredientes->bindValue(":n",$nomeReceita);
    $queryIngredientes->bindValue(":c",$idCozinheiro);
    $queryIngredientes->execute();
    $resultadoIngrediente = $queryIngredientes->fetchAll(PDO::FETCH_ASSOC);

    //NOME DA RECEITA NO PDF
    $pdf->SetFont('Arial', 'B', 18);
    $pdf->Cell(0, 10, $nomeReceita, 0, 1, 'C');

    //IMAGEM NO PDF
    $pdf->Image($imagem, 50, 30, 100);

    // QUANTIDADES DE PORCOES NO PDF
    $pdf->SetFont('Arial', '', 12);
    $pdf->Ln(10);
    $pdf->Cell(0, 150, 'Porções: 4', 0, 1, 'L');

    // Ingredientes
    $pdf->Ln(10);
    $pdf->SetX(10);
    $pdf->Sety(110);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Ingredientes:', 0, 1, 'L');
    
    

    $ingredienteArray = array();
    foreach($resultadoIngrediente as $colunaHAS)
    {
        
        $qtdMedida = $colunaHAS["medida"];
        $nomeIngrediente = $colunaHAS["nome_ingrediente"];
        $descricaoMedida = $colunaHAS["medida_ingrediente"];
        array_push($ingredienteArray, "- ".$qtdMedida. " ". $descricaoMedida. " de ".$nomeIngrediente);
        //echo  $qtdMedida. " ". $descricaoMedida. " de ".$nomeIngrediente."<br>";
    }

    //INGREDIENTES NO PDF
    $pdf->SetFont('Arial', '', 12);
    foreach ($ingredienteArray as $linha) {
        $pdf->MultiCell(0, 6, $linha);
    }

    //MODO DE PREPARO NO PDF
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Modo de Preparo:', 0, 1, 'L');
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, $modoPreparo);

    //var_dump($resultadoIngrediente);



    //var_dump($colunasPublicacao);
    //echo "<br><br>";
}



// Terminar A producao do PDF e visualizar'
$pdf->Output();








?>