/*function debug(msg) {
    var body = document.getElementsByTagName('body')[0];
    var log = document.getElementById('debuglog');
    if (!log) {
        log = document.createElement('div');
        log.id = 'debuglog';
        log.innerHTML = '<h1>Debug log</h1>';
        body.appendChild(log);
    }

    var pre = document.createElement('pre');
    var text = document.createTextNode(msg);
    pre.appendChild(text);
    log.appendChild(pre);
}

function hide(e, reflow) {
    if (reflow) {
        e.style.display = "none";
    } else {
        e.style.visibility = "hidden";
    }
}

function highlight(e) {
    if (e.className) {
        e.className = 'hilite';
    } else {
        e.className += 'hilite';
    }
}*/

/*
window.onload = function() {

};*/
window.onload = function () {
/*    var images = document.getElementsByTagName('img');
    for(var i = 0; i < images.length; i++) {
        if(images[i].addEventListener) {
            images[i].addEventListener('click', hide, false);
        } else {
            image.attachEvent('onclick', hide);
        }
    }
    function hide(event) {
        event.target.style.visibility = 'hidden';
    }*/debug(123);

};
 function debug(msg) {
     var log = $('#debuglog');
     if (log.length == 0) {
         log = $('<div id="debuglog"><h1>Debug log</h1></div>');
         log.appendTo(document.getElementsByTagName('body')[0]);
     }
     log.append($('<pre />').text(msg));

 }
