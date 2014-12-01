$(document).ready(function() {
 $(function(){  
  $('#searchButton').click(function(e){
    e.preventDefault();
    var imdbid = $('input:text[name=searchField]').val();
    var title = $('input:text[name=searchField]').val();
    var resturl = "http://www.myapifilms.com/imdb?title="+title+"&format=JSON&callback=?";
     var resturl2 = "http://www.imdbapi.com/?i=&t="+title+"&format=JSON&callback=?";
     var resturl3 =  "http://services.tvrage.com/myfeeds/search.php?key=2hKq7MeJirYd06yvLLiW&show="+title+"&callback=?"
     
    $('#info_layer').html('<center><img src="images/loading.gif" alt="loading..."></center>');
    
    $.ajax({
      url: resturl3,
      dataType: 'xml',
      success: function(data){   
		console.log(data);
        var title  = data.Title;
        var genre  = data.Genre;
        var poster = data.Poster;
        var plot   = data.Plot;
        var rlseyr = data.Year;
        var rating   = data.imdbRating;
        var released = data.Released;
        var actors = data.Actors;
        
        var cdiv = $('#info_layer');
        
        var thehtml = "<h2 style=\"vertical-align:middle\">"+title+"</h2> </br></br>";
        thehtml = thehtml + "<h2 style=\"vertical-align:middle\">"+title+"</h2> </br></br>";
        thehtml = thehtml + "<img src=\""+poster+"\" class=\"floatright\">";
        thehtml = thehtml + "<p class=\"genre\">"+genre+" - first aired in "+rlseyr+"</p>";
        thehtml = thehtml + "<p>"+plot+"</p>";
        thehtml = thehtml + "<p> Cast: "+actors+"</p>";
        thehtml = thehtml + "<p> IMDB Rating: "+rating+"</p>";
        thehtml = thehtml + "<p> Released on: "+released+"</p>";
        
        cdiv.html(thehtml);
      }
    });
  });
 });
});


