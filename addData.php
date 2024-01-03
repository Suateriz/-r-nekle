Suat
Eriz

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'connection.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barkodlu Mal Kabul</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
        }
        main {
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            display: grid;
            grid-gap: 16px;
        }
        label {
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
            margin-top: 10px;
        }
        button:hover {
            background-color: red
        }
        #sonuclar {
            margin-top: 20px;
        }
        #kabulListesi {
            margin-top: 20px;
        }
     
        
      
        #toplamTonaj {
            font-weight: bold;
            margin-top: 10px;
        }
        #filtreleTedarikci {
            font-weight: bold;/* yazıyı kalın ve ince yapma */
        font-size: 16px; /* Veya istediğiniz boyutu ayarlayabilirsiniz */
    }
#filtreleCap {
    font-weight: bold;
    font-size: 16px;
             
}
#tedarikciFirma {
    font-weight: bold;
    font-size: 16px;
             
}
    </style>
   <script>
   document.addEventListener("DOMContentLoaded", function () {
    var correctPassword = "035";
    var attempts = 3;

    function checkPassword() {
        var password = prompt("Lütfen şifreyi girin:");

        if (password === correctPassword) {
            showWelcomeMessage();
        } else {
            attempts--;

            if (attempts > 0) {
                alert("Geçersiz şifre. Kalan deneme hakkınız: " + attempts);
                checkPassword();
            } else {
                alert("Çok fazla yanlış giriş. Sayfa kapatılıyor.");
                window.location.href = "about:blank";
            }
        }
    }
    function guncelleTonaj(barkod, tedarikciFirma, plakaNo, irsaliyeNo) {
        // Kabul edilen ürünler tablosundaki her satırı kontrol et
        var tableRows = document.querySelectorAll("#acceptedProductsTable tbody tr");

        for (var i = 0; i < tableRows.length; i++) {
            var currentBarkod = tableRows[i].querySelector("td:nth-child(2)").innerText;

            // Eğer barkodlar eşleşiyorsa, tonajı güncelle ve çık
            if (currentBarkod === barkod) {
                // Diğer sütunlardaki bilgileri de güncelleyebilirsiniz
                tableRows[i].querySelector("td:nth-child(3)").innerText = "Yeni Tonaj"; // Yeni tonajı buraya ekleyin
                alert("Barkod eşleşti, tonaj güncellendi.");
                return;
            }
        }

        // Eğer hiç eşleşme bulunamazsa
        alert("Barkod eşleşmedi.");
    }
    function showWelcomeMessage() {
        // Hoşgeldiniz mesajını ekrana eklemek yerine, sayfa üzerindeki önceki öğeyi kaldırabiliriz.
        var welcomeMessage = document.querySelector('p'); // p etiketini seçiyoruz
        if (welcomeMessage) {
            welcomeMessage.remove();
        }

        // Mal Kabul Formunu göster
        document.getElementById("malKabulForm").style.display = "block";
    }

    checkPassword();
});
</script>
</head>
<body>
    <a href="http://ayessuat.com"></a>
    <header>
        <h1>Barkodlu Mal Kabul</h1>
    </header>

    <main>
        <form id="malKabulForm">
            <label for="barkod">Barkod:</label>
            <input type="text" id="barkod" name="barkod" required>

            <label for="tedarikciFirma">Tedarikçi Firma:</label>
            <select id="tedarikciFirma" name="tedarikciFirma" required>
                <option value="" disabled selected>Seçiniz</option>
                <option value="Habaş">Habaş</option>
                <option value="Kroman">Kroman</option>
                <option value="Ege Çelik">Ege Çelik</option>
                <option value="Karel">Karel</option>
            </select>

           

            <label for="plakaNo">Plaka No:</label>
            <input type="text" id="plakaNo" name="plakaNo" required>

            <label for="irsaliyeNo">Irsaliye No:</label>
            <input type="text" id="irsaliyeNo" name="irsaliyeNo" required>

            <button type="button" onclick="onaylaVeMalKabulEt()">Malı Kabul Et</button>
            <button type="button" onclick="yazdir()">Yazdır</button>
        </form>

        <div id="sonuclar"></div>

        <div id="kabulListesi">
            <h2>Mal Kabulleri Listesi</h2>
            <label for="filtreleTedarikci">Tedarikçi Firma Filtrele:</label>
            <select id="filtreleTedarikci" onchange="listeleTedarikciFirma()">
                <option value="0">Hepsi</option>
                <option value="Habaş">Habaş</option>
                <option value="Kroman">Kroman</option>
                <option value="Ege Çelik">Ege Çelik</option>
                <option value="Karel">Karel</option>
            </select>
            <label for="filtreleCap">Çap Filtrele:</label>
        <select id="filtreleCap" onchange="listeleCap()">
            <option value="0">Hepsi</option>
            <option value="5.5">Çap 5.5</option>
            <option value="6">Çap 6</option>
            <option value="6.5">Çap 6.5</option>
            <option value="7">Çap 7</option>
            <option value="7.5">Çap 7.5</option>
            <option value="8">Çap 8</option>
            <option value="8.5">Çap 8.5</option>
            <option value="9">Çap 9</option>
            <option value="9.5">Çap 9.5</option>
            <option value="10">Çap 10</option>
            <option value="10.5">Çap 10.5</option>
            <option value="11">Çap 11</option>
            <option value="11.5">Çap 11.5</option>
            <option value="12">Çap 12</option>
            <option value="13">Çap 13</option>
        
        </select>
            <ul id="kabulListesiUl"></ul>
            
        </div>

        
            
        <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center;">
            <div id="toplamTonaj"></div>
            <h2>Hoşgeldiniz</h2>
        </div>
    </main>

    <script>
        var malKabulleri = [];

      // Örnek bir okuma fonksiyonu
