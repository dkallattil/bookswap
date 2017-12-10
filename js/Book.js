var Book = function(book_json) {
    this.id = book_json.id;
    this.name = book_json.name;
    this.genre = book_json.genre;

};

Book.prototype.makeCompactDiv = function() {
    var cdiv = $("<tr></tr>");

    var name_div = $("<td></td>");
    name_div.html(this.name);
    cdiv.append(name_div);

    var genre_div = $("<td></td>");
    genre_div.html(this.genre);
    cdiv.append(genre_div);

    return cdiv;
};
