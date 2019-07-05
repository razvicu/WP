let counter = 0;

document.getElementsByTagName("body")[0].addEventListener(
    "click", (e) => {
        if ( counter === 10 )
            return;
        counter++;
        $('<div/>', {
            "class": 'dynDiv',
        }).css({top: e.clientY, left: e.clientX}).appendTo("body");
        if ( counter === 10 ) {
            alert("You're done boi");
        }
    }
)