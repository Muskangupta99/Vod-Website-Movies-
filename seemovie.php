<?php
    $link= $_GET['link'];
	$name= $_GET['id'];
    
	
	
	
?>

<!doctype html> 
<head>
<style>
.center-div
{
       margin: auto;
  width: 60%;
  background-color:#DCDCDC;
  padding: 10px;
  background: rgba(200, 54, 54, 0.5);
}
.center {
  text-align: center;
  text-color:white;
}
.outer{
	background-color:#696969;
}

.leftbox { 
                float:left;  
                background:Red; 
                width:25%; 
                height:280px; 
            } 
            .middlebox{ 
                float:left;  
                background:Green; 
                width:50%; 
                height:280px; 
            } 
img {
	padding:50px;
    float:left;
}
h3 {
    float:right;
}

body {
  background-image: url("back.jpg");
}
</style>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 </head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href=" ml.php">Home/Search</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
<br></br>
<div class="center-div">
<div class="center">
<video width="880" height="450" controls>
<source src="<?php echo $link ?>" type="video/mp4">
Your browser does not support the video tag.
</video>
</div>
<br></br>
<div id="answer" style="color:white"></div>
</div>
</body>



 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script> 
<script> var data;

var q="<?php echo $name ; ?>";
getanswer(q);
function getanswer(q){
	var mid;
$.get("https://www.omdbapi.com/?s="+q+"&apikey=fa463fa", function(rawdata){
var rawstring =JSON.stringify(rawdata);
data =JSON.parse(rawstring);
console.log(data);
var title = data.Search[0].Title;
var year = data.Search[0].Type; 
var imdburl="https://www.imdb.com/title/"+data.Search[0].imdbID+"/";
var mid=data.Search[0].imdbID;
var posterurl =data.Search[0].Poster;
$.get("https://www.omdbapi.com/?i="+mid+"&apikey=fa463fa", function(rawdata){
	var rawstring =JSON.stringify(rawdata);
data =JSON.parse(rawstring);
console.log(data);
document.getElementById('answer').innerHTML="<img src= '"+posterurl+"'>"+"<br><br><h5>Title : "+data.Title+"<br></br>Year Released : "+data.Year+"<br></br>Plot : "+data.Plot+"<br></br>Director/s : "+data.Director+"<br></br>Actors : "+data.Actors+"<br></br>Imdb Rating : "+data.imdbRating+"<br><br><br><br><br><br><br></h5>";
	
});
axios.get("https://www.omdbapi.com/?i="+mid+"&apikey=fa463fa").then((response => { console.log(response);}))

}); }


</script>