<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio PHP</title>
    <link rel="stylesheet" href="style.css">
    <style>
        img.nota {
            height: 50px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <?php 
        $saque = $_REQUEST['saque'] ?? '0';
    ?>
    <main>
        <h1>Caixa Eletrônico</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="saque">Qual valor você deseja sacar? (R$)</label>
            <input type="number" name="saque" id="saque" step="5" required value="<?=$saque?>">
            <p>Notas disponiveis: R$100, R$50, R$10, R$5 </p>
            <input type="submit" value="Sacar">
        </form>
    </main>
    <?php 
        $resto = $saque;

        $total100 = floor($resto / 100);
        $resto %= 100;

        $total50 = floor($resto / 50);
        $resto %= 50;

        $total10 = floor($resto / 10);
        $resto %= 10;

        $total5 = floor($resto / 5);
        $resto %= 5;
    ?>
    <section>
        <h2>Saque de R$ <?=number_format($saque, 2, ",", ".")?> Realizado</h2>
        <p>O caixa eletrônico vai te entregar as seguintes notas:</p>
        <ul>
            <li><img src="img/100-reais.jpg" alt="Nota de R$ 100" class="nota"> x <?=$total100?></li>
            <li><img src="img/50-reais.jpg" alt="Nota de R$ 50" class="nota"> x <?=$total50?></li>
            <li><img src="img/10-reais.jpg" alt="Nota de R$ 10" class="nota"> x <?=$total10?></li>
            <li><img src="img/5-reais.jpg" alt="Nota de R$ 5" class="nota"> x <?=$total5?></li>
        </ul>
    </section>
</body>
</html>