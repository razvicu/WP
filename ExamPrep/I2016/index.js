let header = document.getElementById("header");
let table = document.getElementsByTagName("table")[0];
header.addEventListener("click", function() {
    saved = [];
    for ( i = 0; i < 5; ++i )
        saved.push(table.rows[1].cells[i].textContent);
    for (k = 1; k < 5; ++k)
        for (i = 0; i < 5; ++i)
            table.rows[k].cells[i].textContent = table.rows[k + 1].cells[i].textContent;
    for ( i = 0; i < 5; ++i )
        table.rows[5].cells[i].textContent = saved[i];
    console.log(table.rows[1].cells[0].textContent);
})