function okunanBarkodFonksiyonu() {
    // Burada el terminalinden ya da başka bir kaynaktan barkodu okuyarak döndürün
    return "6.5/1008/516/23307904/2100 kg/2023/";
}

function onaylaVeMalKabulEt() {
    var barkod = document.getElementById('barkod').value;
    var barkod = okunanBarkodFonksiyonu().trim();
    console.log("Okunan Barkod: ", barkod);

    // Barkod formatını kontrol etmek için bir regex (regular expression) kullanalım
    var barkodRegex = /^\d+(\.\d+)?\/\d+\/\d+\/\d+\/\d+\s?kg\/20[0-2][0-9]\/$/;


    if (!barkod.match(barkodRegex)) {
        alert('Geçersiz barkod formatı! Lütfen doğru bir barkod girin.');
        return;
    }

    var onay = confirm("Filmaşin veri tabanına kaydolacaktır. Onaylıyor musunuz?");

    if (onay) {
        malKabulGonder();
        temizleForm();
        listeleKabuller();
        listeleTonaj();
    } else {
        alert("Mal kabul işlemi iptal edildi.");
    }
}


        function malKabulGonder() {
            var barkod = document.getElementById('barkod').value;
            var tedarikciFirma = document.getElementById('tedarikciFirma').value;
            
            var plakaNo = document.getElementById('plakaNo').value;
            var irsaliyeNo = document.getElementById('irsaliyeNo').value;

            var anlikTarih = new Date();
            var gun = ("0" + anlikTarih.getDate()).slice(-2);
            var ay = ("0" + (anlikTarih.getMonth() + 1)).slice(-2);
            var yil = anlikTarih.getFullYear();
            var anlikTarihStr = yil + "-" + ay + "-" + gun;

            if (barkod === "" || tedarikciFirma  === ""  || plakaNo === "" || irsaliyeNo === "") {
                alert('Tüm alanları doldurun!');
                return;
            }

            var tonajBilgisi = extractTonajInfoFromBarkod(barkod);
            var tonaj = tonajBilgisi.tonaj;
            var cap = tonajBilgisi.cap;

            var sonuclarDiv = document.getElementById('sonuclar');
            sonuclarDiv.innerHTML = `
            <p style="color: blue; font-weight: bold;">Mesaj: Mal kabul işlemi başarıyla gerçekleştirildi!</p>
                <p>Barkod: ${barkod}</p>
                <p>Tedarikçi Firma: ${tedarikciFirma}</p>
                
                <p>Plaka No: ${plakaNo}</p>
                <p>Irsaliye No: ${irsaliyeNo}</p>
                <p>Anlık Tarih: ${anlikTarihStr}</p>
            `;

            var toplamTonaj = parseFloat(tonaj) 
            var yeniKabul = {
                barkod: barkod,
                tedarikciFirma: tedarikciFirma,
               
                plakaNo: plakaNo,
                irsaliyeNo: irsaliyeNo,
                anlikTarih: anlikTarihStr,
                tonaj: tonaj,
                toplamTonaj: toplamTonaj,
                cap: cap
            };
            malKabulleri.push(yeniKabul);
        }

        function extractTonajInfoFromBarkod(barkod) {
            var parts = barkod.split('/');
            var tonaj = parts[4] || '';
            var cap = parts[0] || '';
            return { tonaj, cap };
        }

        function yazdir() {
            window.print();
        }

        function temizleForm() {
            document.getElementById('barkod').value = '';
            document.getElementById('tedarikciFirma').value = '';
            
            document.getElementById('plakaNo').value = '';
            document.getElementById('irsaliyeNo').value = '';
        }

        function listeleKabuller() {
            var kabulListesiUl = document.getElementById('kabulListesiUl');
            kabulListesiUl.innerHTML = '';

            for (var i = 0; i < malKabulleri.length; i++) {
                var kabul = malKabulleri[i];
                var listItem = document.createElement('li');
                listItem.innerHTML = `
                    Barkod: ${kabul.barkod}<br>
                    Tedarikçi Firma: ${kabul.tedarikciFirma}<br>
                    
                    Plaka No: ${kabul.plakaNo}<br>
                    Irsaliye No: ${kabul.irsaliyeNo}<br>
                    Anlık Tarih: ${kabul.anlikTarih}<br>
                    ---------------------------
                `;
                kabulListesiUl.appendChild(listItem);
            }

            
        }

        function listeleTedarikciFirma() {
    var filtreleTedarikci = document.getElementById('filtreleTedarikci').value;

    var filtrelenmisKabuller = malKabulleri.filter(kabul =>
        filtreleTedarikci === "0" || kabul.tedarikciFirma === filtreleTedarikci
    );

    var kabulListesiUl = document.getElementById('kabulListesiUl');
    kabulListesiUl.innerHTML = '';

    for (var i = 0; i < filtrelenmisKabuller.length; i++) {
        var kabul = filtrelenmisKabuller[i];
        var listItem = document.createElement('li');
        listItem.innerHTML = `
            Barkod: ${kabul.barkod}<br>
            Tedarikçi Firma: ${kabul.tedarikciFirma}<br>
          
            Plaka No: ${kabul.plakaNo}<br>
            Irsaliye No: ${kabul.irsaliyeNo}<br>
            Anlık Tarih: ${kabul.anlikTarih}<br>
            ---------------------------
        `;
        kabulListesiUl.appendChild(listItem);
    }


    

    // Güncellendi: Toplam tonajı da seçeneğe göre güncelle
    var toplamTonaj = filtrelenmisKabuller.reduce((acc, kabul) => acc + parseFloat(kabul.toplamTonaj), 0);
    document.getElementById('toplamTonaj').innerText = 'Toplam Tonaj: ' + toplamTonaj + ' kg';
}

