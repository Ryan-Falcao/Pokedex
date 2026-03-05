<?php
$url = "https://www.canalti.com.br/api/pokemons.json";
$dados = json_decode(file_get_contents($url), true);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pokédex</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
    background: #111;
    color: white;
    font-family: Arial;
    text-align: center;
}

.container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    padding: 20px;
}

.card {
    background: #1e1e1e;
    padding: 15px;
    border-radius: 10px;
    transition: 0.3s;
}

.card:hover {
    transform: scale(1.05);
}
</style>
<body>

<h1>Pokédex</h1>

<div class="container">
<?php foreach ($dados["pokemon"] as $pokemon): ?>
    <div class="card">
        <img src="<?= $pokemon["img"]; ?>" width="120">
        <h2><?= $pokemon["name"]; ?></h2>
        <p>Nº: <?= $pokemon["num"]; ?></p>
        <p>Tipo: <?php foreach($pokemon["type"] as $tipo):?>
             <?= $tipo; ?> 
        <?php endforeach?></p>
        <p>Fraqueza: <?php foreach($pokemon["weaknesses"] as $fraquezas):?>
            <?= $fraquezas; ?>
        <?php endforeach ?></p>
        <p>Altura: <?= $pokemon["height"]; ?></p>
    </div>
<?php endforeach; ?>
</div>

</body>
</html>