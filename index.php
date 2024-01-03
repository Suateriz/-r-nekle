<!DOCTYPE html>
<html lang="en">
<>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <title>ayessuatizlenebilirlik</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
    
        }
        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
            background-position:center ;
    background-size: cover; 
        }
        .btn {
    padding: 12px 24px;
    font-size: 12px;
    font-weight: 200;
    margin-top: 30px;
    cursor: pointer;
    color: #000;;/*buton ve çerçevenin rengi*/
    background-color: rgb(0, 183, 255);
    border-radius: 20px;
    border: 1px solid red; 
    text-decoration: none;
    transition: ease 0.5s ;
        }
        .btn:hover {
    background-color: #000;/*tüm ürünler kısmında fareyi yaklaştırdığımda oluşan arka plan renk */
    color: #fff;/*fareyi yaklaştıgında tüm ürünler yazısı rengi butonda  */
    border-color: #fff;
}

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
            background-color: #ff0000;/*üst kısım boya rengi */
        }

        .navbar img {
            max-width: 100%;/*logo boyutu */
            height: auto;
        }

        nav ul {
            list-style: none;
            display: flex;
            flex-direction: column;/*üst kısım yazıları üst üste yapar */
            gap: 10px;
            margin: 0;
            padding: 0;
        }

        nav ul li a {
            font-size: 16px;/*üst kısımda ki yazıların büyüklüğü */
            color:#fff ; 
            text-decoration:none ;/*üst kısımda ki yazıların altı çizili */
            transition: ease 0.5s ;
        } 

        nav ul li a:hover { 
    color:#000 ; /*üstteki yazıların rengi değişir fare yaklaştıgında*/ 
}
        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            
        }
       

        .col {
            flex: 1;
            background-color: #fff;/*ana sayfa arka plan */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);/*kenar çerçeve rengi */
            margin-bottom: 20px;  
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #000; /*soldaki ana yazı rengi ayes web sitesi */
        }
        h5 {
    color: rgb(0, 255, 13);/*sağdaki kart başlık rengi mal kabul */
    font-size: 20px;
}
        .desc {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            
        }

        .card {
            flex: 1;
            background-color: #f8f8f8;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);/*kart çerçeve rengi */
            transition: transform 0.3s;
            display: inline-block;
            background-position: center;
            background-size: cover;
            cursor: pointer;/*tıklanabilir gösterir fare yaklaştıgında*/
            position: relative;
          
         
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card .card-head  {
          background-color: rgba(0, 0, 0, 0.4);/*kart yazı arka plan rengi */
          color: #fff;
    border-radius: 6px;
    padding: 6px;
        
        }
        .card-head p {
            font-size: 16px;
            color: white/*kart açıklama yazısı */
        }

        .card-bottom {
          position: absolute;/*aynı hizada yapar büyüklüğünü */
             bottom: 26px;
            margin-top: 20px;
        }

        .card-bottom .btn {
            background-color: #007bff;/*detayla arkaplan boyası açıklama yazısı */
            color: #fff;/*tüm ürünler ve detaylar yazısı rengi */
        }
        
        .card:hover {
    transform: translateY(-10px);/*aşagı yukarı oynar fare yaklaştıgında*/ 
    color: #fff;/*fareyi yaklaştıgında mal kabul başlıkta butonda oluşan renk */
    
    }
.card.card-1 {
    background-image: url(./img/filmaşin.jpg);
}
.card.card-2 {
    background-image: url(./img/hasır.jpg)
}
.card.card-3 {
    background-image: url(./img/demir.jpg);
}
.card.card-4 {
    background-image: url(./img/ayes2.jpg);
}

.card.card-5 {
    background-image: url(./img/ayes3.jpeg);
}

.card.card-6 {
    background-image: url(./img/pdAK62rH.jpeg);
}
 video,
 audio {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="navbar">
          <a href="#">
            <img class="logo" src="img/ayes1.png" width="200px" height="100px" alt="logo" />
            </a>
           
            <nav>
                
                <ul>
                    <li><a href="#">ANASAYFA</a></li>
                    <li><a href="https://ayescelik.com/urunler/2/cELiK-HASIR">TÜM ÜRÜNLER</a></li>
                    <li><a href="https://ayescelik.com/kurumsal/1/Hakkimizda/">HAKKINDA</a></li>
                    <li><a href="https://ayescelik.com/iletisim">İLETİŞİM</a></li>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-bars"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col">
                <h1>
                 AYES 
                    <hr />
                    WEBSİTESİ
                </h1>
                <p class="desc">
                    El terminali okutarak izlenebilirlik geçmişi ve takibi sağlar
                </p>
                <a href="#" class="btn">TÜM ÜRÜNLER</a>
                <br><br>
                <video width="100%" height="auto" controls>
                    <source class="video" src="img/Ayes Çelik Hasır Genel Tanıtım.mp4" type="video/mp4">
                    <track src="subtitle-en.vtt" kind="subtitles" srclang="en" label="ingilizce">
                    <track src="subtitle-tr.vtt" kind="subtitles" srclang="tr" label="Türkçe">
                </video>
            </div>

            <div class="col">
                <div class="cards">
                    <div class="card card-1">
                        <div class="card-head">
                            <h5>Mal kabul</h5>
                            <p>Mal kabul için filmaşindeki Qr kodu okut ve sisteme kaydet.</p>
                        </div>
                        <div class="card-bottom">
                            <a href="http://ayessuat.com/addData.php" class="btn">Detaylar</a>
                        </div>
                        <div class=".card.card-1">
                        </div>
                    </div>
                    <div class="card card-2">
                        <div class="card-head">
                            <h5>Sevkiyat</h5>
                            <p>Hazır ve sevk olunan malzemeleri göster.</p>
                        </div>
                        <div class="card-bottom">
                            <a href="http://ayessuat.com/datas.php" class="btn">Detaylar</a>
                        </div>
                    </div>
                    <div class="card card-3">
                        <div class="card-head">
                            <h5>Makara Bilgisi Getir</h5>
                            <p>Çubuk için makaraya sar.</p>
                        </div>
                        <div class="card-bottom">
                            <a href="http://ayessuat.com/ürünekle.php" class="btn">Detaylar</a>
                        </div>
                    </div>
                    <div class="card card-4">
                        <div class="card-head">
                            <h5>Kangal Çekme</h5>
                            <p>Soğuk çekme sarım işlemi başlat</p>
                        </div>
                        <div class="card-bottom">
                            <a href="http://ayessuat.com/QRTextGenerator.php" class="btn">Detaylar</a>
                        </div>
                    </div>
                    <div class="card card-5">
                        <div class="card-head">
                            <h5>Kesme bölümü</h5>
                            <p>Çubuk kesimi için basın.</p>
                        </div>
                        <div class="card-bottom">
                            <a href="#" class="btn">Detaylar</a>
                        </div>
                    </div>
                    <div class="card card-6">
                        <div class="card-head">
                            
                            <h5>Kaynak bölümü</h5>
                            <p>hasır üretimi için basın.</p>
                        </div>
                        <div class="card-bottom">
                            <a href="QRTextGenerator.php" class="btn">Detaylar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>