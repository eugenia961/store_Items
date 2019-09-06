<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>StoreItems</title>


        <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.5.0/css/all.css" 
              integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


        {{ assets.outputCss() }}

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">



    </head>

    <body>

        <header id="home">

            <div class="col-sm-3 ">
                <div class="logo">
                    <a href="#">{{ image("src":"img/shop.jpg") }}</a>
                </div>
            </div>



            <div class="col-sm-12 text-right">


                <ul class="nav navbar navbar-right d-flex d-inline-flex ">

                    <li class="nav-item d-inline-flex  align-items-center mr-2"><a class="nav-link d-inline-flex" style="color: #000; font-size: 15px"  href="{{ url("index/0") }}"><i class="fa fa-home mr-2" aria-hidden="true"></i>Home</a></li>

                    <li class="nav-item d-inline-flex  align-items-center mr-2"><a class="nav-link d-inline-flex" style="color: #000; font-size: 15px"  href="{{url("cart/show")}}"><i class="fa fa-shopping-cart mr-2" aria-hidden="true"></i>Cart ({{quantity_format(cartItems)}})</a></li>

                    {% if register==false %}

                        {%if isLogin%}

                            <li class="nav-item d-inline-flex  align-items-center mr-2"><a class="nav-link d-inline-flex" style="color: #000; font-size: 15px" href="{{ url ("cart/user") }}"><i class="fa fa-history mr-2" aria-hidden="true"></i>Orders</a></li>
                            <li class="nav-item d-inline-flex  align-items-center mr-2"><a class="nav-link d-inline-flex" style="color: #000; font-size: 15px" href=" {{ url ("user/logout") }}"><i class="fa fa-sign-out mr-2" aria-hidden="true"></i>Logout</a></li>
                            <li class="nav-item d-inline-flex  align-items-center mr-2"><a class="nav-link d-inline-flex" style="color: #000; font-size: 15px" href="{{ url ("user/info/"~idUser) }}"><i class="fa fa-user-o mr-2" aria-hidden="true"></i>Hi {{name}}</a></li>


                        {% else %}

                            <li class="nav-item d-inline-flex  align-items-center mr-2"><a class=" nav-link d-inline-flex" style="color: #000; font-size: 15px" href="{{ url ("user/login") }}"><i class="fa fa-user-o mr-2" aria-hidden="true"></i>Login</a></li>
                            <li class="nav-item d-inline-flex  align-items-center mr-2"><a class="nav-link d-inline-flex" style="color: #000; font-size: 15px" href="{{ url("user/register") }}" ><i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>Sign Up</a></li>

                        {% endif %}

                    {% endif %}


                </ul>

            </div>



        </header>

        <!-- jQuery first, then Popper.js, and then Bootstrap's JavaScript -->

        {{ javascriptInclude('//code.jquery.com/jquery-1.12.4.js', false) }}
        {{ javascriptInclude('//code.jquery.com/ui/1.12.1/jquery-ui.js', false) }}

        {{ javascriptInclude('//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', false) }}
        {{ javascriptInclude('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js', false) }}

        {{ assets.outputJs() }}
        <div class="container">

            {{ content() }}

        </div>







    </body>
</html>
