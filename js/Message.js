var Message = function(message_json) {
    this.from = message_json.user_from;
    this.message = message_json.message;
};

Message.prototype.makeCompactDiv = function() {
    var cdiv = $("<tr></tr>");

    var name_div = $("<td></td>");
    name_div.html(this.from);
    cdiv.append(name_div);

    var genre_div = $("<td></td>");
    genre_div.html(this.message);
    cdiv.append(genre_div);

    return cdiv;
};
