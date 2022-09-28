    <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="">
                 
                  <div class="dot-indicator bg-success"></div>
                </div>
               
                <div class="icon-container">
                  <i class="icon-bubbles"></i>
                  <div class="dot-indicator bg-danger"></div>
                </div>
              </a>
            </li>
         
       
         
            <li class="nav-item" style="margin-top:10px;">
              <a class="nav-link"  href="{{ route('testimonial') }}">
                <span class="menu-title">Testimonial</span>
                <i class="icon-layers menu-icon"></i>
              </a>
         
            </li>
			 <li class="nav-item" style="margin-top:10px;">
              <a class="nav-link"  href="{{ route('view-slider') }}">
                <span class="menu-title">Slider</span>
                <i class="icon-layers menu-icon"></i>
              </a>
         
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('Services') }}">
                <span class="menu-title">Services</span>
                <i class="icon-globe menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('media') }}">
                <span class="menu-title">Our Media</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('listing-properties') }}">
                <span class="menu-title">Listing Properties</span>
                <i class="icon-chart menu-icon"></i>
              </a>
            </li>
			
			 <li class="nav-item">
              <a class="nav-link" href="{{ route('teams') }}">
                <span class="menu-title">Team</span>
                <i class="icon-people menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">About Section</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('about-us') }}">About us</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ ('gallery') }}">Gallery</a></li>
                </ul>
              </div>
            </li>
          
           
          </ul>
        </nav>
		
		<style>
		a:hover {
		color: #38ce3c !important;
		text-decoration: underline !important;
      }

		a {
			color: #38ce3c !important;
			text-decoration: none !important;
			background-color: transparent !important;
		}
		.sidebar .nav .nav-item .nav-link .menu-title {
   
            text-decoration: none !important;
		}
		.nav-link:hover
		{
			 text-decoration: none !important;
		}
		</style>