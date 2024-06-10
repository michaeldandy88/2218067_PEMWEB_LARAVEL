<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PenjualanRokok</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=''>WarungRokok.</a></div>
            <div class="menu">
                <ul>
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="{{ route('shop') }}">Shop</a></li>
                </ul>
            </div>
    </nav>
    <div class="wrapper">
        <section id="home">
            <img src="https://img.freepik.com/free-vector/mysterious-mafia-man-smoking-cigarette_52683-34828.jpg?w=740&t=st=1713744523~exp=1713745123~hmac=8576661898d2843207161a516aafd89e28918ec2f9a2615e74ea3f7258954efd"/>
            <div class="kolom">
                <p class="deskripsi">Temukan Rokok Favoritmu!</p>
                <h2>Find Your Favorite Cigarete!</h2>
                <p>Ngapain Dibahas Kan Beda Kelas</p>
            </div>
        </section>
    </div>
    <center>
    <div class="slides">
        <div class="slide">
          <img src="foto/Marlboro.jpeg" alt="">
        </div>
        <div class="slide">
          <img src="foto/sampoerna.jpeg" alt="">
        </div>
        <div class="navigation">
          <a class = "prev" onclick = "plusSlides(-1)">&#10094;</a>
          <a class = "next" onclick = "plusSlides(+1)">&#10095;</a>
        </div>
      </div>
    </center>
      <script src="cr.js"></script>
</body>
</html>