<h2>Cart.</h2>

{% if items is empty %}
    <div class="container">
        <h2> Add some items.</h2>
    </div>

{% else %}



    <form method="POST" name='myForm' id='Form' action="" >

        <div class="form-group">

            <table class="table text-center">
                <thead class='text-center'>
                    <tr >
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Item</th>
                        <th scope="col" class="text-center">Quantity</th>
                        <th scope="col" class="text-center">Price (€)</th>
                        <th scope="col" class="text-center"></th>



                    </tr>
                </thead>
                <tbody>
                    {% set total=0 %}
                    {%  for item in items %}

                        <tr>
                            <th scope="row">{{loop.index}}</th>
                            <td style="background-color: #fff;color: #000">{{item["item"]}}</td>
                            <td>{{ quantity_format(item["quantity"]) }}</td>                       
                            <td>{{ number_format(item["price"]) }}</td>
                            <td >
                                <a href='{{url("cart/delete/"~item["id"])}}'>
                                    <span  class="text-center fa fa-trash fa-2x" style="background-color: #fff;color: red" ></span>
                                </a>

                            </td>

                            {% set total=total+item["price"] %}
                        </tr>

                    {% endfor %}

                    <tr>

                        <th colspan="4" >Total (€)</th>
                        <td  >{{number_format(total)}}</td>

                    </tr>

                </tbody>
            </table>


            {% if isLogin %}
                </br>
                <p><button type="submit" class="btn btn-primary">Submit</button></p>
            {% endif %}

            <div class="container">
                </br>
                {{ flashSession.output() }}
            </div>

        </div>


    </form>
{% endif %}

