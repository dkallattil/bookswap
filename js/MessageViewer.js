var url_base = "https://wwwp.cs.unc.edu/Courses/comp426-f17/users/jall8597/finalproj/php";

$(document).ready(function(){
  $.ajax(url_base + "/messageload.php",
	       {type: "GET",
		       dataType: "json",
		       success: function(book_ids, status, jqXHR) {
    		       for (var i=0; i<book_ids.length; i++) {
    			           load_book_item(book_ids[i]);
    		       }
		       }
	});


         var load_book_item = function (id) {
             $.ajax(url_base + "/messageload.php/" + id,
                 {type: "GET",
                  dataType: "json",
                    success: function(book_json, status, jqXHR) {
                      var m = new Message(book_json);
                      $("#message_list").append(m.makeCompactDiv());
                    }
             });
          }
});
