
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mal Kabul Formu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        #matchingResults {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>İş Emri Formu</h2>
    <form>
        <label for="cari">Cari:</label>
        <input type="text" id="cari" name="cari" required>

        <label for="birinciCap">1. Çap:</label>
        <input type="number" id="birinciCap" name="birinciCap" required>

        <label for="ikinciCap">S. Çap:</label>
        <input type="number" id="ikinciCap" name="ikinciCap" required>

        <label for="kalanMiktar">Kalan Miktar (kg):</label>
        <input type="number" id="kalanMiktar" name="kalanMiktar" required>

        <button type="button" onclick="submitForm()">İş Emri Oluştur</button>
    </form>

    <!-- İş Emri oluşturan kabul edilen Ürünlerin Listesi -->
    <h2>Mal Kabul Edilen Ürünler</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Cari</th>
                <th>1. Çap</th>
                <th>S. Çap</th>
                <th>Kalan Miktar (kg)</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody id="acceptedProductsTableBody"></tbody>
    </table>

    <label for="selectedJob">İş Emri Seç:</label>
    <select id="selectedJob"></select>

    <div id="barcodeScanner">
        <label for="barcodeInput">Barkod Okut:</label>
        <input type="text" id="barcodeInput">
        <button onclick="matchBarcode()">Eşleştir</button>
    </div>

    <!-- Eşleşen ürünlerin listesi -->
    <div id="matchingResults">
        <h2>Eşleşen Ürünler</h2>
        <ul id="matchingResultsList"></ul>
        <p id="totalTonaj">Toplam Tonaj: 0 kg</p>
    </div>

    <script>
        var currentNo = 1;
        var acceptedProducts = [];
        var totalTonaj = 0;

        function submitForm() {
            var cari = document.getElementById("cari").value;
            var birinciCap = document.getElementById("birinciCap").value;
            var ikinciCap = document.getElementById("ikinciCap").value;
            var kalanMiktar = document.getElementById("kalanMiktar").value;

            if (cari === "" || birinciCap === "" || ikinciCap === "" || kalanMiktar === "") {
                alert("Lütfen tüm alanları doldurun.");
                return;
            }

            var acceptedProduct = {
                no: currentNo,
                cari: cari,
                birinciCap: birinciCap,
                ikinciCap: ikinciCap,
                kalanMiktar: kalanMiktar
            };

            addAcceptedProductToTable(acceptedProduct);
            clearForm();
            incrementNo();
            fillJobList();
        }

        function addAcceptedProductToTable(acceptedProduct) {
            var tableBody = document.getElementById("acceptedProductsTableBody");
            var newRow = tableBody.insertRow(-1);

            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);
            var cell6 = newRow.insertCell(5);

            cell1.innerHTML = acceptedProduct.no;
            cell2.innerHTML = acceptedProduct.cari;
            cell3.innerHTML = acceptedProduct.birinciCap;
            cell4.innerHTML = acceptedProduct.ikinciCap;
            cell5.innerHTML = acceptedProduct.kalanMiktar + " kg";
            cell6.innerHTML = `<button onclick="removeRow(this)">Sil</button>`;

            acceptedProducts.push(acceptedProduct);
        }

        function clearForm() {
            document.getElementById("cari").value = "";
            document.getElementById("birinciCap").value = "";
            document.getElementById("ikinciCap").value = "";
            document.getElementById("kalanMiktar").value = "";
        }

        function incrementNo() {
            currentNo++;
        }

        function fillJobList() {
            var select = document.getElementById("selectedJob");
            var option = document.createElement("option");
            option.text = "İş Emri " + currentNo;
            option.value = currentNo;
            select.add(option);
        }

        function matchBarcode() {
            var selectedJob = document.getElementById("selectedJob").value;
            var enteredBarcode = document.getElementById("barcodeInput").value;

            var matchingProduct = acceptedProducts.find(product => product.no == selectedJob);

            if (matchingProduct) {
                var resultDiv = document.getElementById("matchingResultsList");
                var listItem = document.createElement("li");

                // Tonaj kontrolü
                var tonajIndex = 4; // 4. indis (0'dan başladığı için)
                var barkodArray = enteredBarcode.split('/');
                var tonaj = barkodArray[tonajIndex];
                totalTonaj += parseInt(tonaj);

                listItem.innerHTML = `
                    <p>Barkod eşleşti!</p>
                    <p>İş Emri: ${matchingProduct.no}</p>
                    <p>Cari: ${matchingProduct.cari}</p>
                    <p>1. Çap: ${matchingProduct.birinciCap}</p>
                    <p>S. Çap: ${matchingProduct.ikinciCap}</p>
                    <p>Kalan Miktar: ${matchingProduct.kalanMiktar} kg</p>
                    <p>Barkod: ${enteredBarcode}</p>
                    <p>Tonaj: ${tonaj} kg</p>
                    ---------------------------
                `;
                resultDiv.appendChild(listItem);

                // Toplam tonajı güncelle
                document.getElementById("totalTonaj").textContent = "Toplam Tonaj: " + totalTonaj + " kg";
            } else {
                alert("Barkod eşleşmedi veya seçili iş emri ile eşleşmiyor. Lütfen geçerli bir barkod okutun.");
            }
        }

        function removeRow(button) {
            var row = button.parentNode.parentNode;
            var index = row.rowIndex;
            acceptedProducts.splice(index - 1, 1);
            row.parentNode.removeChild(row);
        }

        document.addEventListener("DOMContentLoaded", function () {
            fillJobList();
        });
    </script>
</body>
</html>