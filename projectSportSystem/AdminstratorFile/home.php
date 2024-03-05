 <?php
  session_start();
  // checking the user loggedIn
  if (!isset($_SESSION['loggedin'])) {
    echo "You need to login first!";
    header('refresh:2;url=login.php');
    exit();
  }
  ?>
 <!DOCTYPE html>
 <html>

 <head>
   <meta charset="utf-8">
   <title>Home Page</title>
   <link href="style/home.css" rel="stylesheet" type="text/css">
   <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
   <script src='https://use.fontawesome.com/releases/v5.0.8/js/all.js'></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
 </head>
 </head>

 <body class="sidebar-is-reduced">
   <header class="l-header">
     <div class="l-header__inner clearfix">
       <div class="c-header-icon js-hamburger">
         <div class="hamburger-toggle"><span class="bar-top"></span><span class="bar-mid"></span><span class="bar-bot"></span></div>
       </div>
       <div class="c-header-icon has-dropdown"><span class="c-badge c-badge--red c-badge--header-icon animated swing">Logged</span><i class="fa fa-unlock"></i>
         <div class="c-dropdown c-dropdown--notifications">
           <div class="c-dropdown__header"></div>
           <div class="c-dropdown__content"></div>
         </div>
       </div>
       <form action="search.php" method="POST" style="display: flex; justify-content: center; margin-left: 10px;">
         <div class="c-search" style="display: flex;">
           <input class="c-search__input u-input" placeholder="Search..." type="text" name="search" style="padding: 10px; border: none; border-radius: 5px 0 0 5px; box-shadow: 0 0 0 2px #fff inset; width: 300px;">
           <button class="c-search__button u-btn" name="submit" style="background-color: #2ecc71; color: #fff; padding: 10px 20px; border: none; border-radius: 0 5px 5px 0; cursor: pointer;"><i class="fa fa-search"></i></button>
         </div>
       </form>





       <div class="header-icons-group">
         <div class="c-header-icon basket"><span class="c-badge c-badge--blue c-badge--header-icon animated swing">Admin logout</span><i class="fa fa-arrow-right"></i></div>
         <div class="c-header-icon logout"><a href="logout.php"><i class="fa fa-power-off"></i></a></div>
       </div>
     </div>
   </header>
   <div class="l-sidebar">
     <div class="logo">
       <div class="logo__txt">Admin</div>
     </div>
     <div class="l-sidebar__content">
       <nav class="c-menu js-menu">
         <ul class="u-list">
           <li class="c-menu__item is-active" data-toggle="tooltip" title="participants">
             <a href="AdminCRUD/manageUser.php" style="text-decoration: none;">
               <div class="c-menu__item__inner"><i class="fa fa-users"></i>
                 <div class="c-menu-item__title"><span>Participants</span></div>
               </div>
             </a>
           </li>

           <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Events">
             <a href="newcategory.php" style="text-decoration: none;">
               <div class="c-menu__item__inner"><i class="fa fa-calendar-check"></i>
                 <div class="c-menu-item__title"><span>Events</span></div>
               </div>
             </a>
           </li>

         </ul>
       </nav>
     </div>
   </div>
 </body>
 <main class="l-main">
   <div class="content-wrapper content-wrapper--with-bg">
     <h1 class="page-title">Dashboard</h1>
     <div class="page-content">Welcome back, <em><?= $_SESSION['name'] ?>!</em></div>
   </div>
 </main>
 <!-- partial -->

 <script>
   let Dashboard = (() => {
     let global = {
       tooltipOptions: {
         placement: "right"
       },

       menuClass: ".c-menu"
     };


     let menuChangeActive = el => {
       let hasSubmenu = $(el).hasClass("has-submenu");
       $(global.menuClass + " .is-active").removeClass("is-active");
       $(el).addClass("is-active");

       if (hasSubmenu) {
         $(el).find("ul").slideDown();
       }
     };

     let sidebarChangeWidth = () => {
       let $menuItemsTitle = $("li .menu-item__title");

       $("body").toggleClass("sidebar-is-reduced sidebar-is-expanded");
       $(".hamburger-toggle").toggleClass("is-opened");

       if ($("body").hasClass("sidebar-is-expanded")) {
         $('[data-toggle="tooltip"]').tooltip("destroy");
       } else {
         $('[data-toggle="tooltip"]').tooltip(global.tooltipOptions);
       }

     };

     return {
       init: () => {
         $(".js-hamburger").on("click", sidebarChangeWidth);

         $(".js-menu li").on("click", e => {
           menuChangeActive(e.currentTarget);
         });

         $('[data-toggle="tooltip"]').tooltip(global.tooltipOptions);
       }
     };

   })();

   Dashboard.init();
 </script>

 </body>

 </html>