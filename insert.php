<?php
$message = "";
if (isset($_POST['submit_data'])) {
    // Includs database connection
    include "db_connect.php";

    // Gets the data from post

    $patrimonio = $_POST['patrimonio'];
    $descricao = $_POST['descricao'];
    $lotacao = $_POST['lotacao'];
    $conservacao = $_POST['conservacao'];
    $localizacao = $_POST['localizacao'];
    $verificado = $_POST['verificado'];   

    // Makes query with post data
    $query = "INSERT INTO patrimonios (patrimonio, 
    descricao, 
    lotacao ,
    conservacao ,
    localizacao ,
    verificado ) VALUES ('$patrimonio',
    '$descricao',
    '$lotacao',
    '$conservacao',
    '$localizacao',
    '$verificado')";

    // Executes the query
    // If data inserted then set success message otherwise set error message
    if ($db->exec($query)) {
        $message = "Inserido com Sucesso";
    } else {
        $message = "Erro, não foi possível inserir";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <script src="html5-qrcode.min.js"></script>
    <script>
        function docReady(fn) {
            // see if DOM is already available
            if (document.readyState === "complete" || document.readyState === "interactive") {
                // call on next available tick
                setTimeout(fn, 1);
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        }

        docReady(function() {
            var resultContainer = document.getElementById('qr-reader-results');
            var lastResult, countResults = 0;

            var html5QrcodeScanner = new Html5QrcodeScanner(
                "qr-reader", {
                    fps: 10,
                    qrbox: 250
                });

            function onScanSuccess(decodedText, decodedResult) {
                if (decodedText !== lastResult) {
                    ++countResults;
                    lastResult = decodedText;
                    console.log(`Scan result = ${decodedText}`, decodedResult);

                    resultContainer.innerHTML += `<div>[${countResults}] - ${decodedText}</div>`;

                    // Optional: To close the QR code scannign after the result is found
                    html5QrcodeScanner.clear();
                }
            }

            // Optional callback for error, can be ignored.
            function onScanError(qrCodeError) {
                // This callback would be called in case of qr code scan error or setup error.
                // You can avoid this callback completely, as it can be very verbose in nature.
            }

            html5QrcodeScanner.render(onScanSuccess, onScanError);
        });
    </script>

</head>


  

<body>
    <div style="width: 500px; margin: 20px auto;">        

        <div id="qr-reader" style="width:500px"></div>     

        <!-- showing the message here-->
        <div><?php echo $message; ?></div>

        <table width="100%" cellpadding="5" cellspacing="1" border="1">
            <form action="insert.php" method="post">
                <tr>
                    <td>Patrimonio:</td>
                    <td><input  id="qr-reader-results" name="patrimonio" type="text"></td>
                </tr>
                <tr>
                    <td>Descrição:</td>
                    <td><input name="descricao" type="text"></td>
                </tr>
                <tr>
                    <td>lotacao:</td>
                    <td><input name="lotacao" type="text"></td>
                </tr>
                <tr>
                    <td>conservacao:</td>
                    <td><input name="conservacao" type="text"></td>
                </tr>
                <tr>
                    <td>localizacao:</td>
                    <td><input name="localizacao" type="text"></td>
                </tr>
                <tr>
                    <td>verificado:</td>
                    <td><input name="verificado" type="text"></td>
                </tr>

                <tr>
                    <td><a href="index.php">Lista</a></td>
                    <td><input name="submit_data" type="submit" value="Insert Data"></td>
                </tr>
            </form>
        </table>
    </div>
</body>





</html>