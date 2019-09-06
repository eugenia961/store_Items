<section id="contact" class="section-space-padding">
    <div class="container">
    </div>
</section>

<h2>Items.</h2>



<div class="row">
    <div class="col-sm-12" >

        {% if itemsPages.items is empty %}

            <div class="alert alert-danger" role="alert">

                Items not found

            </div>



        {% else %}

       

         
            {% for item in itemsPages.items %}


                {% if loop.index ==1 %}

                    <div class="row">

                    {%endif%}

                    <div class="col-sm-3">
                        <div class="card border-primary mb-3" >
                            <div class="card-body">
                                <div class="card-header">
                                    <h5 class="card-title"> {{item.item()}}</h5>
                                </div>
                                <div class="card-body text-primary">

                                    <h5 class="card-title">Price: {{ number_format(item.price()) }}</h5>

                                    <a href="{{ url("cart/add/"~  item.id() ~  "/"~  page) }}" class="card-link card-text" style=" font-size:15px;"><span class="fas fa-cart-plus"></span> Add</a>


                                </div>
                            </div>
                        </div>
                    </div>



                    {% if loop.index % 3== 0 and  loop.index !=1 %}

                    </div>
                    <p></p>
                    <div class="row">

                    {%endif%}

                {% endfor %}
            </div>
            
            
            <div class="row">
                <nav aria-label="Page navigation">
                    <ul class="pagination" id="pagination">

                        <li class="page-item"><a class="page-link" href='{{ url("index/0") }}'>First</a></li>
                        <li class="page-item"><a class="page-link" href='{{ url("index/"~ itemsPages.before)}}'>Previous</a></li>

                        {% set maxPage=page+3%}

                        {% for i in page..maxPage%}

                            {% if itemsPages.total_pages >= i  %}

                                <li class="page-item"><a class="page-link" href='{{ url("index/"~ i)}}'>{{i}}</a></li>

                            {% endif %}    

                        {% endfor %}


                        <li class="page-item"><a class="page-link" href='{{url("index/"~ itemsPages.next)}}'>Next</a></li>
                        <li class="page-item"><a class="page-link" href='{{url("index/"~ itemsPages.last)}}'>...{{itemsPages.total_pages}}</a></li>

                    </ul>
                </nav>
            </div>
        {% endif %}



    </div>
</div>





