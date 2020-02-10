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
									<table class="fold">
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
														<h3>Movie info</h4>
														<hr>
														<div class="col-md-12">
															<h4>Body</h4>
															<p> {{ $movie->body }}</p>
															<hr>
														</div>	
														<div class="col-md-6">
															<h4>Synopsis</h4>
															<p> {{ $movie->synopsis }}</p>
														</div>
														
														<div class="col-md-6">
															<h4>Quote</h4>
															<p>{{ $movie->quote }}</p>
														</div>		
														@isset($movie->viewingWindow)
															<div class="col-md-12 text-left">
																<hr>
																<h4>Viewing Window</h4>
																<h5>Start Date: {{ $movie->viewingWindow->startDate }}</h5>
																<h5>End Date: {{ $movie->viewingWindow->endDate }}</h5>
																<h5>Way to Watch: {{ $movie->viewingWindow->wayToWatch }}</h5>
																<h5>Title: {{ $movie->viewingWindow->title }}</h5>
															</div>
														@endisset

														@isset($movie->keyImages)
															<div class="col-md-12 text-left">
																<hr>
																<h4 style="margin-bottom: 25px;">Key Art Images</h4>
																@foreach ($movie->keyImages as $keyImage)
																	@isset($keyImage->image)
																		<div class="col-md-4" style="margin-bottom: 10px;">
																			<div class="thumbnail">
																				<img  src="data:image/png;base64,{{  Cache::get($keyImage->image)   }}" />
																			</div>
																		</div>
																	@endisset
																@endforeach	
															</div>
														@endisset

														@isset($movie->cardimages)
															<div class="col-md-12 text-left">
																<hr>
																<h4 style="margin-bottom: 25px;">Card Images</h4>
																@foreach ($movie->cardimages as $cardImage)
																	@isset($cardImage->image)
																		<div class="col-md-4" style="margin-bottom: 10px;">
																			<div class="thumbnail">
																				<img  src="data:image/png;base64,{{  Cache::get($cardImage->image)   }}" />
																			</div>
																		</div>
																	@endisset
																@endforeach	
															</div>
														@endisset
														@isset($movie->galleries)
															<div class="col-md-12 text-left">
																<hr>
																<h4 style="margin-bottom: 25px;">Galleries</h4>
																@foreach ($movie->galleries as $gallery)
																	<h5>Title: {{ $gallery->title }}</h5>
																	@isset($gallery->thumbnailUrl)
																		<h5>thumbnailUrl: {{ $gallery->thumbnailUrl }}</h5>
																	@endisset
																	@isset($gallery->image)
																		<div class="col-md-4" style="margin-bottom: 10px;">
																			<div class="thumbnail">
																				<img  src="data:image/png;base64,{{  Cache::get($cardImage->image)   }}" />
																			</div>
																		</div>
																	@endisset
																@endforeach	
															</div>
														@endisset

														@isset($movie->videos)
															<div class="col-md-12 text-left">
																<hr>
																<h4 style="margin-bottom: 25px;">Videos</h4>
																@foreach ($movie->videos as $video)
																	<div class="col-md-6" style="margin-bottom: 10px;">
																		<h5>Title: {{ $video->title }}</h5>
																		<h5>type: {{ $video->type }}</h5>
																		<h5>Url: <a href="{{ $video->url }}">Click here</a></h5>
																		@isset($video->thumbnailUrl)
																			<h5>thumbnailUrl: {{ $video->thumbnailUrl }}</h5>
																		@endisset
																		@isset($video->image)
																			<div class="thumbnail">
																				<img  src="data:image/png;base64,{{  Cache::get($video->image)   }}" />
																			</div>
																		@endisset
																		@isset($video->alternatives)
																			@foreach (unserialize($video->alternatives) as$alternative)
																				<h5>Alternatives {{ $alternative->quality }} quality: <a href="{{ $alternative->url }}">Click here </a></h5>
																			@endforeach
																		@endisset
																	</div>
																@endforeach	
															</div>
														@endisset
														
														<div class="col-md-12">
															<hr>
															@isset($movie->headline)
																<div class="col-md-2 text-right">Headline</div>
																<div class="col-md-10">{{ $movie->headline }} </div>
															@endisset
															@isset($movie->cert)
																<div class="col-md-2 text-right">Cert</div>
																<div class="col-md-10">{{ $movie->cert }} </div>
															@endisset
															@isset($movie->duration)
																<div class="col-md-2 text-right">Duration</div>
																<div class="col-md-10">{{  $movie->duration }} seconds</div>
															@endisset	
															@isset($movie->directors)
																<div class="col-md-2 text-right">Directors</div>
																<div class="col-md-10">{{ implode(", ", $movie->getRelationshipData('directors', 'name')) }}</div>
															@endisset
															@isset($movie->cast)
																<div class="col-md-2 text-right">Cast</div>
																<div class="col-md-10">{{ implode(", ", $movie->getRelationshipData('cast', 'name')) }}</div>
															@endisset
															
															@isset($movie->class)
																<div class="col-md-2 text-right">Class</div>
																<div class="col-md-10">{{ $movie->class }} </div>
															@endisset
															@isset($movie->reviewAuthor)
																<div class="col-md-2 text-right">ReviewAuthor</div>
																<div class="col-md-10">{{ $movie->reviewAuthor }} </div>
															@endisset
															@isset($movie->year)	
																<div class="col-md-2 text-right">Year</div>
																<div class="col-md-10">{{ $movie->year }} </div>
															@endisset
															@isset($movie->genres)	
																<div class="col-md-2 text-right">Genres</div>
																<div class="col-md-10">{{ implode(" ", $movie->genres) }} </div>
															@endisset
															@isset($movie->url)	
																<div class="col-md-2 text-right">Url</div>
																<div class="col-md-10"><a target="target="_blank href="{{ $movie->url }}">{{$movie->url}}</a> </div>
															@endisset
															@isset($movie->skyGoUrl)	
																<div class="col-md-2 text-right">skyGoUrl</div>
															<div class="col-md-10"><a target="target="_blank href="{{ $movie->skyGoUrl }}">Go to url</a> </div>
															@endisset
														</div>
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

