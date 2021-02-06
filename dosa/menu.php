<!-- navbar -->
<nav class="navbar navbar-info bg-info">
  <div class="container">
    <ul class="nav navbar-nav">
      <li><a href="index.php"><i class="fa fa-home"></i> HOME</a></li>
          <li><a href="keranjang.php"> <i class="fa fa-shopping-cart "></i>Keranjang</a></li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Kategori <i class="fa fa-sort-down"></i>
              </a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href='ayam_kampung.php'>Ayam Kampung</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="ayam_broiler.php">Ayam Broiler</a>
          <div class="dropdown-divider"></div>
          </div>
          </li>
          <li><a href="tentang.php"> <i class="fa fa-cog "></i>Tentang</a></li>
          <?php 
          if (isset($_SESSION["pelanggan"])) :  ?>


              <li><a href="riwayat.php"><i class="fa fa-list"></i> Riwayat Belanja</a></li> 

              <li><a href="Logout.php"><i class="fa fa-sign-out"></i>Logout</a></li> 
              
              <?php else :  ?>
              <li><a href="Login.php "><i class="fa fa-sign-in"></i>Login Pelanggan</a></li>

              <?php endif ?>
               <li><a href="CheckOut.php"><i class="fa fa-share"></i>CheckOut</a></li>      
    </ul>    
    <form action="pencarian.php" method="get" class="navbar-form navbar-right">
    <input type="text" class="form-control" name="keyword" placeholder="Cari Ayam...">
    <button type="submit" class="btn btn-primary search" aria-label="Left Align">
          <i class="fa fa-search" aria-hidden="true"> </i>
    </button>
    </form>
  </div>
</nav>