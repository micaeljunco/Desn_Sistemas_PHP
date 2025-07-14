
<?php
if (isset($_GET['usuNome']) && isset($_GET['usuIdade'])) {
    echo "Recebido o cliente " . $_GET['usuNome'] . ".<br>";
    echo $_GET['usuNome'] . ' tem ' . $_GET['usuIdade'] . " anos.";
}
?>