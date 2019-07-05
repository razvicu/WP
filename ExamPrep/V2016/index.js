$(document).ready(function(){
    let images = $("img");
    let table = $("table");
    let tr = $("<tr></tr>");
    for ( let i = 0; i < images.length; ++i ) {
        if ( i % 3 == 0 ) {
            tr = $("<tr></tr>");
            table.append(tr);
        }
        td = $("<td></td>");
        td.append(images[i]);
        tr.append(td);
    }
});