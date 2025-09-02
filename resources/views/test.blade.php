<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>About LiteManage</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
       <title-content class="title-content">
           <a class="titletext" href="main.html">
               LiteManage
           </a>
       </title-content>
       <nav-content>
           <a class="navlinks" href="{{ url('/dashboard') }}" target="_blank"> Dashboard </a>
           <a class="navlinks" href="{{ url('/sales') }}" target="_blank"> Sales </a>
           <a class="navlinks" href="{{ url('/sale_items') }}" target="_blank"> Receipts </a>
           <a class="navlinks" href="{{ url('/customers') }}" target="_blank"> Customers </a>
           <a class="navlinks" href="{{ url('/products') }}" target="_blank"> Products </a>
           <a class="navlinks" href="{{ url('/about') }}"> About </a>
       </nav-content>
       <tab-content>
           <about-content>
              <P class="aboutLME-headtop">
                  TEST
              </P>
           </about-content>
       </tab-content>
    </body>
</html>
