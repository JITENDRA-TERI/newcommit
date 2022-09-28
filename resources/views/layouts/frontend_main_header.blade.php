<body>
<div class="wrapper">
  <div class="preloader"></div>
    <!-- Main Header Nav -->
  <header class="header-nav menu_style_home_one  navbar-scrolltofixed stricky main-menu">
    <div class="container"> 
      <!-- Ace Responsive Menu -->
      <nav> 
        <!-- Menu Toggle btn-->
        <div class="menu-toggle">
        	<img class="nav_logo_img img-fluid" src="images/header-logo.svg" alt="header-logo.svg">
          <button type="button" id="menu-btn">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
        </div>
        <a href="index.html" class="navbar_brand float-left dn-md" style="width:30%;">
					<img class="logo1 img-fluid" src="{{ asset('/') }}public/images/output-onlinepngtools.png" alt="header-logo.svg" style="width:70%;     filter: invert(0.9);" >
				
				</a> 
        <!-- Responsive Menu Structure-->
        <ul id="respMenu" class="ace-responsive-menu text-right" data-menu-style="horizontal">
          <li> <a href="#"><span class="title">Home</span></a></li>
          <li> <a href="#"><span class="title">About Us</span></a>
            <ul><li> <a href="./about-us">Who We Are</a> </li>
              
           
              
            </ul>
          </li>
     
		  
          <li> <a href="#"><span class="title">Services</span></a>
            <ul>
              <li> <a href="#"><span class="title">Agency</span></a>
                <ul>
                  <li><a href="service?scat={{ base64_encode('Residential Sales') }}">Residential Sales</a></li>
                  <li><a href="service?scat={{ base64_encode('Commercial Investment') }}">Commercial Investment</a></li>
                 
                </ul>
              </li>
             
              <li> <a href="#"><span class="title">Asset Valuation</span></a>
                <ul>
                  <li><a href="service?scat={{ base64_encode('Commercial Valuations') }}">Commercial Valuations</a></li>
                  <li><a href="service?scat={{ base64_encode('Credit and Legal Assistance') }}">Credit and Legal Assistance</a></li>
                 
                </ul>
              </li>
			   <li> <a href="#"><span class="title">Advisory</span></a>
                <ul>
                  <li><a href="service?scat={{ base64_encode('Consulting and Research') }}">Consulting and Research</a></li>
                  <li><a href="service?scat={{ base64_encode('Real Estate Consulting') }}">Real Estate Consulting</a></li>
				   <li><a href="service?scat={{ base64_encode('Find the Right investment Project') }}">Find the Right investment Project</a></li>
				   <li><a href="service?scat={{ base64_encode('Residential Valuations') }}">Residential Valuations</a></li>
				  
                 
                </ul>
              </li>
              <li><a href="service?scat={{ base64_encode('Bespoke Homes') }}">Bespoke Homes</a></li>
              <li><a href="service?scat={{ base64_encode('Property Tax Rules in Delhi') }}">Property Tax Rules in Delhi</a></li>
        
            </ul>
          </li>
		  <li><a href="./property-listing">Property Listing</a></li>
          <li><a href="./media">Media</a></li>
		   <li><a href="./testimonial">Testimonial</a></li>
		   <li><a href="./gallery">Gallery</a></li>
          <li class="list-inline-item list_c"><a href="#"><span class="flaticon-phone mr7"></span> (+88) 1990 6886</a></li>
          <li class="list-inline-item list_s"><a href="#" class="btn" data-toggle="modal" data-target="#logInModal"><span class="flaticon-user"></span></a></li>
        
        </ul>
      </nav>
    </div>
  </header>
  <div class="testdata"></div>
  