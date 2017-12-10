var url_base = "https://wwwp.cs.unc.edu/Courses/comp426-f17/users/jall8597/finalproj/php";

$(document).ready(function(){
  $.ajax(url_base + "/bookload.php",
	       {type: "GET",
		       dataType: "json",
		       success: function(book_ids, status, jqXHR) {
    		       for (var i=0; i<book_ids.length; i++) {
    			           load_book_item(book_ids[i]);
    		       }
		       }
	});


         var load_book_item = function (id) {
             $.ajax(url_base + "/bookload.php/" + id,
                 {type: "GET",
                  dataType: "json",
                    success: function(book_json, status, jqXHR) {
                      var b = new Book(book_json);
                      $("#book_list").append(b.makeCompactDiv());
                    }
             });
          }
});
