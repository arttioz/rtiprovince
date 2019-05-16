
<section id="blog" class="section">
      <!-- Container Starts -->
      <div class="container">  
   
        <!-- Row Starts -->
        <div class="row">  
          <div class="col-md-9">

            @foreach( $posts as $post)        
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <!-- Blog Item Starts -->
                <div class="blog-item-wrapper wow fadeIn animated" data-wow-delay="0.3s" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                  <div class="blog-item-img">
                    <a href="{{ url('posts/'.$post->alias) }}">
                      @if(file_exists('./uploads/images/posts/'.$post->image) && $post->image !='' )
                      <img src="{{ asset('uploads/images/posts/'.$post->image) }}" alt="" class="img-responisve">
                      @else
                      <img src="{{ asset('uploads/images/no-image.png') }}" alt="" class="img-responisve">
                      @endif
                    </a>   
                  </div>
                  <div class="blog-item-text">
                    <h3 class="small-title"><a href="{{ url('posts/'.$post->alias) }}">{{ $post->title }}</a></h3>
                    <p>
                      Lorem ipsum dolor sit amet, adipisicing elit. Eos rerum dolorum, est voluptatem modi accusantium perspiciatis ...
                    </p>
                    <div class="blog-one-footer">
                      <a href="{{ url('posts/'.$post->alias) }}">Read More</a>
                     
                      <a href="#"><i class="icon-bubbles"></i> {{ $post->comments }} Comments</a>                  
                    </div>
                  </div>
                </div><!-- Blog Item Wrapper Ends-->
              </div>
              @endforeach
          </div>
          
          <div class="col-md-3">
            <h3> Categories </h3>
            <ul class="nav nav-list">
            <?php $categories = PostHelpers::cloudtags();
            foreach($categories as $cat) { ?>
              <li><a href="{{  url('posts?label='.$cat['tags']) }}"><i class="fa fa-angle-right" aria-hidden="true"></i> {{ ucwords($cat['tags']) }} <span class="pull-right badge label-primary">{{ $cat['size'] }}</span></a> </li>
            <?php } ?>
            </ul>
     
          </div>    

        </div><!-- Row Ends -->
        <div class="row text-center">
        {!!  $posts->links() !!}
        </div>
      </div><!-- Container Ends -->
    </section>

    <script type="text/javascript">
      $(function(){
        $("ul.pagination li a").addClass("page-link")
      })
    </script>