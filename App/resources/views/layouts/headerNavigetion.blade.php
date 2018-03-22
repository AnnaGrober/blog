
   <div class="  col-xl-12  main " id="main" >
      <div id="mySidenav" class="sidenav">
          <a href="#">About</a>
          <a href="#">Services</a>
          <a href="#">Clients</a>
          <a href="#">Contact</a>
      </div>
      <!-- Use any element to open the sidenav -->


    <nav class="navbar navbar-expand-xl navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-dark navbar-default  fixed-top navMenu">

        <span style="font-size:30px;cursor:pointer" id="m" onclick="openNav()">&#9776;</span>

      <a class="nav-link active" href="#">
      	<img class="logo" src="th.png" alt="logo">
      </a>


      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      	<span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav mr-auto">
          <li class="nav-item forum">
            <a class="nav-link" href="#">Форум</a>
          </li>
           <li class="nav-item ">
          <form class="form-inline ">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-info" type="submit">Search</button>
        </form>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Личный кабинет</a>
          </li>
          <li class="nav-item reg">
            <a class="nav-link" href="#">Регистрация</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#VoidModal" href="#">Вход</a>
          </li>

        </ul>

      </div>


    </nav>
       <div class="modal fade" id="VoidModal" tabindex="-1" role="dialog" aria-labelledy="VoidModal" aria-hidden="true">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="VoidModalLable"> Добро пожаловать! </h5>
                       <button class="close" type="button" data-dismiss="modal" aria-lable="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <div class="modal-body">
                       <div class="container">
                           <form>
                               <div class="form-froup">
                                   <div class="form-row">

                                       <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                           <lable for="VoidInputEmail"> Введите ваш email </lable>
                                       </div>
                                       <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                           <input type="email" class="form-control" id="VoidInputEmail" aria-describdby="emailHalp" placeholder="Email" required="true"> 								</div>
                                   </div>
                               </div><br>
                               <div class="form-froup">
                                   <div class="form-row">

                                       <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                           <lable for="VoidInputPass">Введите ваш пароль </lable>
                                       </div>
                                       <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                           <input type="password" class="form-control" id="VoidInputPass"  placeholder="Password" required="true">
                                       </div>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
                   <div class="modal-footer">
                       <button class="btn btn-primery">Отправить</button>
                       <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                   </div>
               </div>

           </div>


       </div>
       <script>
           /* Set the width of the side navigation to 250px */
           function openNav() {

               if (document.getElementById("mySidenav").style.width === "250px"){
                   document.getElementById("mySidenav").style.width = "0" ;
               }

               else
               {document.getElementById("mySidenav").style.width = "250px";


               }
           }
           /* Set the width of the side navigation to 0 */
       </script>