 // Remove video field

 let minusIcon = document.getElementById("btnDelVideo");
 minusIcon.addEventListener('click', function (e) {
    e.preventDefault();

    // get the div that holds the collection
    var collectionHolder = document.getElementById('collection');

    // field followed by buttons
    var newLinkLi = document.getElementById('url-field').insertAdjacentHTML('afterend', buttons);

    // add a 'delete' link to all of the existing form elements    N'IMPORTE QUOI !
    // var elements = collectionHolder.querySelectorAll("li");

    Array.prototype.forEach.call(elements, function () {

    // remove the field
    var newLinkLi.parentNode.removeChild(newLinkLi);
    //});
    });
 } )