function listeleTonaj() {
    var tedarikciFirma = document.getElementById('filtreleTedarikci').value;
    var filtreleCap = document.getElementById('filtreleCap').value;

    var filtrelenmisKabuller = malKabulleri.filter(kabul => 
        (tedarikciFirma === "0" || kabul.tedarikciFirma === tedarikciFirma) &&
        (filtreleCap === "0" || kabul.cap === filtreleCap)
    );

   
    for (var i = 0; i < filtrelenmisKabuller.length; i++) {
        var kabul = filtrelenmisKabuller[i];
        var listItem = document.createElement('li');
        listItem.innerHTML = `
            Tonaj: ${kabul.tonaj} kg  = ${kabul.toplamTonaj} kg (Çap: ${kabul.cap})<br>
            ---------------------------
        `;
      
    }

    // Güncellendi: Toplam tonajı da seçeneğe göre güncelle
    var toplamTonaj = filtrelenmisKabuller.reduce((acc, kabul) => acc + parseFloat(kabul.toplamTonaj), 0);
    
    // Güncellendi: Toplam tonajı 'tonajListesi' yerine 'toplamTonaj' elementine ekle
    document.getElementById('toplamTonaj').innerText = 'Toplam Tonaj: ' + toplamTonaj + ' kg';
}
function listeleCap() {
    var filtreleCap = document.getElementById('filtreleCap').value;
    var tedarikciFirma = document.getElementById('filtreleTedarikci').value;

    var filtrelenmisKabuller = malKabulleri.filter(kabul =>
        (tedarikciFirma === "0" || kabul.tedarikciFirma === tedarikciFirma) &&
        (filtreleCap === "0" || kabul.cap === filtreleCap)
    );

    var kabulListesiUl = document.getElementById('kabulListesiUl');
    kabulListesiUl.innerHTML = '';

    for (var i = 0; i < filtrelenmisKabuller.length; i++) {
        var kabul = filtrelenmisKabuller[i];
        var listItem = document.createElement('li');
        listItem.innerHTML = `
            Barkod: ${kabul.barkod}<br>
            Tedarikçi Firma: ${kabul.tedarikciFirma}<br>
            
            Plaka No: ${kabul.plakaNo}<br>
            Irsaliye No: ${kabul.irsaliyeNo}<br>
            Anlık Tarih: ${kabul.anlikTarih}<br>
            Çap: ${kabul.cap}<br>
            ---------------------------
        `;
        kabulListesiUl.appendChild(listItem);
    }
// Güncellendi: Toplam tonajı da seçeneğe göre güncelle
    var toplamTonaj = filtrelenmisKabuller.reduce((acc, kabul) => acc + parseFloat(kabul.toplamTonaj), 0);
    document.getElementById('toplamTonaj').innerText = 'Toplam Tonaj: ' + toplamTonaj + ' kg';
}
    

    
   

    </script>

    
   

</body>
</html>