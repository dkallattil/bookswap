var Book = function(book_json) {
    this.id = book_json.id;
    this.name = book_json.name;
    this.genre = book_json.genre;
    this.username = book_json.username;

};

Book.prototype.makeCompactDiv = function() {
    var cdiv = $("<tr></tr>");

    var name_div = $("<td></td>");
    name_div.html(this.name);
    cdiv.append(name_div);

    var genre_div = $("<td></td>");
    genre_div.html(this.genre);
    cdiv.append(genre_div);

    var user_div = $("<td></td>");
    user_div.html(this.username);
    cdiv.append(user_div);

    var button = $("<button onclick='message()'> Message </button>");
    cdiv.append(button);

    return cdiv;
};
