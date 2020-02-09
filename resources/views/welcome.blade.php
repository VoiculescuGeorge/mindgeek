<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<title>Mindgeek test</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/faqstyle.css" type="text/css" media="all" />
<link href="css/medile.css" rel='stylesheet' type='text/css' />
<link href="css/single.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/contactstyle.css" type="text/css" media="all" />

<link rel="stylesheet" href="list-css/list.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/font-awesome.min.css" />
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<link rel="stylesheet" type="text/css" href="list-css/table-style.css" />
<link rel="stylesheet" type="text/css" href="list-css/basictable.css" />
<script type="text/javascript" src="list-js/jquery.basictable.min.js"></script>
</head>

<body>
	<div class="header">
		<div class="container">
			<div class="w3layouts_logo">
				<a ><h1>One<span>Movies</span></h1></a>
			</div>
		</div>
	</div>
	<div class="faq">
		<h4 class="latest-text w3_faq_latest_text w3_latest_text">Movies List</h4>
			<div class="container">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
                                        <h4>Search Results : <span>{{ count($movies) }}</span></h4>
                                    </div>
									<table class="fold-table">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Type</th>
											<th>Cert</th>
											<th>Genres</th>
										  </tr>
										</thead>
										<tbody>

                                            @foreach ($movies as  $key=>$movie)
                                                <tr class="view">
                                                    <td>{{ $key + 1 }}</td>
                                                    <td class="w3-list-img">
                                                        @isset($movie->keyImages[0]->image)
                                                            <img src="data:image/png;base64,{{ Cache::get($movie->keyImages[0]->image) }}" alt="" />
                                                        @endisset
                                                    <span> {{ $movie->headline  }}</span></td>
                                                    <td>{{ $movie->year }}</td>
                                                    <td>{{ $movie->class }}</td>
                                                    <td class="w3-list-info"> {{ $movie->cert   }}</td>
                                                    <td class="w3-list-info">{{  $movie->genres  === null ? " " : implode(" ", $movie->genres) }}</td>
                                                </tr>
                                                <tr class="fold">
                                                    <td colspan="7">
                                                      <div class="fold-content">
                                                        <h3>Company Name</h3>
                                                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                                                        <table>
                                                          <thead>
                                                            <tr>
                                                              <th>Company name</th><th>Customer no</th><th>Customer name</th><th>Insurance no</th><th>Strategy</th><th>Start</th><th>Current</th><th>Diff</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                            <tr>
                                                              <td>Sony</td>
                                                              <td>13245</td>
                                                              <td>John Doe</td>
                                                              <td>064578</td>
                                                              <td>A, 100%</td>
                                                              <td class="cur">20000</td>
                                                              <td class="cur">33000</td>
                                                              <td class="cur">13000</td>
                                                            </tr>
                                                            <tr>
                                                              <td>Sony</td>
                                                              <td>13288</td>
                                                              <td>Claire Bennet</td>
                                                              <td>064877</td>
                                                              <td>B, 100%</td>
                                                              <td class="cur">28000</td>
                                                              <td class="cur">48000</td>
                                                              <td class="cur">20000</td>
                                                            </tr>
                                                            <tr>
                                                              <td>Sony</td>
                                                              <td>12341</td>
                                                              <td>Barry White</td>
                                                              <td>064123</td>
                                                              <td>A, 100%</td>
                                                              <td class="cur">10000</td>
                                                              <td class="cur">22000</td>
                                                              <td class="cur">12000</td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </div>
                                                    </td>
                                                  </tr>
                                            @endforeach
										</tbody>
									</table>
								</div>
							</div>

						</div>
				</div>
			</div>
	</div>
	<div class="footer">
		<div class="container">
			<div class="w3ls_footer_grid">
			</div>
			<div class="col-md-5 w3ls_footer_grid1_left">
				<p>&copy; 2020 Mindgeek Test</p>
			</div>
		</div>
	</div>
<script src="js/bootstrap.min.js"></script>
<script>
    $(function(){
        $(".fold-table tr.view").on("click", function(){
            $(this).toggleClass("open").next(".fold").toggleClass("open");
        });
    });
</script>
</body>
</html>

