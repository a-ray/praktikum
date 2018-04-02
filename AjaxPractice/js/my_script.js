$(document).ready(function(){
	
	$("#tom").click(function(){
		doAjax();
	});
	
});

var artists = [];
var titles = [];
var urls = [];
var currentId = 0;

function playSong(id){
	$("#audio source").attr("src",urls[id]);
	$("#audio").get(0).load();
	$("#audio").get(0).play();
	
	$("#id"+currentId).attr("src", "images/play.png");
	currentId = id;
	$("#id"+currentId).attr("src", "images/pause.png");
	
	$("#audio").bind('ended', function(){
		$("#id"+currentId).attr("src", "images/play.png");
	});
}

function doAjax(){
	
	function gagal(){
		alert("ajax request fails!");
	}
	
	function berhasil(xml){
			
		$("#albums").html("");				
		
		$("#albums").append("<table border=1><th>No</th><th>Artists</th><th>Titles</th><th>Urls</th><th>Media</th>");
		
		$(xml).find("song").each(function(i){
			
			artists[i] = $(this).find("artist").text();
			titles[i] = $(this).find("title").text();
			urls[i] = $(this).find("url").text();
			
			var no = "<tr><td>" + (i+1) + "</td>";
			var artist = "<td>" + artists[i] + "</td>";
			var title = "<td>" + titles[i] + "</td>";			
			var url = "<td>" + urls[i] + "</td>";
			var media = "<td><img id=\"id"+i+"\" src=\"images/play.png\" height=\"40px\" width=\"40px\" onclick=\"playSong("+i+");\"></img>" + "</td></tr>"
			
			$("#albums table").append(no + artist + title + url + media);	
		});		
		
		$("#albums").append("</table>");
		
		
	}
	
	$.ajax({
		url : 'musics.xml',
		type : 'GET',
		dataType : 'xml',
		success : berhasil,
		error : gagal
	});
	
}