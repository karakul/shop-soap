 <head>
      <div class="registration slidebox col-md-8 col-sm-12 col-xs-12">
                    <ul>

          <?php if($_SESSION['auth'] == 'yes_auth'){ ?>
                                
                                <li><a id="logout" class="exit hvr-float-shadow">Выйти</a></li>
                                <li><a href="profil.php" class="lich-kab hvr-float-shadow">Личный кабинет</a></li>
                                <li><a href="cart.php?action=oneclick" class="hvr-float-shadow"><i class="cart fa fa-shopping-cart fa-1x" aria-hidden="true"></i><p class="cart-menu"></p></a></li>
                                <li><a href="favourites.php" class="hvr-float-shadow"><i class="star fa fa-star-o" aria-hidden="true"></i><p>1</p></a></li>
                                <li>
                                  <form onsubmit="submitFn(this, event);">
                                      <div class="search-wrapper hvr-float-shadow">
                                          <div class="input-holder">
                                              <input type="text" class="search-input" name="q" placeholder="Введите текст" />
                                              <button class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
                                          </div>
                                          <span class="close" onclick="searchToggle(this, event);"></span>
                                          <div class="result-container">

                                          </div>
                                      </div>
                                  </form>
                                </li>
                              
          <?php }else{ ?>
                                    
                                    <li><a class="vhod hvr-float-shadow">Вход</a></li>
                                    <li><a class="reg hvr-float-shadow">Регистрация</a></li>
                                    <li><a href="cart.php?action=oneclick" class="hvr-float-shadow"><i class="cart fa fa-shopping-cart fa-1x" aria-hidden="true"></i><p class="cart-menu"></p></a></li>
                                     <li>
                                  <form onsubmit="submitFn(this, event);">
                                      <div class="search-wrapper hvr-float-shadow">
                                          <div class="input-holder">
                                              <input type="text" class="search-input" placeholder="Введите текст" />
                                              <button class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
                                          </div>
                                          <span class="close" onclick="searchToggle(this, event);"></span>
                                          <div class="result-container">

                                          </div>
                                      </div>
                                  </form>
                                </li>
          <?php } ?>
                        
                    </ul>
                </div>






       <div class="container">
           <div class="row">
            
                <div class="col-md-4">
                  <div class="logo"> 
                      <a href="index.php"><p class="text"><span>soap-shop.net</span></p></a>
                  </div>
                </div>
                <div class="registration col-md-8 col-sm-12 col-xs-12">
                    <ul>

          <?php if($_SESSION['auth'] == 'yes_auth'){ ?>
                                
                                <li><a id="logout" class="exit hvr-float-shadow">Выйти</a></li>
                                <li><a href="profil.php" class="lich-kab hvr-float-shadow">Личный кабинет</a></li>
                                <li><a href="cart.php?action=oneclick" class="hvr-float-shadow"><i class="cart cart-menu fa fa-shopping-cart fa-1x" aria-hidden="true"></i><p class="cart-menu1"></p></a></li>
                                <li><a href="favourites.php" class="hvr-float-shadow"><i class="star fa fa-star-o" aria-hidden="true"></i><p>1</p></a></li>
                                <li>
                                  <form onsubmit="submitFn(this, event);">
                                      <div class="search-wrapper hvr-float-shadow">
                                          <div class="input-holder">
                                              <input type="text" class="search-input" name="q" placeholder="Введите текст" />
                                              <button class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
                                          </div>
                                          <span class="close" onclick="searchToggle(this, event);"></span>
                                          <div class="result-container">

                                          </div>
                                      </div>
                                  </form>
                                </li>
                               
          <?php }else{ ?>
                                    
                                    <li><a class="vhod hvr-float-shadow">Вход</a></li>
                                    <li><a class="reg hvr-float-shadow">Регистрация</a></li>
                                    <li><a href="cart.php?action=oneclick" class="hvr-float-shadow"><i class="cart fa fa-shopping-cart fa-1x" aria-hidden="true"></i><p class="cart-menu"></p></a></li>
                                     <li>
                                  <form onsubmit="submitFn(this, event);">
                                      <div class="search-wrapper hvr-float-shadow">
                                          <div class="input-holder">
                                              <input type="text" class="search-input" placeholder="Введите текст" />
                                              <button class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
                                          </div>
                                          <span class="close" onclick="searchToggle(this, event);"></span>
                                          <div class="result-container">

                                          </div>
                                      </div>
                                  </form>
                                </li>
                            
          <?php } ?>
                        
                    </ul>
                </div>
                <div class="header-block-menu col-md-12 col-sm-12 col-xs-12">
                   <ul>
                      <li><a href="index.php" class="hvr-float-shadow"><i class="fa fa-home" aria-hidden="true"></i> Главная</a></li>
                      <li><a href="#" class="hvr-float-shadow"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Новости</a></li>
                      <li><a href="#" class="hvr-float-shadow"><i class="fa fa-percent" aria-hidden="true"></i> Акции</a></li>
                  </ul>
                </div>    
              </div>
           </div>
  
       