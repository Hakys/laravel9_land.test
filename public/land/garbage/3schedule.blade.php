<div>
    <style>
        .carousel-inner {
            padding: 1em;
            }
        .card {
            margin: 0 0.5em;
            box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
            border: none;
        }
        .carousel-control-prev,
        .carousel-control-next {
            background-color: #e1e1e1;
            width: 6vh;
            height: 6vh;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }
        @media (min-width:768px){
            .carousel-item{
                display: block;
                margin-right: 0;
                flex: 0 0 calc(100%/3);
            }
            .carousel-inner{
                padding: 1em;
            }
            .card{
                max-width: 100%;
                height: 13em;
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 0 .5em;
            }
        }
        .carousel-control-prev, .carousel-control-next{
            width: 6vh;
            height: 6vh;
            background-color: #e1e1e1;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: .5;
        }
        .carousel-control-prev:hover, .carousel-control-next:hover{
            opacity: .8;
        }
    </style>
    <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Card title 1</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
          </div>
          <div class="carousel-item">
            <div class="card" >
                <div class="card-body">
                  <h5 class="card-title">Card title 2</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
          </div>
          <div class="carousel-item">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Card title 3</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
          </div>
          <div class="carousel-item">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Card title 4</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
          </div>
          <div class="carousel-item">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Card title 5</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <script>
        const multipleItemCarousel = document.querySelector('#carouselExampleControls');
        if(windows.matchMedia("(min-width:768px)").matches){
            
            var carouselWidth = $('.carousel-inner')[0].scrollWidth;
            var cardWidth = $('.carousel-item').width();
            var scrollPosition = 0;
            $('.carousel-control-next').on('click', function(){
                if(scrollPosition < (carouselWidth - (cardWidth*4))){
                    console.log('next');
                    scrollPosition = scrollPosition + cardWidth;
                    $('.carousel-inner').animate({scrollLeft: scrollPosition},600);
                }
            });
            $('.carousel-control-prev').on('click', function(){
                if(scrollPosition > 0){
                    console.log('prev');
                    scrollPosition = scrollPosition - cardWidth;
                    $('.carousel-inner').animate({scrollLeft: scrollPosition},600);
                }
            });
        
            var carousel = new bootstrap.Carousel(multipleItemCarousel, {
                interval: false,
                wrap: false,
            });
        }else{
            $(multipleItemCarousel).addClass('slide');
        }
       
      </script>
</div>